<?php 
	
	$post = $_POST;
	$post['password']=HashPassword($post['password']);
	$sql = "INSERT INTO user(email,name,password,jabatan_id) VALUES(?,?,?,?)";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('ssss',$post['email'],$post['name'],$post['password'],$post['jabatan_id']);
	$stmt->execute();
	echo '
		<script>
			alert("Berhasil Simpan Data");
			window.location.href = `?pages=user/index&action=none`;
		</script>
	';

?>