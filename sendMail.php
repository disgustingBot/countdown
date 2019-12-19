<?php //_________________________________________GL_HF____________________________________________
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require 'vendor/autoload.php';
include_once 'dbh.inc.php';
/*This bit sets the URLs of the supporting pages.
If you change the names of any of the pages, you will need to change the values here.*/
$feedback_page = "index.php";
// $error_page = "error_message.html";
// $thankyou_page = "profesionales/index.php";






// ddbb: multiviahr_suscriptions
// user: multiviahr_admin
// pass: ERh[lZeL6UGR








// WG-Gesucht numero de anuncio:
// 6614626

/*This next bit loads the form field data into variables.
If you add a form field, you will need to add it here.*/
// $a1 = $_POST['a1'];
// $a2 = $_POST['a2'];
// $a3 = $_POST['a3'];
// $a4 = $_POST['a4'];
// $a5 = $_POST['a5'];
// $a6 = $_POST['a6'];


$fst = $_POST['a1'];
$lst = $_POST['a2'];
$cny = $_POST['a3'];
$eml = $_POST['a4'];
$phn = $_POST['a5'];
// $tyc = $_POST['a6'];
if($_POST['a6']=='on'){$tyc=1;}else{$tyc=0;}
$timestamp = date("Y-m-d H:i:s");

if($_POST['a9'] != ""){
  header( "Location: https://multiviahr.info/?mail=nope" . $_POST['a9'] );
  exit;
} else {





  // Error handlers
  // Check if imput characters are valid
  if (preg_match("/[\']/",$uid)||preg_match("/[\']/",$fst)||preg_match("/[\']/",$lst)||preg_match("/[\']/",$eml)||preg_match("/[\']/",$pwd)) {
  	echo"if";exit(); // if = invalid fields
  // }else{$qry="SELECT * FROM users WHERE eml = '$eml';";$ress=$conn->query($qry);$resp=$ress->fetch_all(MYSQLI_ASSOC);
  	// if($resp){echo"mt";exit(); // mt = mail taken
  	}else{ // Insert the user into the database
  		try{
  	    $qry=$conn2->prepare("INSERT INTO suscriptions (fst,lst,cny,eml,phn,tyc) VALUES ('$fst','$lst','$cny','$eml','$phn','$tyc');");
  	    $qry->execute();

  			// echo"ok";
  		}catch(PDOException $e){echo 'Error: '.$e->getMessage()." file: ".$e->getFile()." line: ".$e->getLine();exit;}
  		// exit();
  	}










  //______________________________Datos guardados en variables____________________________________
  //___________________________ENVIO el mail a quien corresponda__________________________________

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
    //Server settings
    $mail->SMTPDebug = 4;                                // Enable verbose debug output
    $mail->isSMTP();                                     // Set mailer to use SMTP
    // $mail->Host = 'smtp.lattedev.com';                // Specify main and backup SMTP servers
    $mail->Host = gethostbyname('webmail.multiviahr.info'); // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                              // Enable SMTP authentication
    // $mail->Username = 'idemo@idemomotors.com';           // SMTP username
    // $mail->Password = 'Idemomotors25';                   // SMTP password
    $mail->Username = 'test@multiviahr.info';       // SMTP username
    $mail->Password = 'X]f[uHK[[8TB';            // SMTP password
    $mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                   // TCP port to connect to
    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ));

    //Recipients
    $mail->setFrom('test@multiviahr.info', 'Consultas Interflex');
    // $mail->addAddress('molinerozadkiel@gmail.com', 'Markus');        // Add a recipient
    $mail->addAddress('molinerozadkiel@gmail.com', 'Interflex');             // Add a recipient
    // $mail->addAddress($email_address, $first_name);               // Add a recipient
    // $mail->addAddress('ellen@example.com');                       // Name is optional
    $mail->addReplyTo('webdesign@mediactiu.com', 'Consultas Interflex');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nueva consulta de '.$a1;
    $mail->Body    =
      'nombre: '.$fst.'<br>'.
      'apellido: '.$lst.'<br>'.
      'empresa: '.$cny.'<br>'.
      'e-mail: '.$eml.'<br>'.
      'telefono: '.$phn.'<br>'.
      'terms and conditions: '.$tyc.'<br>'.
      'fecha y hora: '.$timestamp;

    $mail->AltBody =
      'nombre: '.$fst.'<br>'.
      'apellido: '.$lst.'<br>'.
      'empresa: '.$cny.'<br>'.
      'e-mail: '.$eml.'<br>'.
      'telefono: '.$phn.'<br>'.
      'terms and conditions: '.$tyc.'<br>'.
      'fecha y hora: '.$timestamp;

    // header( "Location: $thankyou_page" );
    // header( "Location: index.php?mail=success" );
    header( "Location: https://multiviahr.info/?mail=success" );
    $mail->send();
    exit;
  } catch (Exception $e) {
    header( "Location: https://multiviahr.info/?mail=error" );
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      // header( "Location: index.php?mail=error" );
    exit;
  }
}
//______________________________________$mail ENVIADO_________________________________________
//__________________________________________GG_WP_____________________________________________?>
