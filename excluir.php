<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM imc WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script language='javascript' type='text/javascript'>
            window.location.href='avaliacao.php';
            </script>";
    }
?>