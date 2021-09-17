<?php 
$gets = ToObj($get);
$post['password'] = HashPassword($post['password']);
$posts = ToObj($post);

$sql   = "SELECT * FROM user WHERE email = ? ";
$stmt  = $conn->prepare($sql);
$stmt->bind_param('s',$posts->email);
$stmt->execute();
$res   = $stmt->get_result();
$assoc = $res->fetch_assoc();

if($assoc!=NULL){
	$assc = ToObj($assoc);
	if($assc->id!=$gets->id){
		?>
		<script>
			alert("User tidak sinkron");
			window.location.href="?pages=user/index&action=none";
		</script>
		<?php
	}else{
		$sql = "UPDATE user SET name = ?, password = ?, jabatan_id = ? WHERE id = ?";
		$stmt = $conn->prepare($sql);

		$stmt->bind_param('ssss',
			$posts->name,
			$posts->password,
			$posts->jabatan_id,
			$gets->id
		);
		$stmt->execute();
		?>
		<script>
			alert("User Berhasil di update");
			window.location.href="?pages=user/index&action=none";
		</script>
		<?php
	}
}