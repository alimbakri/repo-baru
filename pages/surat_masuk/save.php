<?php 

	$post['user_id'] = $auth->user->id;
	$sql = "INSERT INTO surat_masuk(
					nomor,
					tanggal_surat,
					perihal,
					lampiran,
					user_id,
					pengirim,
					jabatan_tujuan_id,
					sifat_surat
				)
			VALUES(?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$post = ToObj($post);

	$stmt->bind_param(
			"ssssssss",
				$post->nomor,
				$post->tanggal_surat,
				$post->perihal,
				$post->lampiran,
				$post->user_id,
				$post->pengirim,
				$post->jabatan_tujuan_id,
				$post->sifat_surat
				);
	$stmt->execute();
	$stmt->close();
	$conn->close();
?>
<script>
	alert("Berhasil Menyimpan Data");
	window.location.href="?pages=surat_masuk/index&action=none";
</script>