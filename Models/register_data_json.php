<?php
$conn = new PDO("mysql:host=localhost;dbname=thweb;charset=utf8", "root", "");
$stmt = $conn->prepare("insert into tblaccount value(null,?");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
