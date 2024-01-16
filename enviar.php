<?php

$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$texto = filter_var($_POST["texto"], FILTER_SANITIZE_STRING);

if (!empty($email) && !empty($texto)) {
    $destinatario = 'maxiamorerc88@gmail.com';
    $asunto = 'Email de prueba';

    $cuerpo = '

        <html>
            <head>
            <title>Prueba de correo</title>
            </head>
            <body>
            <h1>Email de: ' . $email . '</h1>
            <p> ' . $texto . ' </p>
            </body>
        </html>
        ';

        //para el envio
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "content-type: text/html; charset=utf-8\r\n";

        //direccion del remitente

        $headers .= "From: $email\r\n";

        //ruta del mensaje desde origen a destino
        $headers .= "Return-path: $destinatario\r\n";

        mail($destinatario,$asunto,$cuerpo,$headers);

        echo "Email enviado correctamente";
} else {
    echo "Error al enviar el correo" ;
}
