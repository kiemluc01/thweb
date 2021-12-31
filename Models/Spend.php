<?php
class Spend extends Database
{
    function getData()
    {
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "select * from tblspend where idND =" . $idND;
        $result = mysqli_query($this->conn, $sql);
        return  $result;
    }
    function getTongtien()
    {
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "select sum(tongtien) as tien from tblspend where idND =" . $idND;
        $result = mysqli_query($this->conn, $sql);
        return  $result;
    }
    function add($noidung, $tongtien, $ngaymua, $loai)
    {
        $person = loadModel('Personal');
        $idND = $person->loadId();
        $sql = "insert into tblspend values(null," . $idND . ",N'" . $noidung . "'," . $tongtien . ",'" . $ngaymua . "',N'" . $loai . "');";
        if (!(mysqli_query($this->conn, $sql))) {
            mysqli_error($this->conn);
        }
    }
}
