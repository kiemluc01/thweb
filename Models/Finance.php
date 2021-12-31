<?php
class Finance extends Database
{
    function add($Thang, $Nam, $salary)
    {
        $person = loadModel('Personal');
        $idND = $person->loadId();
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
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "select * from tblmoney where idND = " . $idND;
        $_result = mysqli_query($this->conn, $sql);
        if ($_result->num_rows > 0)
            while ($row = $_result->fetch_assoc())
                $save = $row['save'];
        return $save;
    }
    function loadBalance()
    {
        $balance = 0;
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "select * from tblmoney where idND = " . $idND;
        $_result = mysqli_query($this->conn, $sql);
        if ($_result->num_rows > 0)
            while ($row = $_result->fetch_assoc())
                $balance = $row['balance'];
        return $balance;
    }
    function loadMonth()
    {
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "select * from finance where idND = " . $idND . " order by Nam,Thang desc";
        $_result = mysqli_query($this->conn, $sql);
        return $_result;
    }
    function autoAdd()
    {
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $Thang = getdate()['mon'];
        $Nam = getdate()['year'];
        $sqlcheck = "select * from finance where idND =" . $idND . " and Thang =" . $Thang . " and Nam =" . $Nam;
        $_result = mysqli_query($this->conn, $sqlcheck);
        if (!($_result->num_rows > 0)) {
            $sql = "insert into finance values(null," . $idND . "," . $Thang . "," . $Nam . ",0);";
            if (!(mysqli_query($this->conn, $sql)))
                echo mysqli_error($this->conn);
        }
    }
    function loadSalary($T, $N)
    {
        $salary = 0;
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "select * from finance where idND = " . $idND . " and Thang = " . $T . " and Nam = " . $N;
        $_result = mysqli_query($this->conn, $sql);
        if ($_result->num_rows > 0)
            while ($row = $_result->fetch_assoc())
                $salary = $row['salary'];
        return $salary;
    }
    function loadAll()
    {

        $sql = "select * from finance ";
        $_result = mysqli_query($this->conn, $sql);
        return $_result;
    }
    function updateMoney($save, $spend)
    {
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "update tblmoney set save = save + " . $save . ",balance = balance +" . $spend . " where idND = " . $idND;
        if (!mysqli_query($this->conn, $sql)) {
            echo mysqli_error($this->conn);
        }
    }
}
