<?php 
if(isset($get['id'])){
	$id   = $get['id'];
	$sql  = "SELECT * FROM surat_masuk WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$id);
	$stmt->execute();
	$result = $stmt->get_result();
	$surmas = $result->fetch_assoc();
	if($surmas!=NULL){
		$surat = ToObj($surmas);
	}else{
		?>
		<script>
			alert("Tidak ditemukan Surat Masuk");
			window.location.href="?pages=surat_masuk/index";
		</script>
		<?php
	}

}else{
	?>
	<script>
		alert("Tidak ditemukan Surat Masuk");
		window.location.href="?pages=surat_masuk/index";
	</script>
	<?php
}