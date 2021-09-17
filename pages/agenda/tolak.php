
<?php

$id = $get['id'];

$sql = "DELETE FROM surat_masuk WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s',$id);
$stmt->execute();
?>
<script>
	alert("Berhasil Menghapus data")
	window.location.href="?pages=agenda/index"
</script>