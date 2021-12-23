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
}
