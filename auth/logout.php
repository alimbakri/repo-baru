<?php 
session_start();
require "../config/config.php";
session_destroy();
?>

<script>
	window.location.href="<?=$BASE_URL?>"
</script>

