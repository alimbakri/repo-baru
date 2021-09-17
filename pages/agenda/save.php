<?php 
    $sql  = "SELECT MAX(nomor) AS nmr FROM agenda";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $res  = $stmt->get_result();
    $rs   = $res->fetch_assoc();
    $rs   = ToObj($rs);

    $nomor = sprintf("%03d",(intval($rs->nmr)+1));
    $sql = "INSERT INTO agenda(nomor,surat_masuk_id,user_id)VALUES(?,?,?)";
    $stmt = $conn->prepare($sql);
    $ses = ToObj($_SESSION['login']);
    $stmt->bind_param("sss",$nomor,$get['id'],$ses->id);
    if(!$stmt==false){
        $valid = true;
    }else{
        $valid = false;
    }
    $stmt->execute();
    $conn->close();
?>

<?php if($valid): ?>
    <script>
        alert("Berhasil di agendakan dengan nomor <?php echo $nomor;?>");
        window.location.href="?pages=agenda/index";
    </script>
<?php else: ?>
    <script>
        alert("Gagal di agendakan");
        window.location.href="?pages=agenda/index";
    </script>
<?php endif; ?>


