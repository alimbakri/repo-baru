<?php 

$sql = "SELECT A.id,A.name AS username,A.email,B.name AS role 
		FROM 
		user A INNER JOIN jabatan B ON A.jabatan_id = B.id
		";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rsdata = $stmt->get_result();
$lists = [];
while($affect = $rsdata->fetch_assoc()):
	$lists[] = ToObj($affect);
endwhile;

$stmt->close();
$conn->close();

