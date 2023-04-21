
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Téléthon La Couronne</title>
    <link rel="shortcut icon" href="img/mascotte_babouche.svg" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Raleway&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <header>
        <div class="container-fluid d-flex justify-content-between logo">
            <img src="/public/css/img/logo-telethon-babouche.png" alt="" width="20%">
            <h2 class="head-title fw-bold">Actions Telethon</h2>
            <span class="topcompteur">
                <p><?= str_pad($total, 10, 0, STR_PAD_LEFT) ?> &euro;</p>
            </span>
        </div>

        <nav class="container-fluid">
            <ul class="container d-flex justify-content-between main-menu">
                <li class="is-active ft-bold"><a href="index.php?controller=collects">Collectes</a></li>
                <li class="fw-bold"><a href="index.php?controller=partners">Partenaires</a></li>
                <li class="fw-bold"><a href="index.php?controller=stands">Stands</a></li>
                <li class="fw-bold"><a href="index.php?controller=users">Utilisateurs</a></li>
                <br>
            </ul>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="userMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-3"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuDropdown">
                    <li><a class="dropdown-item" href="#">Mon profil</a></li>
                    <li><a class="dropdown-item" href="#">Se deconnecter</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <h3 class="page-title fw-bold fst-italic"><?= $title ?></h3>
       <?php if(isset($_SESSION['msg'])) : ?>
        <div class="msg <?=  $_SESSION['msg']['css'] ?>">
            <?= $_SESSION['msg']['txt'] ?>
        </div>
        <?php unset($_SESSION['msg']); endif ?>
        <div>
            <?= $content ?>
        </div>
    </main>

    <footer>
        <div class="container-fluid">
            <div class="container d-flex justify-content-between fw-bold">
                <a href="">Aide</a>
                <a href="">RGPD</a>
                <a href="">AFM - Telethon 2023</a>
            </div>
        </div>
    </footer>
</body>

</html>
