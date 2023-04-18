<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Téléthon La Couronne</title>
    <link rel="shortcut icon" href="img/mascotte_babouche.svg" type="image/svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <header>
        <div>
            <div><img src="" alt="" width="100%">
                <h1 class="text-center">Actions Telethon</h1>
                <div class="topcompteur">44 444 &euro;</div>
            </div>
        </div>

        <h1 class="title"><?= $title ?></h1>
            <nav>
                <ul class="main-menu">
                    <li class="is-active"><a href="index.php?controller=">Collectes</a></li>
                    <li class=""><a href="index.php?controller=">Partenaires</a></li>
                    <li class=""><a href="index.php?controller=">Stands</a></li>
                    <li class=""><a href="index.php?controller=uteurs">Utilisateurs</a></li>
                    <br>
                </ul>
                <ul class="user-menu">
                    <li>
                    Bonjour, {username}
                    <ul>
                        <li><a href="">Mon profil</a></li>
                        <li><a href="">Se deconnecter</a></li>
                    </ul>
                    </li>
                </ul>
            </nav>
    </header>

    <main>
        <h2 class="page-title"><?= $title ?></h2>
         <div class="">
            <?= $content ?>
        </div>
    </main>
 
    <footer>
        <div>
            <div>
                <a href="">Aide</a>
                <a href="">RGPD</a>
                <a href="">afm-telethon 2023</a>
            </div>
        </div>
    </footer>
</body>
</html>