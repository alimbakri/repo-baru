<?php
if(isset($_GET['action'])&&$_GET['action']==='save'){
	$sql  = "INSERT INTO jabatan(name)VALUES(?)";
	$post = $_POST;
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$post['name']);
	$stmt->execute();
	$stmt->close();

}elseif(isset($_GET['action'])&&isset($_GET['id'])&&$_GET['action']==='update'){
	$sql  = "UPDATE jabatan SET name = ? WHERE id=?";
	$post = $_POST;
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss",$post['name'],$_GET['id']);
	$stmt->execute();
	$stmt->close();

}
$sql="SELECT * FROM jabatan";

$query = $conn->prepare($sql);
$query->execute();
$rs = $query->get_result();
$rows = [];
while($fiel = $rs->fetch_assoc()){
	$rows[] = ToObj($fiel);
}

$query->close();
$conn->close();