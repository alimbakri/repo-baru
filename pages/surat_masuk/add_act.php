<?php 
	$sql  = "SELECT * FROM jabatan";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$penerima=[];

	$rs = $stmt->get_result();

	while($fields = $rs->fetch_assoc()){
		$penerima[] = ToObj($fields);
	}

	$stmt->close();
	$conn->close();

