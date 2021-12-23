<?php
if (isset($_REQUEST['login'])) {
    if (!(isset($_REQUEST['username']) || isset($_REQUEST['password'])))
        echo '<script> alert("không được bỏ trống các mục") </script>';
    else {
        $login = loadModel('Login');
        if ($login->login($_REQUEST['username'], $_REQUEST['password'])) {
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
        <div class="Xu_login"></div>
        <div class="L_login"></div>
        <div class="T_login"></div>
    </div>
    <div id="login">
        <center>
            <form action="" method="post">
                <table>
                    <tr>
                        <th colspan="2">ĐĂNG NHẬP</th>
                    </tr>
                    <tr>
                        <td>Tên đăng nhập: </td>
                        <td>
                            <input type="text" id="username" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu: </td>
                        <td>
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><input type="submit" value="đăng nhập" id="login" name="login"></center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Bạn chưa có tài khoản?<a href=""> đăng kí</a>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
    <div class="banner_right">
        <img src="Public/images/background2.jpg" alt="" style="width:100%;height:100vh;">
        <div class="Tai"></div>
        <div class="Chinh"></div>
        <div class="Ca"></div>
        <div class="Ca"></div>

    </div>
</div>