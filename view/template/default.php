<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Téléthon La Couronne</title>
    <link rel="shortcut icon" href="img/mascotte_babouche.svg" type="image/svg">
    <!-- BS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <header>
        <div class="container-fluid d-flex justify-content-between logo">
            <img src="/public/css/img/logo-telethon-babouche.png" alt="" width="20%">
            <h2>Actions Telethon</h2>
            <span class="topcompteur">44 444 &euro;</span>
        </div>

        <nav class="container-fluid d-flex justify-content-between navbar">
            <ul class="container main-menu">
                <li class="is-active"><a href="index.php?controller=collects">Collectes</a></li>
                <li class=""><a href="index.php?controller=partners">Partenaires</a></li>
                <li class=""><a href="index.php?controller=stands">Stands</a></li>
                <li class=""><a href="index.php?controller=users">Utilisateurs</a></li>
                <br>
            </ul>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="userMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-circle-user"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuDropdown">
                    <li><a class="dropdown-item" href="#">Mon profil</a></li>
                    <li><a class="dropdown-item" href="#">Se deconnecter</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <h3 class="page-title"><?= $title ?></h3>
         <div class="">
            <?= $content ?>
        </div>
    </main>
 
    <footer>
        <div class="container-fluid">
            <div class="container d-flex justify-content-between">
                <a href="">Aide</a>
                <a href="">RGPD</a>
                <a href="">AFM - Telethon 2023</a>
            </div>
        </div>
    </footer>
</body>
</html>