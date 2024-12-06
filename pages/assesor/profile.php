<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/static/stylesheets/administrator/profile.css">
    <link rel="stylesheet" href="/static/stylesheets/template.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="sidebar" id="sidebar">
        <div class="menu-box">
            <button id="menu-button"><img src="/static/pictures/template-icons/menu.svg" alt=""></button>
        </div>
        <ul class="menu">
            <li class="item">
                <a href="/pages/assesor/dashboard.php"><button>
                        <img src="/static/pictures/template-icons/dashboard.svg" alt="">
                        <p>Dashboard</p>
                    </button>
            </li>
        </ul>
        <ul class="sidebar-controls">
            <li class="item">
                <a href="/static/scripts/php/logout.php">
                    <button>
                        <img src="/static/pictures/template-icons/logout.svg" alt="">
                        <p>Salir</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <button class="active"><img src="/static/pictures/template-icons/person.svg" alt="">
                    <p>Profile</p>
                </button>
            </li>
        </ul>
    </section>
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

                </form>
                <form action="/static/scripts/php/delete/delete-asesor.php" method="post">
                    <button class="submit" style="background-color: red;">Eliminar Cuenta</button>
                </form>
            </section>
        </div>
    </main>

    <script src="/static/scripts/main.js"></script>
</body>

</html>