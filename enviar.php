<?php

$email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
$texto = filter_var($_POST["txtArea"], FILTER_SANITIZE_STRING);

if (!empty($email) && !empty($texto)) {
    $destinatario = 'maxiamorerc@gmail.com';
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

        $headers .= "From: $nombre <$email>\r\n";

        //ruta del mensaje desde origen a destino
        $headers .= "Return-path: $destino\r\n";

        mail($destino, $asunto, $cuerpo, $headers);

        echo "Email enviado correctamente";
}
