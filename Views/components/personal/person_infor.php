<?php
$person = loadModel('Personal');
if (isset($_REQUEST['update'])) {
    $person->update_infor($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['DoB'], $_REQUEST['GT'], $_REQUEST['pass']);
    echo "<script> 
    $(document).ready(function() {
        document.getElementById('message').style.display = 'block';
    })
    </script>";
}
?>

<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>

    <div id="person">
        <img src="<?php $person->loadIMG($_REQUEST['user']); ?>" alt="" id="AVT">
        <img src="Public/images/camera.jpg" alt="" id="camera_AVT" class="camera">
        <div id="BGR" style="background-color: rgb(163, 163, 163);">
            <div style="background-image: url('<?php $person->loadBGR($_REQUEST['user']) ?>'); width:70%; height:100%;margin-left:15%">
                <img src="Public/images/camera.jpg" alt="" id="camera_BGR" class="camera">
            </div>

        </div>
        <div id="infor">
            <form action="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_REQUEST['user'] ?>" method="post">
                <center>
                    <table id="infor_person">
                        <tr>
                            <td class="infor_person">Họ Tên:</th>
                            <td class="infor_person">
                                <input type="text" id="name" name="name" value="<?php $person->loadTenND($_REQUEST['user']); ?>">
                            </td>
                            <td class="infor_person">Email:</th>
                            <td class="infor_person">
                                <input type="text" id="email" name="email" value="<?php $person->loadEmail($_REQUEST['user']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="infor_person">Ngày sinh:</td>
                            <td class="infor_person">
                                <input type="text" id="DoB" name="DoB" value="<?php $person->loadNS($_REQUEST['user']); ?>">
                            </td>
                            <td class="infor_person">Tên Đăng Nhập:</th>
                            <td class="infor_person">
                                <input type="text" id="username" name="username" value="<?php $person->loadusername($_REQUEST['user']); ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="infor_person">Giới tính:</td>
                            <td class="infor_person">
                                <input type="text" id="GT" name="GT" value="<?php $person->loadGT($_REQUEST['user']); ?>">
                            </td>
                            <td class="infor_person">Mật khẩu:</td>
                            <td class="infor_person">
                                <input type="password" id="pass" name="pass" value="<?php $person->loadpass($_REQUEST['user']); ?>">
                                <img src="Public/images/show.png" alt="" id="hide" style="width:30px;height:20px; position:absolute;top:69.2vh;left:88%;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="infor_person">
                                <center>
                                    <input type="submit" value="Cập nhật thông tin" id="update" name="update">
                                </center>
                            </td>
                        </tr>
                    </table>
                </center>
            </form>
        </div>
    </div>

</div>
<div id="message">
    <center>
        <h3>cập nhật thành công</h3><br>
        <input type="submit" value="OK" id="ok" class="dialog">
    </center>
</div>
<div id="loadAVT">
    <form action="" method="post">
        <center>
            <h1>cập nhật ảnh đại diện</h1>
            <input type="file" name="AVT">
            <input type="submit" id="ok_avt" value="cập nhật">
        </center>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#hide').click(function() {
            if (document.getElementById('pass').type == 'password') {
                document.getElementById('hide').src = 'Public/images/hide.png';
                document.getElementById('pass').type = 'text';
            } else {
                document.getElementById('hide').src = 'Public/images/show.png';
                document.getElementById('pass').type = 'password';
            }
        });
        $('#ok').click(function() {
            document.getElementById('message').style.display = 'none'
        })
    })
</script>