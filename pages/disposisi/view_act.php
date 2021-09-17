<?php 
    $id = $get['id'];
    $userid = $_SESSION['login']['id'];
    $sql = "SELECT A.id, A.nomor,
            DATE_FORMAT(A.tanggal_agenda,'%d-%m-%Y') AS tanggal_agenda,
            DATE_FORMAT(SM.tanggal_surat,'%d-%m-%Y') AS tanggal_surat,
            SM.sifat_surat,
            SM.perihal,
            SM.pengirim,
            SM.lampiran,
            SM.nomor AS nomor_surat
        FROM agenda A 
        INNER JOIN surat_masuk SM ON A.surat_masuk_id=SM.id
        WHERE A.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $rst = $stmt->get_result();
    $disp = $rst->fetch_assoc();
    $disp = ToObj($disp);

    $sql = "SELECT 
                U.id,
                U.name,
                J.name as roles 
            FROM user U 
            INNER JOIN jabatan J ON U.jabatan_id = J.id
            WHERE U.id NOT IN (SELECT id from user WHERE id='$userid')
            ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $arr    = [];
    while($rs = $result->fetch_assoc()){
        $arr[] = ToObj($rs);
    }
    $stmt->close();
    $conn->close();