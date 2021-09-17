<?php 
if(isset($_GET['id'])){

	$sql = "SELECT * FROM jabatan WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$_GET['id']);
	$stmt->execute();
	$result = $stmt->get_result();
	$data = $result->fetch_assoc();
	$stmt->close();
	$conn->close();
	if($data==NULL){
		echo "<script>
				alert('Tidak ditemukan');
				window.location.href = `$BASE_URL?pages=jabatan/index&action=none`;
			</script>";		
	}
}else{
	echo "<script>
		alert('Tidak ditemukan');
		window.location.href = `$BASE_URL?pages=jabatan/index&action=none`;
	</script>";
}
