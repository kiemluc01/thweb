<?php
if (isset($_REQUEST['register'])) {
    if (isset($_REQUEST['email']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['Cpassword'])) {
        $login = loadModel('Login');
        $login->register($_REQUEST['email'], $_REQUEST['username'], $_REQUEST['password']);
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

    <div id="register">
        <center>
            <form action="" method="post">

                <table>
                    <tr class="login">
                        <th colspan="2" class="login">ĐĂNG KÍ</th>
                    </tr>



                    <tr class="login">
                        <td class="login">
                            Email:
                        </td>
                        <td class="login">
                            <input type="text" name="email" id="email" placeholder="Enter your email" onclick="return false">
                        </td>
                    </tr>
                    <tr class="login">
                        <td class="login">Tên đăng nhập: </td>
                        <td class="login">
                            <input type="text" id="username" name="username" placeholder="Enter Your usrname" onclick="return false">
                        </td>
                    </tr>
                    <tr class="login">
                        <td class="login">Mật khẩu: </td>
                        <td class="login">
                            <input type="password" name="password" id="password" placeholder="Enter your password" onclick="return false">
                        </td>
                    </tr>
                    <tr class="login">
                        <td class="login">Nhập lại mật khẩu: </td>
                        <td class="login">
                            <input type="password" name="Cpassword" id="Cpassword" placeholder="Confirm your password" onclick="return false">
                        </td>
                    </tr>
                    <tr class="login">
                        <td colspan="2" class="login">
                            <center><input type="submit" value="đăng kí" id="register" name="register"></center>
                        </td>
                    </tr>
                    <tr class="login">
                        <td colspan="2" class="login">
                            Bạn đã có tài khoản?<a href="index.php"> đăng nhập</a>
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