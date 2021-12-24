<?php
class Login extends Database
{
    function login($username, $password)
    {
        $sql = "select * from tblAccount where username ='" . $username . "'and  pass ='" . $password . "'";
        $row = mysqli_query($this->conn, $sql);
        if ($row->num_rows > 0)
            return true;
        else
            return false;
    }
    function register($email, $username, $password)
    {
        $sqluser = "select * from tblAccount where username ='" . $username . "'";
        $sqlemail = "select * from tblAccount where email ='" . $email . "'";
        $user = mysqli_query($this->conn, $sqluser);
        $emaill = mysqli_query($this->conn, $sqlemail);
        if ($emaill->num_rows > 0)
            echo '<p id="error" >email đã tồn tại</p>';
        else
        if ($user->num_rows > 0)
            echo '<p id="error" >tên đăng nhập đã tồn tại</p>';
        else {
            $sql = "insert into tblAccount value(null,null,'" . $email . "',null,null,'" . $username . "','" . $password . "');";
            echo $sql;
            if (mysqli_query($this->conn, $sql)) {
                echo '<script> alert("đăng kí thành công")
                    location="index.php";
                </script>';
                $_SESSION['username'] = $username;
                $_SESSION['pass'] = $password;
            } else
                echo mysqli_error($this->conn);
        }
    }
}
