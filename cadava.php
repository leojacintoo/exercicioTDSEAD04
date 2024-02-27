<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
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
    $query = $conn->query("SELECT * FROM imc WHERE nome='$nome' AND idade='$idade'");
    if (mysqli_num_rows($query)> 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Funcionário já existe em nossa base de dados!');
        window.location.href='avaliacao.php';
        </script>";
        exit();
    }
    else {
        $sql = "INSERT INTO imc(nome,idade,peso,altura,imc,classificacao) VALUES ('$nome','$idade','$peso','$altura','$resultado','$classificacao')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='avaliacao.php';
            </script>";
        }
    }
    mysqli_close($conn);
?>