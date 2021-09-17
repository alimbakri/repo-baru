<?php 


$sql = "SELECT A.pathfile,A.id,A.nomor,DATE_FORMAT(A.tanggal_masuk,'%d-%m-%Y') AS tanggal_masuk,A.tanggal_surat,A.perihal,A.lampiran,A.pengirim,B.name AS tujuan,C.name AS username 
FROM surat_masuk A
INNER JOIN jabatan B ON A.jabatan_tujuan_id=B.id
INNER JOIN user C ON A.user_id=C.id
WHERE A.id NOT IN (SELECT surat_masuk_id FROM agenda)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$rs_array = [];
while($rs = $result->fetch_assoc()){
	$rs_array[] = ToObj($rs);
}
$stmt->close();
$conn->close();
