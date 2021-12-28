<?php
class Finance extends Database
{
    function add($user, $Thang, $Nam, $salary)
    {
        $sqlselectID = "select * from tblAccount where username ='" . $user . "'";
        $idND = '';
        while ($row = mysqli_query($this->conn, $sqlselectID)->fetch_assoc()) {
            $idND = $row['idND'];
        }
        if (mysqli_query($this->conn, "select * from finance where idND =" . $idND . ",Thang =" . $Thang . ",Nam =" . $Nam)->num_rows > 0)
            $sql = "update finance set salary = " . $salary . " where idND =" . $idND . ",Thang =" . $Thang . ",Nam =" . $Nam;
        else
            $sql = "insert into finance values(null," . $idND . "," . $Thang . "," . $Nam . "," . $salary . ");";
        if (!(mysqli_query($this->conn, $sql)))
            echo mysqli_error($this->conn);
    }
}
