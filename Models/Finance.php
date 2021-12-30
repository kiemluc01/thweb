<?php
class Finance extends Database
{
    function add($Thang, $Nam, $salary)
    {
        $sqlselectID = "select * from tblAccount where username ='" . $_SESSION['user'] . "'";
        $idND = '';
        $_result = mysqli_query($this->conn, $sqlselectID);
        while ($row = $_result->fetch_assoc()) {
            $idND = $row['id'];
        }
        $sqlcheck = "select * from finance where idND =" . $idND . " and Thang =" . $Thang . " and Nam =" . $Nam;

        $_result = mysqli_query($this->conn, $sqlcheck);
        if ($_result->num_rows > 0)
            $sql = "update finance set salary = " . $salary . " where idND =" . $idND . " and Thang =" . $Thang . " and Nam =" . $Nam;
        else
            $sql = "insert into finance values(null," . $idND . "," . $Thang . "," . $Nam . "," . $salary . ");";
        if (!(mysqli_query($this->conn, $sql)))
            echo mysqli_error($this->conn);
    }
    function loadSave()
    {
        $save = 0;
        $sqlselectID = "select * from tblAccount where username ='" . $_SESSION['user'] . "'";
        $idND = '';
        $_result = mysqli_query($this->conn, $sqlselectID);
        while ($row = $_result->fetch_assoc()) {
            $idND = $row['id'];
        }
        $sql = "select * from tblmoney where idND = " . $idND;
        $_result = mysqli_query($this->conn, $sql);
        if ($_result->num_rows > 0)
            while ($row = $_result->fetch_assoc())
                $save = $row['save'];
        return $save;
    }
}
