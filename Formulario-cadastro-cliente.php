<?php
if(!isset($n)) 
{
	$n = "";
    $data = "";
    $firma = "";
    $ender = "";
    $compl = "";
    $bairro = "";
    $cidade = "";
    $estado  = "";
    $cep  = "";
    $cnpj  = "";
    $inscr  = "";
    $tels  = "";
    $celular  = "";
    $email  = "";
    $obs  = ""; 
}
?>
<h1>Mine Horta Vale Verde</h1>
<form method="post" action="salvar-dados.php">
    <p>N: <input type="number" name="n" size="80" value="<?=$n?>"></p>
    <p>Data: <input type="date" name="data" size="80" value="<?=$data?>"></p>
    <p>Firma: <input type="text" name="firma" size="80" value="<?=$firma?>"></p>
    <p>Ender: <input type="text" name="ender" size="80" value="<?=$ender?>"></p>
    <p>Compl:<input type="text" name="compl" size="80" value="<?=$compl?>"></p>
    <p>Bairro:<input type="text" name="bairro" size="80" value="<?=$bairro?>"></p>
    <p>Cidade:<input type="text" name="cidade" size="80" value="<?=$cidade?>"></p>
    <p>Estado:<input type="text" name="estado" size="80" value="<?=$estado?>"></p>
    <p>CEP:<input type="text" name="cep" size="80" value="<?=$cep?>"></p>
    <p>CNPJ:<input type="text" name="cnpj" size="80" value="<?=$cnpj?>"></p>
    <p>Inscr:<input type="text" name="inscr" size="80" value="<?=$inscr?>"></p>
    <p>Tels:<input type="text" name="tels" size="80" value="<?=$tels?>"></p>
    <p>Celular:<input type="text" name="celular" size="80" value="<?=$celular?>"></p>
    <p>E-Mail:<input type="text" name="email" size="80" value="<?=$email?>"></p>
    <p>OBS:<textarea name="obs" rows="6" cols="80"></textarea></p>
    <p><button type="submit">Envia</button></p>
</form> 