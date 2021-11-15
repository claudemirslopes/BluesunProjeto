<?php
    $to = 'franquias@bluesundobrasil.com.br';
    $nome = $_POST["nome"];
    $email= $_POST["email"];
    $telefone= $_POST["telefone"];
    $celular= $_POST["celular"];
    $cidade= $_POST["cidade"];
    $estado= $_POST["uf"];
    $assunto= $_POST["assunto"];
    $mensagem= $_POST["mensagem"];


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "De: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $mensagem ='<table width=100% align="center" style="border-collapse: collapse;padding-top:15px;">
        <tr>
            <th align="left"><img src="http://cursos.bluesundobrasil.com.br/images/bluesun/logo2.png" width="330px"><hr></th>
            
        </tr>
        <tr><td><b>Nome:</b> '.$nome.'</td>
        <tr><td><b>E-mail:</b> '.$email.'</td>
        <tr><td><b>Telefone:</b> '.$telefone.'</td>
        <tr><td><b>Celular:</b> '.$celular.'</td>
        <tr><td><b>Cidade:</b> '.$cidade.'</td>
        <tr><td><b>Estado:</b> '.$estado.'</td>
        <tr><td><b>Assunto:</b> '.$assunto.'</td>
        <tr><td><b>Mensagem:</b> '.$mensagem.'</td>
        
    </table>';

    if (@mail($to, $email, $mensagem, $headers))
    {
        echo 'Sua mensagem foi enviada com sucesso.';
    }else{
        echo 'Sua mensagem não pode ser entregue';
    }

?>