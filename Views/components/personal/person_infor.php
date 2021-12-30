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
if (isset($_REQUEST['ok_avt'])) {
    $file = $_FILES['AVT']['tmp_name'];
    $path = 'Public/images/' . $_FILES['AVT']['name'];
    if (move_uploaded_file($file, $path)) {
        $person->update_IMGAVT($path);
        echo "<script>
            $(document).ready(function(){
                document.getElementById('loadAVT').style.display = 'none';
                
            });
        </script>";
    } else
        echo 'fail';
}
if (isset($_REQUEST['ok_bgr'])) {
    $file = $_FILES['BGR']['tmp_name'];
    $path = 'Public/images/' . $_FILES['BGR']['name'];
    if (move_uploaded_file($file, $path)) {
        $person->update_IMGBGR($path);
        echo "<script>
            $(document).ready(function(){
                document.getElementById('message').style.display = 'block';
            });
        </script>";
    } else
        echo 'fail';
}
?>

<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>

    <div id="person">
        <img src="<?php $person->loadIMG($_SESSION['user']); ?>" alt="" id="AVT">
        <img src="Public/images/camera.jpg" alt="" id="camera_AVT" class="camera">
        <div id="BGR" style="background-color: rgb(163, 163, 163);">
            <div style=" width:70%; height:100%;margin-left:15%">
                <img src="Public/images/camera.jpg" alt="" id="camera_BGR" class="camera">
                <img src="<?php $person->loadBGR($_SESSION['user']); ?>" alt="" id="BGRR" style="width:100%; height:100%">

            </div>

        </div>
        <div id="infor">
            <form action="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_SESSION['user']; ?>" method="post">
                <center>
                    <table id="infor_person">
                        <tr>
                            <td class="infor_person">Họ Tên:</th>
                            <td class="infor_person">
                                <input type="text" id="name" name="name" value="<?php $person->loadTenND($_SESSION['user']); ?>">
                            </td>
                            <td class="infor_person">Email:</th>
                            <td class="infor_person">
                                <input type="text" id="email" name="email" value="<?php $person->loadEmail($_SESSION['user']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="infor_person">Ngày sinh:</td>
                            <td class="infor_person">
                                <input type="text" id="DoB" name="DoB" value="<?php $person->loadNS($_SESSION['user']); ?>">
                            </td>
                            <td class="infor_person">Tên Đăng Nhập:</th>
                            <td class="infor_person">
                                <input type="text" id="username" name="username" value="<?php $person->loadusername($_SESSION['user']); ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="infor_person">Giới tính:</td>
                            <td class="infor_person">
                                <input type="text" id="GT" name="GT" value="<?php $person->loadGT($_SESSION['user']); ?>">
                            </td>
                            <td class="infor_person">Mật khẩu:</td>
                            <td class="infor_person">
                                <input type="password" id="pass" name="pass" value="<?php $person->loadpass($_SESSION['user']); ?>">
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
        <input type="submit" value="OK" id="ok_message" class="dialog">
    </center>
</div>
<div id="loadAVT">
    <form action="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_SESSION['user']; ?>" method="post" enctype="multipart/form-data">
        <center>
            <h1>cập nhật ảnh đại diện</h1>
            <input type="file" name="AVT" id="AVT">
            <input type="submit" id="ok_avt" name="ok_avt" value="cập nhật">
        </center>
    </form>
    <img src="Public/images/close.png" alt="" id="closeAVT">
</div>
<div id="loadBGR">
    <form action="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_SESSION['user']; ?>" method="post" enctype="multipart/form-data">
        <center>
            <h1>cập nhật ảnh bìa</h1>
            <input type="file" name="BGR">
            <input type="submit" id="ok_bgr" name="ok_bgr" value="cập nhật">
        </center>
    </form>
    <img src="Public/images/close.png" alt="" id="closeBGR">
</div>
<div id="IMG_zoom">
    <div style="width:90%;">
        <center>
            <img src="<?php $person->loadIMG($_SESSION['user']); ?>" alt="" id="zoom">
        </center>
    </div>
    <img src="Public/images/close.png" id="closezoom" alt="">
</div>
<img src="Public/images/BGR_person.jpg" alt="" id="tmpBGR" style="display: none;">
<img src="Public/images/AVT_person.jpg" alt="" id="tmpAVT" style="display: none;">
<script>
    $(document).ready(function() {


    })
</script>