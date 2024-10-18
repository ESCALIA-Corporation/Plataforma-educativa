<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión | Asesorias Academicas</title>
    <link rel="stylesheet" href="./static/stylesheets/template.css">
    <link rel="stylesheet" href="./static/stylesheets/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="login-header">
        <div class="logo-container">
            <img class="logo_itsoeh" src="./static/pictures/index/itsoeh_logo.png" alt="">
            <img class="logo_educacion" src="./static/pictures/index/educacion_logo.png" alt="">
        </div>
    </header>

    <main class="login">
        <section class="title">
            <h1>ASESORÍAS ACADEMICAS</h1>
            <p>Portal del Instituto Tecnologico Superior del Occidente del Estado de Hidalgo, con el
                objetivo de que todos los estudiantes obtengan asesorias academicas</p>
        </section>

        <section class="formulary">
            <div class="placeholder header-form">
                <h2>INICIA SESIÓN</h2>
                <p>Puedes iniciar sesion para solicitar una nueva asesoria o registrate y tener acceso al portal</p>
            </div>

            <div class="placeholder controls">
                <button class="submit" id="button-assesor">Profesor</button>
                <button class="submit" id="button-admin">Administrador</button>
            </div>

            <!-- Profesor -->
            <div class="login-form" id="panel-login-asesor">
                <h3>Profesor</h3>
                <p>Escribe tu usuario y contraseña</p>
                <form action="./pages/assesor/dashboard.html">
                    <div class="placeholder">
                        <input class="input" type="text" name="usuario" placeholder="usuario"><!--required--->
                        <input class="input" type="password" name="contraseña" placeholder="contraseña"><!--required--->
                    </div>
                    <div class="placeholder controls">
                        <button class="submit" type="submit">Iniciar Sesion</button>
                    </div>
                </form>
            </div>

            <!-- Adminsitrador -->
            <div class="login-form" id="panel-login-admin">
                <h3>Administrador</h3>
                <p>Escribe tu usuario y contraseña</p>
                <form action="./static/scripts/php/index.php" method='POST'>
                    <div class="placeholder">
                        <input class="input" type="text" name="adminusuario" placeholder="Usuario" required>
                        <input class="input" type="password" name="admincontraseña" placeholder="Contraseña" required>
                    </div>
                    <div class="placeholder controls">
                        <button class="submit" type="submit">Iniciar Sesion</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script src="./static/scripts/index.js"></script>
</body>

</html>
