<?php 

if(isset($_GET['id'])){
	$sql = "SELECT * FROM menus";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$rsfield = $stmt->get_result();
	$list_mnu = [];
	while($rs = $rsfield->fetch_assoc()){
		$list_mnu[] = $rs;
	}

	if(isset($_GET['action'])){

		$aksi = $_GET['action'];
		switch ($aksi) {
			case 'save':
				$post = $_POST;
				//var_dump($post);
				$insertion =[];
				foreach ($post['menu_id'] as $key => $value) {

					$cek = "SELECT id FROM roles WHERE menu_id=? AND jabatan_id=?";
					$stmt = $conn->prepare($cek);
					$stmt->bind_param("ss",$_GET['id'],$value);
					$stmt->execute();
					$res = $stmt->get_result();
					$assc = $res->fetch_assoc();
					if($assc==NULL){
						$canInsert = true;
					}else{
						$canInsert = false;
					}
					if($canInsert){
						$sql = "INSERT INTO roles(jabatan_id,menu_id)VALUES(?,?)";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param(
							'ss',$_GET['id'],$value
						);
						$stmt->execute();
					}
				}
				break;
			
			default:
				echo "MDB";
				break;
		}
	}

	$sql = "SELECT * FROM jabatan WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$_GET['id']);
	$stmt->execute();
	$result = $stmt->get_result();
	$data = $result->fetch_assoc();
	$data = ToObj($data);

	foreach ($list_mnu as $key => $value) {
		$cek = "SELECT * FROM roles WHERE jabatan_id=? AND menu_id=?";
		$stmt = $conn->prepare($cek);
		$stmt->bind_param("ss",$get['id'],$value['id']);
		$stmt->execute();
		$f = $stmt->get_result();
		$assoc = $f->fetch_assoc();
		if($assoc==NULL):
			$role = [
				"id"=>0,
				"is_valid" => false,
			];
		else:
			$role = [
				"id"=>$assoc['id'],
				"is_valid" => true,
			];
		endif;
		$list_mnu[$key]['role'] = $role;
	}
	$list_mnu = ToObj($list_mnu);
	$stmt->close();
	$conn->close();
	if($data==NULL){
		echo "<script>
				alert('Tidak ditemukan');
				window.location.href = `$BASE_URL?pages=jabatan/index&action=none`;
			</script>";		
	}
}else{
	echo "<script>
		alert('Tidak ditemukan');
		window.location.href = `$BASE_URL?pages=jabatan/index&action=none`;
	</script>";
}
