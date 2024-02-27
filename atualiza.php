<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $imc = $_POST['imc'];
    $classificacao = $_POST['classificacao'];
    $peso2 = floatval($peso);
    $altura2 = floatval($altura);

    function calcularIMC($peso,$altura)
    {
        $imc = $peso / ($altura * $altura);
        return $imc;
    }

    $imc = calcularIMC($peso2,$altura2);
    $resultado = round($imc, 2);
    if ($resultado <= 18) {
        $classificacao = "Magreza";
    }
    elseif ($resultado > 18 && $resultado <= 24) {
        $classificacao = "Normal";
    }
    elseif ($resultado >= 25 && $resultado < 29) {
        $classificacao = "Sobrepeso";
    }
    elseif ($resultado >= 30 && $resultado < 39) {
        $classificacao = "Obesidade";
    }
    else {
        $classificacao = "Obesidade Grave";
    }
    $sql = "UPDATE imc SET nome='$nome',idade='$idade',altura='$altura',peso='$peso',imc='$resultado',classificacao='$classificacao' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='avaliacao.php';
            </script>";
        }
    mysqli_close($conn);
?>