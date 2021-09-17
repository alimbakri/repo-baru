<?php 

require "../config/config.php";

$login = function($post)use($conn){
	$email    = $post['email'];
	$password = $post['password'];
	$password = HashPassword($password);
	$sql      = "SELECT * FROM user WHERE email=? AND password=?";
	$stmt     = $conn->prepare($sql);
	$stmt->bind_param('ss',$email,$password);
	$stmt->execute();
	$rst = $stmt->get_result();
	$assoc = $rst->fetch_assoc();
	if($assoc!=NULL){
		
		$_SESSION['login'] = $assoc;
		?>
		<script>
			alert("Login Berhasil");
			window.location.href="../";
		</script>
		<?php
	}else{
		echo "katombo laut";
		?>
			<script>
				alert("tra bisa mo login")
				window.location.href="../login.php"
			</script>	
		<?php
	}
};


$login($post);
