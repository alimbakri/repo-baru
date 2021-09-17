<?php


$sql = "SELECT * FROM jabatan";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->get_result();
$roles = [];
while($rs = $res->fetch_assoc()):
	$roles[]= ToObj($rs);
endwhile;

$stmt->close();
$conn->close();