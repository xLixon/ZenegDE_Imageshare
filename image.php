<?php

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}

if(!function_exists('str_starts_with')){
    function str_starts_with(string $haystack, string $needle): bool {
        return \strncmp($haystack, $needle, \strlen($needle)) === 0;
    }
}

if(isset($_GET['id'])){
    $site_id = $_GET['id'];

    // $site_url = "Keine ID angegeben. Bitte überprüfen sie den Link.";

    $conf = json_decode(file_get_contents("config/config.json"), true);
    $db_host = $conf['db_host'];
    $db_user = $conf['db_user'];
    $db_pass = $conf['db_pass'];
    $db_name = $conf['db_name'];
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    $sql = "SELECT * FROM `images` WHERE id = ?";
    $sql2 = "UPDATE `images` SET `clicks`=clicks+1 WHERE id = ?";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $site_id);



    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $site_id);

    $stmt2->execute();
    $stmt->execute();



    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data
    $image_path = $user['path'];
    $image_name = $user['imagename'];

    if($image_path = "(unknown)"){
        header("Refresh:0;url=index.php");
    }

}

?>

<html lang="de" class="h-100" dir="ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="nlkHL6ytZaudXmAsLKs8BmG3Y8LbBNq54u3keVNo">

    <title>ZenegDE - Dein Imageuploader</title>


    <link href="https://puhli.icu/uploads/brand/favicon.png" rel="icon">



    <!-- Styles -->
    <link href="css/app.dark.css" rel="stylesheet" id="app-css">



    <style>
        @import url("https://rsms.me/inter/inter.css");
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
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
                        <h3 class="display-4 font-weight-bold text-center"><?= $image_name ?></h3>
                        <div class="row">
                            <img src="<?= $image_path ?>" class="center">
                            <a href="<?= $image_path ?>" download class="center">Download</a>
                    </div>
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
                                <a href="https://zeneg.de/legal/impressum.html" class="nav-link py-1">Impressum</a>
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
                        <div class="text-muted py-1">© 2022 ZenegDE. Template: Puhlic.</div>
                    </div>

                </div>
            </div>

        </footer>        </div>


</body></html>
