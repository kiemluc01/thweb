<?php
$_SESSION['user'] = null;
if (isset($_REQUEST['login'])) {
    if (!(isset($_REQUEST['username_login']) && isset($_REQUEST['password'])))
        echo '<script> alert("không được bỏ trống các mục") </script>';
    else {
        $login = loadModel('Login');
        if ($login->login($_REQUEST['username_login'], $_REQUEST['password'])) {
            $_SESSION['user'] = $_REQUEST['username_login'];
            echo '<script> alert("Đăng nhập thành công") 
                location="index.php?cat=personal";
            </script>';
        } else
            echo '<script> alert("Sai tài khoản hoặc mật khẩu") </script>';
    }
}
?>
<div id="login_container">
    <div class="banner_left">
        <img src="Public/images/background2.jpg" alt="" style="width:100%;height:100vh;">

        <img src="" alt="" class="Xu_login">
        <img src="" alt="" class="L_login">
        <img src="" alt="" class="T_login">
    </div>
    <div id="login">
        <center>
            <form action="" method="post">
                <table>
                    <tr class="login">
                        <th colspan="2" class="login" style="color: rgb(255, 43, 5);font-size: 50px;line-height: 200px;font-weight: bold;">ĐĂNG NHẬP</th>
                    </tr>
                    <tr class="login">
                        <td class="login">Tên đăng nhập: </td>
                        <td class="login">
                            <input type="text" id="username_login" name="username_login">
                            <img src="Public/images/show.png" alt="" id="hide" style="width:30px;height:20px; position:absolute;top: 40.5vh;left:60.3%;">
                        </td>
                    </tr>
                    <tr class="login">
                        <td class="login">Mật khẩu: </td>
                        <td class="login">
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                    <tr class="login">
                        <td colspan="2" class="login">
                            <center><input type="submit" value="đăng nhập" id="login" name="login"></center>
                        </td>
                    </tr>
                    <tr class="login">
                        <td colspan="2" class="login">
                            Bạn chưa có tài khoản?<a href="index.php?cat=register"> đăng kí</a>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
    <div class="banner_right">
        <img src="Public/images/background2.jpg" alt="" style="width:100%;height:100vh;">
        <img src="" alt="" class="Tai">
        <img src="" alt="" class="Chinh">
        <img src="" alt="" class="Ca">
        <img src="" alt="" class="Nhan">

    </div>
</div>