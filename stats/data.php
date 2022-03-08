<?php
session_start();
$data_loaded = false;
if (isset($_SESSION['datetime']) && isset($_SESSION['secret']) && isset($_SESSION['id'])) {
    $datetime = $_SESSION['datetime'];
    $secret = $_SESSION['secret'];
    $id = $_SESSION['id'];
    $clicks = $_SESSION['clicks'];
    $imgname = $_SESSION['imgname'];
    $imgpath = $_SESSION['imgpath'];
    $title = "Folgende Daten wurden zum Bild mit der ID <stron>" . $id . "</stron> gefunden";
    $data_loaded = true;

    $url = "https://img.zeneg.de/".$imgpath;

}
if ($data_loaded == false) {
    $datetime = "Keine Daten erfasst";
    $secret = "Keine Daten erfasst";
    $id = "Keine Daten erfasst";
    $redirect_url = "Keine Daten erfasst";
    $redirect_delay = "Keine Daten erfasst";
    $clicks = "Keine Daten erfasst";
    $title = "Es konnten keine Daten geladen werden.";
}
session_destroy();
?>
<html lang="de" class="h-100" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="nlkHL6ytZaudXmAsLKs8BmG3Y8LbBNq54u3keVNo">

    <title>ZenegDE - Dein Linkshortener</title>


    <link href="https://puhli.icu/uploads/brand/favicon.png" rel="icon">


    <!-- Styles -->
    <link href="../css/app.dark.css" rel="stylesheet" id="app-css">


    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
</head>
<body class="d-flex flex-column">
<div id="header" class="header sticky-top shadow bg-base-0 z-1025">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0 py-3">
            <a href="https://short.zeneg.de" aria-label="ZenegDE" class="navbar-brand p-0">
                <div class="logo">
                    <img src="https://zeneg.de/assets/images/logos/ZenegDE/redNameCenterUpper.png">
                </div>
            </a>

        </nav>
    </div>
</div>

<div class="d-flex flex-column flex-fill ">
    <div class="flex-fill">
        <div class="bg-base-0 position-relative">
            <div class="container position-relative py-5 py-sm-6">
                <div class="row">
                    <div class="col-12 py-sm-5">
                        <h1 class="display-4 font-weight-bold text-center"><?= $title ?></h1>
                        <div class="row" >
                            <div class="col-12 col-lg-8">
                                <div class="form-group mt-5" id="short-form-container" style="border-bottom: 1px black solid">
                                    <h4>Bild Name: <?= $imgname ?></h4>
                                </div>
                                <div class="form-group mt-5" id="short-form-container" style="border-bottom: 1px black solid">
                                    <h4>Bild Link: <a href="<?= $url ?>"><?= "https://" . $url  ?></a> </h4>
                                </div>
                                <div class="form-group mt-5" id="short-form-container" style="border-bottom: 1px black solid">
                                    <h4>Bild ID: <?= $id ?></h4>
                                </div>
                                <div class="form-group mt-5" id="short-form-container" style="border-bottom: 1px black solid">
                                    <h4>Secret: <?= $secret ?></h4>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="form-group mt-5" id="short-form-container" style="border-bottom: 1px black solid">
                                    <h4>Datum und Zeit der Eintragung: <?= $datetime ?></h4>
                                </div>
                                <div class="form-group mt-5" id="short-form-container" style="border-bottom: 1px black solid">
                                    <h4>Klicks: <?= $clicks ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>

                <footer id="footer" class="footer bg-base-0">
                    <div class="container py-5">
                        <div class="row">
                            <div class="col-12 col-lg">
                                <ul class="nav p-0 mx-n3 mb-3 mb-lg-0 d-flex flex-column flex-lg-row">
                                    <li class="nav-item d-flex">
                                        <a href="https://zeneg.de/#contact-us" class="nav-link py-1">Kontakt</a>
                                    </li>
                                    <li class="nav-item d-flex">
                                        <a href="https://zeneg.de/legal/datenschutz.html" class="nav-link py-1">Datenschutz</a>
                                    </li>
                                    <li class="nav-item d-flex">
                                        <a href="https://zeneg.de/legal/impressum.html"
                                           class="nav-link py-1">Impressum</a>
                                    </li>
                                    <li class="nav-item d-flex">
                                        <a href="delete" class="nav-link py-1">Einen Link löschen</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-auto">
                                <div class="mt-auto py-1 d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-lg order-2 order-lg-1">
                                <div class="text-muted py-1">© 2021 ZenegDE. Template: Puhlic.</div>
                            </div>

                        </div>
                    </div>

                </footer>
            </div>


</body>
</html>