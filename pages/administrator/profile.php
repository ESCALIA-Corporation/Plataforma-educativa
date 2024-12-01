<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="/static/stylesheets/template.css">
    <link rel="stylesheet" href="/static/stylesheets/administrator/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="sidebar" id="sidebar">
        <div class="menu-box">
            <button id="menu-button"><img src="/static/pictures/template-icons/menu.svg" alt=""></button>
        </div>
        <ul class="menu">
            <li class="item"><a href="/pages/administrator/dashboard.php">
                    <button><img src="/static/pictures/template-icons/dashboard.svg" alt="">
                        <p>Panel</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="/pages/administrator/administration.php">
                    <button><img src="/static/pictures/template-icons/settings.svg" alt="">
                        <p>Administracion</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="/pages/administrator/access.php">
                    <button><img src="/static/pictures/template-icons/admin-panel.svg" alt="">
                        <p>Acceso</p>
                    </button>
                </a>
            </li>
        </ul>
        <ul class="sidebar-controls">
            <li class="item">
                <a href="/index.php">
                    <button><img src="/static/pictures/template-icons/logout.svg" alt="">
                        <p>Salir</p>
                    </button>
                </a>
            </li>
            <li class="item"><button class="active">
                    <img src="/static/pictures/template-icons/person.svg" alt="">
                    <p>Perfil</p>
                </button>
            </li>
        </ul>
    </header>
    <main class="content" id="content">
        <section class="profile-head-bg">

        </section>
        <div style="display: flex; align-items: center; justify-content: center;">
            <section class="profile-header">
                <div class="get-profile-data">
                    <?php include __DIR__ . '/../../static/scripts/php/get/view-profile.php'; ?>
                </div>
            </section>

            <section class="profile-controls">
                <form action="/static/scripts/php/update/update-profile.php" method="post">
                    <div class="profile-placeholder">
                        <input class="input" type="text" name="n-descripcion" placeholder="Descripcion" required>
                    </div>
                    <div class="profile-placeholder">
                        <input class="input" type="text" name="usuario" placeholder="Nombre de Usuario" required>
                    </div>
                    <div class="profile-placeholder">
                        <input class="input" type="text" name="contrasenaNueva" placeholder="Contraseña" required>
                    </div>

                    <button class="submit" type="submit">Modificar Perfil</button>
                    <button class="submit" style="background-color: red;">Eliminar Cuenta</button>
                </form>
        </div>
        </section>

        <footer class="escalia-sponsor">
            <h2>1.0 Version Estable - Happy Bite Collection</h2>
            <br>
            <P>Detalles de la version:</P>
            <ul>
                <li>- Integración con base de datos</li>
                <li>- Cambio de apariencia</li>
            </ul>
            <br>
            Puedes consultar los cambios proximos en la version de codigo abierto
        </footer>
    </main>

    <script src="/static/scripts/main.js"></script>
</body>

</html>