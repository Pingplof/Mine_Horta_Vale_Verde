<?php

    $n = $_POST["n"];
    $data = $_POST["email"];
    $firma = $_POST["endereco"];
    $ender = $_POST["motivo"];
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


	// Verifica se um número foi informado
	if(empty($cnpj)) {
		echo "<b> CNPJ não valido </b>";
		include "Formulario-cadastro-cliente.php";
		die;
	}

	// Elimina possivel mascara
	$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
	$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cnpj) != 14) {
		echo "<b> CNPJ não valido </b>";
		include "Formulario-cadastro-cliente.php";
		die;
	}
	
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else
	if ($cnpj == '00000000000000' || 
		$cnpj == '11111111111111' || 
		$cnpj == '22222222222222' || 
		$cnpj == '33333333333333' || 
		$cnpj == '44444444444444' || 
		$cnpj == '55555555555555' || 
		$cnpj == '66666666666666' || 
		$cnpj == '77777777777777' || 
		$cnpj == '88888888888888' || 
		$cnpj == '99999999999999') {
		echo "<b> CNPJ não valido </b>";
		include "Formulario-cadastro-cliente.php";
		die;
		
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
	 
		$j = 5;
		$k = 6;
		$soma1 = "";
		$soma2 = "";

		for ($i = 0; $i < 13; $i++) {

			$j = $j == 1 ? 9 : $j;
			$k = $k == 1 ? 9 : $k;

			$soma2 += ($cnpj{$i} * $k);

			if ($i < 12) {
				$soma1 += ($cnpj{$i} * $j);
			}

			$k--;
			$j--;

		}

		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

		if((($cnpj{12} == $digito1) and ($cnpj{13} == $digito2)) == false){
			echo "<b> CNPJ não valido </b>";
			include "Formulario-cadastro-cliente.php";
			die;
		}

}

    $f = fopen("Dados.csv","a");
    fputcsv($f, array($n, $data, $ender, $compl, $bairro,$cidade,$estado,$cep,$cnpj,$inscr,$tels,$celular,$email,$obs));
    fclose($f);

    // redirecionamento
    header('location: obrigada-formulario.php');

?>