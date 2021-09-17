<?php 

$get_session = function($name='')
{
	return $_SESSION[$name];
};



if(isset($_SESSION['login'])){
	$auth = [
		"user" => ToObj($get_session('login'))
	];
	$auth = ToObj($auth);

}else{
	?>
		<script>
			alert("Trabisa masuk harus login dulu bosss")
			window.location.href="<?= $BASE_URL ?>login.php";
		</script>
	<?php
}




