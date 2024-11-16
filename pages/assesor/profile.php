<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/static/stylesheets/assesor/profile.css">
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
            <li class="item">
                <a href="">
                    <button><img src="" alt="">
                        <p>Administration</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="">
                    <button><img src="" alt="">
                        <p>Access</p>
                    </button>
                </a>
            </li>
        </ul>
        <ul class="sidebar-controls">
            <li class="item">
                <a href="/index.php">
                    <button><img src="/static/pictures/template-icons/logout.svg" alt="">
                        <p>Logout</p>
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
        <section class="profile-header">
            <form action="" method="get">
                <table>
                    <tr>
                        <td>Nombre Completo</td>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                    </tr>
                    <tr>
                        <td>Identificador</td>
                    </tr>
                </table>
            </form>
        </section>

        <section class="profile">
            <div class="information">
                <form action="" method="get">
                    <table>
                        <tr>
                            <td>row1</td>
                        </tr>
                        <tr>
                            <td>row2</td>
                        </tr>
                        <tr>
                            <td>row3</td>
                        </tr>
                        <tr>
                            <td>row4</td>
                        </tr>
                        <tr>
                            <td>row5</td>
                        </tr>
                        <tr>
                            <td>row6</td>
                        </tr>
                        <tr>
                            <td>row7</td>
                        </tr>
                        <tr>
                            <td>row8</td>
                        </tr>
                    </table>
                    <div class="controls">
                        <button class="submit">Editar Datos</button>
                        <button class="submit">Borrar Perfil</button>
                    </div>
                </form>
            </div>
        </section>

        <footer class="escalia-sponsor">
            Desarrollado por ESCALIA Studios
        </footer>
    </main>

    <script src="/static/scripts/main.js"></script>
</body>

</html>