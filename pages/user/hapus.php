<?php 
$gets = ToObj($get);

		$sql = "DELETE from user  WHERE id = ?";
		$stmt = $conn->prepare($sql);

		$stmt->bind_param('s',
			$gets->id
		);
		$stmt->execute();
		?>
	<script>
			alert("User Berhasil di Delete");
			window.location.href="?pages=user/index&action=none";
		</script>
	