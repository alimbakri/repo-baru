<?php 
if(isset($get['id'])){
	$origin = $_FILES['file'];
	$extension = explode(".",$origin['name']);
	$x = "";
	foreach($extension as $key => $value){
			$x = $value;		
	}
	$filename ="SM".date('dmY').$get['id'].".$x";
	$destination=ROOT_DIR."/statics/surat_masuk/$filename";
	move_uploaded_file($origin['tmp_name'], $destination);
	$sql  = "UPDATE surat_masuk SET pathfile=? WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss',$filename,$get['id']);
	$stmt->execute();

	?>
		<script>
			alert("Upload Berhasil");
			window.location.href="?pages=surat_masuk/index";
		</script>
	<?php
}

?>
