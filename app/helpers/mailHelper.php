<?php

function Send_Verification_mail($token, $to)
{
    $subject = 'Account activation';

    $headers = "From: Study-aboard \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<html><body>';
    $message .= '<h1>Hello</h1>';
    $message .= '<p1>Please enter the link bellow in order to activate you account</p1><br>';
    $message .= '<a href="http://localhost/study-aboard/users/accountActivation?token='.$token.'" target="_blank">Study-aborad/Account/Activate</a>';
    $message .= '</body></html>';

    if(mail($to, $subject, $message, $headers)){
        return TRUE;
    } else {
        return FALSE;
    }
}

?>