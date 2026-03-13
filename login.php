
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | glow belleza</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,400&family=Montserrat:wght@200;400;500&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="cursor-dot" id="cursor-dot"></div>
    <div class="cursor-outline" id="cursor-outline"></div>

    <a href="index.php" class="back-link">← Volver al Inicio</a>

    <section class="login-section">
        <div class="login-container">
            <div class="form-box login">
                <h2>Iniciar Sesión</h2>
                <form action="auth_login.php" method="POST">
                    <div class="input-box">
                        <input type="email" name="email" required placeholder="Correo Electrónico">
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" required placeholder="Contraseña">
                    </div>
                    <button type="submit" class="cta-button">Entrar</button>
                    <div class="switch-link">
                        <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>