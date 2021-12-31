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
    function loadBGR($user)
    {
        $sql = "select BGR from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['BGR'];
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
    function loadEmail($user)
    {
        $sql = "select email from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['email'];
            }
        }
        echo $href;
    }
    function loadTenND($user)
    {
        $sql = "select TenND from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['TenND'];
            }
        }
        echo $href;
    }
    function loadNS($user)
    {
        $sql = "select NS from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['NS'];
            }
        }
        echo $href;
    }
    function loadGT($user)
    {
        $sql = "select GT from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['GT'];
            }
        }
        echo $href;
    }
    function loadusername($user)
    {
        $sql = "select username from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['username'];
            }
        }
        echo $href;
    }
    function loadpass($user)
    {
        $sql = "select pass from tblAccount where username = '" . $user . "'";
        $result = mysqli_query($this->conn, $sql);
        $href = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $href = $row['pass'];
            }
        }
        echo $href;
    }
    function update_infor($ten, $email, $ns, $gt, $pass)
    {
        $sql = "update tblAccount set TenND =N'" . $ten . "',email='" . $email . "',NS='" . $ns . "',GT='" . $gt . "',pass='" . $pass . "' where username = '" . $_SESSION['user'] . "';";
        if (!(mysqli_query($this->conn, $sql))) {
            echo mysqli_error($this->conn);
        }
    }
    function update_IMGAVT($url)
    {
        $sql = "update tblAccount set IMG ='" . $url . "' where username ='" . $_SESSION['user'] . "';";
        if (!(mysqli_query($this->conn, $sql))) {
            echo mysqli_error($this->conn);
        }
    }
    function update_IMGBGR($url)
    {
        $sql = "update tblAccount set BGR ='" . $url . "' where username ='" . $_SESSION['user'] . "';";
        if (!(mysqli_query($this->conn, $sql))) {
            echo mysqli_error($this->conn);
        } 
    }
    function loadId()
    {
        $sqlselectID = "select * from tblAccount where username ='" . $_SESSION['user'] . "'";
        $idND = '';
        $_result = mysqli_query($this->conn, $sqlselectID);
        while ($row = $_result->fetch_assoc()) {
            $idND = $row['id'];
        }
        return $idND;
    }
}
