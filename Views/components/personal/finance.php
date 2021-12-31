<?php
$Finance = loadModel('Finance');
$Thang = getdate()['mon'];
$Nam = getdate()['year'];
$sodu = $Finance->loadBalance();
if (getdate()['mday'] < substr(date('m-t-Y'), 3, 2)) {
    if ($Thang == 1) {
        $Nam--;
        $Thang = 12;
    } else
        $Thang--;
} else {
    $Finance->autoAdd();
}
if (isset($_REQUEST['month'])) {
    $value = $_REQUEST['month'];
    $_SESSION['ngay'] = $_REQUEST['month'];
    $Thang = substr($value, 0, strlen($value) - 4);
    $Nam = substr($value, strlen($value) - 4, strlen($value) - 1);
}
$salary = $Finance->loadSalary($Thang, $Nam);
if (isset($_REQUEST['salary'])) {

    $salary = str_replace(' ', '', $_REQUEST['salary']);
}

$save = $salary * 0.1;
$spend = $salary * 0.9;
if (isset($_REQUEST['ok_finance'])) {
    $Finance->add($Thang, $Nam, $salary);
    $sodu = $Finance->loadBalance();
    echo "<script>
        $(document).ready(function(){
            document.getElementById('message').style.display ='block';
        });
    </script>";
}

?>

<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="finance">
        <h4 class="finance">Số dư hiện tại: <?php echo number_format($sodu) . ' VNĐ'; ?></h4>
        <h1 class="finance">Tài chính</h1>
        <form action="" method="post">
            <select name="month" id="month">
                <?php
                $result = $Finance->loadMonth();
                while ($row = $result->fetch_assoc()) {
                    $val = $row['Thang'] . $row['Nam'];
                    if ($val == $_SESSION['ngay'])
                        echo '<option value="' . $row['Thang'] . $row['Nam'] . ' selected">' . $row['Thang'] . '/' . $row['Nam'] . '</option>';
                    else
                        echo '<option value="' . $row['Thang'] . $row['Nam'] . '">' . $row['Thang'] . '/' . $row['Nam'] . '</option>';
                }
                $_SESSION['ngay'] = '';
                ?>
            </select>
            <div>
                <div id="current_finance">
                    <center>
                        <h3 class="finance" id="title_salary">Mức lương tháng <?php echo $Thang; ?> (VNĐ)</h3>
                        <div>
                            <input type="text" class="finance" id="salary" name="salary" value="<?php echo number_format($salary, 0, '.', " "); ?>" disabled="true">
                            <img src="Public/images/pen.png" alt="sửa" id="pen">
                        </div>
                        <input type="submit" class="finance" value="Lưu" id="ok_finance" name="ok_finance" style="margin-top:3%" disabled>
                    </center>
                </div>
                <div id="output_value">
                    <div id="save">
                        <center>
                            <h3 class="finance">Tiền tiết kiệm (VNĐ)</h3>
                            <div>
                                <input type="text" class="finance" id="save_money" value="<?php echo number_format($save, 0, '.', " "); ?>" disabled="true">
                            </div>
                        </center>
                    </div>
                    <div id="spend">
                        <center>
                            <h3 class="finance">Tiền chi tiêu (VNĐ)</h3>
                            <div>
                                <input type="text" class="finance" id="spend_money" value="<?php echo number_format($spend, 0, '.', " "); ?>" disabled="true">
                            </div>
                        </center>
                    </div>
                </div>

            </div>

        </form>
    </div>

</div>

<?php
$personal = loadModel('Personal');
?>
<div class="personal">
    <a href="<?php echo 'index.php?cat=personal&sub_cat=person_infor'; ?>" class="personal">
        <img src="<?php $personal->loadIMG($_SESSION['user']); ?>" id="personal" alt="" style=" width: 60px; height: 60px; border-radius: 50%/50%;">
    </a>
    <h3><?php $personal->loadName($_SESSION['user']); ?></h3>
</div>
<div id="message">
    <center>
        <h3>Lưu thành công</h3><br>
        <input type="submit" value="OK" id="ok_message" class="dialog">
    </center>
</div>
<input type="text" name="session" id="session" value="<?php echo $personal->loadId(); ?>" style="display:none">