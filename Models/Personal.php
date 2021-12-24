<?php
class Personal extends Database
{
    function loadIMG($user)
    {
        $sql = "select IMG from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['IMG'];
            }
        }
        echo $href;
    }
    function loadName($user)
    {
        $sql = "select TenND from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $name = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['TenND'];
            }
        }
        if ($name == '')
            $name = $user;
        echo $name;
    }
}
