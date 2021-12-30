<?php
$Thang = getdate()['mon'];
if (getdate()['mday'] < substr(date('m-t-Y'), 3, 2)) {
    $Thang--;
}
$salary = 0;
if (isset($_REQUEST['salary']))
    $salary = $_REQUEST['salary'];
$save = $salary * 0.1;
$spend = $salary * 0.9;
if (isset($_REQUEST['ok_finance'])) {
    $Finance = loadModel('Finance');
    $Nam = getdate()['year'];
    $Finance->add($Thang, $Nam, $salary);
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
        <h1 class="finance">Tài chính</h1>
        <form action="" method="post">
            <select name="month" id="month">
                <option value="<?php echo getdate()['mon']; ?>"><?php echo 'Tháng ' . getdate()['mon'] - 1; ?></option>
                <option value="<?php echo getdate()['mon'] - 1; ?>"><?php echo 'Tháng ' . getdate()['mon']; ?></option>
            </select>
            <div>
                <div id="current_finance">
                    <center>
                        <h3 class="finance">Mức lương tháng <?php echo $Thang; ?></h3>
                        <div>
                            <input type="text" class="finance" id="salary" name="salary" value="<?php echo $salary; ?>" disabled="true">
                            <img src="Public/images/pen.png" alt="sửa" id="pen">
                        </div>
                        <input type="submit" class="finance" value="Lưu" id="ok_finance" name="ok_finance" style="margin-top:3%" disabled>
                    </center>
                </div>
                <div id="output_value">
                    <div id="save">
                        <center>
                            <h3 class="finance">Tiền tiết kiệm(10%)</h3>
                            <div>
                                <input type="text" class="finance" id="save_money" value="<?php echo number_format($save) . ' VNĐ'; ?>" disabled="true">
                            </div>
                        </center>
                    </div>
                    <div id="spend">
                        <center>
                            <h3 class="finance">Tiền chi tiêu(90%)</h3>
                            <div>
                                <input type="text" class="finance" id="spend_money" value="<?php echo number_format($spend) . ' VNĐ'; ?>" disabled="true">
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