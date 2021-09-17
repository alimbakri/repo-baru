<?php 

if(isset($_GET['id'])){

	$sql = "SELECT * FROM jabatan";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$res = $stmt->get_result();
	$roles = [];
	while($rs = $res->fetch_assoc()):
		$roles[]= ToObj($rs);
	endwhile;
	
	$sql = "SELECT * FROM user WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s',$get['id']);
	$stmt->execute();
	$rst = $stmt->get_result();
	$data = $rst->fetch_assoc();
	if($data ==NULL){
		?>
		<script>
			alert("Data ngga didapat bossku")
			window.location.href="?pages=user/index&action=none";
		</script>
		<?php
	}
	$data = ToObj($data);
	$stmt->close();
	$conn->close();

}else{
	?>
	<script>
		alert("Data ngga didapat bossku")
		window.location.href="?pages=user/index&action=none";
	</script>
	<?php
}
