<?php 

$sql = "
    SELECT 
        D.id,
        D.instruksi,
        D.catatan,
        D.teruskan_ke,
        U.name AS penerima,
        J.name AS jabatan, 
        A.id,
        A.nomor AS nomor_agenda,
        SM.nomor as nomor_surat, 
        SM.pengirim as asal_surat, 
        SM.perihal
    FROM disposisi D 
    INNER JOIN user U ON U.id = D.user_id
    INNER JOIN agenda A ON A.id = D.agenda_id
    INNER JOIN jabatan J ON U.jabatan_id = J.id
    INNER JOIN surat_masuk SM ON A.surat_masuk_id = SM.id
    WHERE D.agenda_id=?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$get['id']);

$stmt->execute();
$lists = [];
$rs    = $stmt->get_result();
while($r = $rs->fetch_assoc()){
    try{
        $obj = $r;
        $sql = "SELECT * FROM jabatan_user WHERE id=?";
        $st  = $conn->prepare($sql);
        
        $st->bind_param('s',$obj['teruskan_ke']);
        $st->execute();
        $rst = $st->get_result();
        $asc = $rst->fetch_assoc();
        $obj['tujuan'] = $asc;
        $lists[] = ToObj($obj);
        $st->close();
    }catch(Exception $e){
        echo "err";
    }

}
$stmt->close();
$conn->close();