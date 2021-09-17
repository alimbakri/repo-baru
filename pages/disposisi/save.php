<?php 

    $post['agenda_id'] = $get['id'];
    $post['user_id'] = $_SESSION['login']['id'];
    $sql = "INSERT INTO disposisi(teruskan_ke,agenda_id,user_id,instruksi,catatan)
            VALUES(?,?,?,?,?)";
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssss",
        $post['teruskan_ke'],
        $post['agenda_id'],
        $post['user_id'],
        $post['instruksi'],
        $post['catatan']
    );
    $stmt->execute();
    ?>

    <script>
        alert("Berhasil simpan data disposisi");
        window.location.href="?pages=disposisi/index";
    </script>