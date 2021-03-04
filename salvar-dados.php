<?php
	include "utils.php";
    $n = $_POST["n"];
    $data = $_POST["data"];
    $firma = $_POST["firma"];
    $ender = $_POST["ender"];
    $compl = $_POST["compl"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado  = $_POST["estado"];
    $cep  = $_POST["cep"];
    $cnpj  = $_POST["cnpj"];
    $inscr  = $_POST["inscr"];
    $tels  = $_POST["tels"];
    $celular  = $_POST["celular"];
    $email  = $_POST["email"];
    $obs  = $_POST["obs"];

    if(empty($firma))
    {
        echo "<b>O campo firma deve ser preenchido.</b>";
        include "Formulario-cadastro-cliente.php";
        die;
    }
    if((empty($telefone))&&(empty($celular))&&(empty($email)))
    {
        echo "<b>Pelo menos um campo de contato (Telefone ou Celular ou Email) deve ser preenchido </b>";
        include "Formulario-cadastro-cliente.php";
        die;
    }
	if(empty($cnpj)){
		echo "<b> O campo CNPJ deve ser preenchido.<b>";
		include "Formulario-cadastro-cliente.php";
		die;
	}
	if(!validarCNPJ($cnpj)){
		echo "<b>O cnpj invalido</b>";
		include "Formulario-cadastro-cliente.php";
		die;
	}
    $f = fopen("Dados.csv","a");
    fputcsv($f, array($n, $data, $ender, $compl, $bairro,$cidade,$estado,$cep,$cnpj,$inscr,$tels,$celular,$email,$obs));
    fclose($f);

    // redirecionamento
    header('location: obrigada-formulario.php');

?>