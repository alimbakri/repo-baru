<?php 

try{
	$sql = "SELECT 
				A.id,
				DATE_FORMAT(A.tanggal_agenda,'%d-%m-%Y') AS tanggal_agenda,
				A.nomor AS nomor_agenda,
				SM.nomor AS nomor_surat,
				SM.perihal,
				SM.lampiran,
				SM.sifat_surat,
				SM.pengirim,
				SM.pathfile
			FROM agenda A
			INNER JOIN surat_masuk SM ON SM.id = A.surat_masuk_id 
	";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	$rs_array = [];
	while($rs = $result->fetch_assoc()){
		$rs_array[] = $rs;
	}
	$xkeyt = [];
	foreach ($rs_array as $key => $value) {
		$sql  = "SELECT * FROM disposisi WHERE agenda_id=? ";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$value['id']);
		$stmt->execute();
		$rsult          = $stmt->get_result();
		$assoc          = $rsult->fetch_assoc();	
		$vi['disp_key'] = $assoc !== NULL;
		
		$sql  = "SELECT * FROM disposisi WHERE agenda_id=? ORDER BY id DESC LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$value['id']);
		
		$stmt->execute();
		$rsult          = $stmt->get_result();
		$assoc          = $rsult->fetch_assoc();
		$vi['disp_btn'] = $assoc['teruskan_ke'] === $_SESSION['login']['id'];

		$vi             = array_merge($vi,$value);
		$xkeyt[]        = ToObj($vi);

	}
	$rs_array = $xkeyt;
	$stmt->close();
	$conn->close();

}catch(Exception $e){
	var_dump($e);
}
