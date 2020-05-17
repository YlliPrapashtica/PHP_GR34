<!-- !IMPORTANT!
In order for this to work from localhost, it send the email from the given email in php.ini
Required changes in php.ini: 
[mail function]
; For Win32 only.
; http://php.net/smtp
SMTP=SMTP.gmail.com
; http://php.net/smtp-port
smtp_port=587

Required changes in sendmail.ini:
[sendmail]

; you must change mail.mydomain.com to your smtp server,
; or to IIS's "pickup" directory.  (generally C:\Inetpub\mailroot\Pickup)
; emails delivered via IIS's pickup directory cause sendmail to
; run quicker, but you won't get error messages back to the calling
; application.

smtp_server=smtp.gmail.com

; smtp port (normally 25)

smtp_port=587

smtp_ssl=tls

default_domain=STMP.gmail.com

; log smtp errors to error.log (defaults to same directory as sendmail.exe)
; uncomment to enable logging

error_logfile=error.log

; create debug log as debug.log (defaults to same directory as sendmail.exe)
; uncomment to enable debugging

debug_logfile=debug.log

; if your smtp server requires authentication, modify the following two lines

auth_username=hoteltekniku@gmail.com
auth_password= -->


<?php

$name = $_POST['name'];
$emailfrom = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(empty($name) || empty($emailfrom) || empty($subject) || empty($message)){
    header("Location: contact.php?error=emptyfields");
    exit();
}else{
    $email =filter_var($email, FILTER_SANITIZE_EMAIL);
    $email= filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email){
    echo "Invalid Sender's Email";
    }

$emailto = "hoteltekniku@gmail.com";
$headers = "From: ".$emailfrom;
$text = "Recieved a message from: ".$name."\n\n".$message;

mail($emailto, $subject, $text, $headers);
header("Location: index.php?mailsent");

include('contact.php');
}
?>