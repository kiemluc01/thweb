<?php

$salary = 0;
if (isset($_REQUEST['salary']))
    $salary = $_REQUEST['salary'];
$save = number_format($salary * 0.1);
$spend = number_format($salary * 0.9);
?>
<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="finance">
        <h1 class="finance">Tài chính tháng này</h1>
        <form action="" method="post">
            <div id="current_finance">
                <center>
                    <h3 class="finance">Mức lương tháng này</h3>
                    <div>
                        <input type="text" class="finance" id="salary" name="salary" value="<?php echo $salary; ?>" disabled="true">
                        <img src="Public/images/pen.png" alt="sửa" id="pen">
                    </div>
                    <input type="submit" class="finance" value="OK" id="ok_finance" style="margin-top:3%">
                </center>
            </div>
            <div id="output_value">
                <div id="save">
                    <center>
                        <h3 class="finance">Tiền tiết kiệm(10%)</h3>
                        <div>
                            <input type="text" class="finance" id="save_money" value="<?php echo $save . ' VNĐ'; ?>" disabled="true">
                        </div>
                    </center>
                </div>
                <div id="spend">
                    <center>
                        <h3 class="finance">Tiền chi tiêu(90%)</h3>
                        <div>
                            <input type="text" class="finance" id="spend_money" value="<?php echo $spend . ' VNĐ'; ?>" disabled="true">
                        </div>
                    </center>
                </div>
            </div>

        </form>
        <input type="submit" value="Lưu" id="submit_save" name="submit_save">
    </div>

</div>
<?php
$personal = loadModel('Personal');
?>
<div class="personal">
    <a href="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_REQUEST['user']; ?>" class="personal">
        <img src="<?php $personal->loadIMG($_REQUEST['user']); ?>" id="personal" alt="" style=" width: 60px; height: 60px; border-radius: 50%/50%;">
    </a>
    <h3><?php $personal->loadName($_REQUEST['user']); ?></h3>
</div>
<div id="message">
    <center>
        <h3>cập nhật thành công</h3><br>
        <input type="submit" value="OK" id="ok" class="dialog">
    </center>
</div>
<script>
    $(document).ready(function() {
        $('#pen').click(function() {
            if (document.getElementById('salary').disabled == true) {
                document.getElementById('salary').disabled = false
            }

        });

    })
</script>