<?php
  require_once '../admin/dbconfig.php';
  require_once '../admin/conexion.php';

?>

<?php         
$stmt = $DB_con->prepare('SELECT * FROM contato_mapa WHERE contato_id_user = 165 ORDER BY contato_id ASC LIMIT 1');
$stmt->execute();
if($stmt->rowCount() > 0) {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
?>
         
   <?php
    $to = $row['email'];
    $nome = $_POST["nome"];
    $email= $_POST["email"];
    $mensagem= $_POST["mensagem"];
    $assunto= $_POST["assunto"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "De: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $mensagem ='<table width=100% align="center" style="border-collapse: collapse;padding-top:15px;">
        <tr>
            <th align="left"><img src="http://cursos.bluesundobrasil.com.br/images/bluesun/logo2.png"><hr></th>
            
        </tr>
        <tr><td><b>Nome:</b> '.$nome.'</td>
        <tr><td><b>E-mail:</b> '.$email.'</td>
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

<?php }
    } else { ?>
      <?php
    $to = 'site@bluesundobrasil.com.br';
    $nome = $_POST["nome"];
    $email= $_POST["email"];
    $mensagem= $_POST["mensagem"];
    $assunto= $_POST["assunto"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "De: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $mensagem ='<table width=100% align="center" style="border-collapse: collapse;padding-top:15px;">
        <tr>
            <th align="left"><img src="http://cursos.bluesundobrasil.com.br/images/bluesun/logo2.png"><hr></th>
            
        </tr>
        <tr><td><b>Nome:</b> '.$nome.'</td>
        <tr><td><b>E-mail:</b> '.$email.'</td>
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
<?php } ?>