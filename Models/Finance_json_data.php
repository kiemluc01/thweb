<?php
$conn = new PDO("mysql:host=localhost;dbname=thweb;charset=utf8","root","");
$stmt = $conn->prepare("select * from finance");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
