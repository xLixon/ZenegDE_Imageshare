<?php
session_start();
$date = date("m-d-y | H:i:s");
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

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$site_id = generateRandomString(5);

$conf = json_decode(file_get_contents("config/config.json"), true);
$db_host = $conf['db_host'];
$db_user = $conf['db_user'];
$db_pass = $conf['db_pass'];
$db_name = $conf['db_name'];

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);



?>

    <html lang="de" class="h-100" dir="ltr"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="nlkHL6ytZaudXmAsLKs8BmG3Y8LbBNq54u3keVNo">

        <title>ZenegDE - Dein Linkshortener</title>


        <link href="https://puhli.icu/uploads/brand/favicon.png" rel="icon">



        <!-- Styles -->
        <link href="css/app.dark.css" rel="stylesheet" id="app-css">



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
                            <h1 class="display-4 font-weight-bold text-center">Kürze deine langen, unordentlichen Links jetzt mit dem ZenegDE Linkshortener</h1>

                            <div class="row">
                                <div class="col-2 d-none d-lg-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.4 37.4" style="width: 1.4rem; height: 1.4rem; transform: rotate(-17deg); right: 2rem; top: 4rem; filter: blur(1px);" class="position-absolute"><path d="M26.5,3.1a7.81,7.81,0,0,1,7.8,7.8V26.5A7.64,7.64,0,0,1,32,32a7.45,7.45,0,0,1-5.5,2.3H10.9a7.81,7.81,0,0,1-7.8-7.8V10.9a7.81,7.81,0,0,1,7.8-7.8H26.5m0-3.1H10.9A10.94,10.94,0,0,0,0,10.9V26.5A10.94,10.94,0,0,0,10.9,37.4H26.5A10.94,10.94,0,0,0,37.4,26.5V10.9A10.94,10.94,0,0,0,26.5,0Z" style="fill:#e53c5f"></path><path d="M28.8,10.9a2.3,2.3,0,1,1,2.3-2.3h0A2.2,2.2,0,0,1,29,10.9ZM18.7,12.5a6.2,6.2,0,1,1-6.2,6.2h0a6.17,6.17,0,0,1,6.14-6.2h.06m0-3.1a9.4,9.4,0,1,0,9.4,9.4h0A9.45,9.45,0,0,0,18.7,9.4Z" style="fill:#e53c5f"></path></svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 37.32" style="width: 1.7rem; height: 1.7rem; transform: rotate(22deg); right: 6rem; top: 2rem; filter: blur(1px);" class="position-absolute"><path d="M46,4.42a16.91,16.91,0,0,1-5.4,1.5A9.86,9.86,0,0,0,44.8.72a19.29,19.29,0,0,1-6,2.3,9.4,9.4,0,0,0-16.3,6.4,16.35,16.35,0,0,0,.2,2.2A27,27,0,0,1,3.2,1.72a9.41,9.41,0,0,0,3,12.6,8.25,8.25,0,0,1-4.3-1.2v.1a9.51,9.51,0,0,0,7.6,9.3,10.55,10.55,0,0,1-2.5.3,12.09,12.09,0,0,1-1.8-.2,9.35,9.35,0,0,0,8.8,6.5A19.14,19.14,0,0,1,0,33a26.43,26.43,0,0,0,14.44,4.3c17.4,0,26.9-14.4,26.9-26.9V9.22A15.36,15.36,0,0,0,46,4.42Z" style="fill:#55acee"></path></svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.4 36.4" style="width: 1.3rem; height: 1.3rem; transform: rotate(-5deg); right: 4.5rem; top: 6rem; filter: blur(1px);" class="position-absolute"><path d="M12.6,0H23.8C34,0,36.4,2.4,36.4,12.6V23.8C36.4,34,34,36.4,23.8,36.4H12.6C2.4,36.4,0,34,0,23.8V12.6C0,2.4,2.4,0,12.6,0Z" style="fill:#5181b8;fill-rule:evenodd"></path><path d="M29.8,12.5c.2-.6,0-1-.8-1H26.4a1.31,1.31,0,0,0-1.2.8,18.63,18.63,0,0,1-3.3,5.4c-.6.6-.9.8-1.2.8s-.4-.2-.4-.8V12.5c0-.7-.2-1-.8-1H15.3c-.4,0-.7.2-.7.6h0c0,.6,1,.8,1.1,2.6v3.9c0,.9-.2,1-.5,1-.9,0-3.1-3.3-4.4-7.1-.3-.7-.5-1-1.2-1H7c-.8,0-.9.4-.9.8,0,.7.9,4.2,4.2,8.8,2.2,3.2,5.3,4.9,8.1,4.9,1.7,0,1.9-.4,1.9-1V22.6c0-.8.2-.9.7-.9s1.1.2,2.6,1.7c1.8,1.8,2.1,2.6,3.1,2.6h2.7c.8,0,1.1-.4.9-1.1a11.65,11.65,0,0,0-2.2-3.1c-.6-.7-1.5-1.5-1.8-1.9a.91.91,0,0,1,0-1.2C26.24,18.7,29.5,14.1,29.8,12.5Z" style="fill:#fff;fill-rule:evenodd"></path></svg>
                                </div>

                                <div class="col-12 col-lg-8">
                                    <div class="form-group mt-5" id="short-form-container">
                                        <form method="post" id="short-form">
                                            <input type="hidden" name="_token" value="nlkHL6ytZaudXmAsLKs8BmG3Y8LbBNq54u3keVNo">                                        <div class="form-row">
                                                <div class="col-12 col-sm">
                                                    <input type="text" dir="ltr" autocomplete="off" autocapitalize="none" spellcheck="false" name="url" class="form-control form-control-lg font-size-lg" placeholder="Gib deinen zu kürzenden Link ein" autofocus="" required>
                                                    <hr style="border-top: 2px solid #ed563b">
                                                </div>

                                                <br><br>
                                                <br>
                                                <label for="redirect_delay_dropdown"><h3>Wähle aus, wie lange der Nutzer is zur Weiterleitung warten soll</h3></label><br>
                                                <select name="redirect_delay" id="redirect_delay_dropdown" class="dropdown" required>
                                                    <option value="0">Sofort</option>
                                                    <option value="1">1 Sek.</option>
                                                    <option value="2">2 Sek.</option>
                                                    <option value="3" selected>3 Sek.</option>
                                                    <option value="4">4 Sek.</option>
                                                    <option value="5">5 Sek.</option>
                                                </select>
                                                <br>
                                                <div class="col-12 col-sm-auto">
                                                    <button class="btn btn-primary btn-lg btn-block font-size-lg mt-3 mt-sm-0" type="submit">Kürzen</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Teilen</h6>
                                                    <button type="button" class="close d-flex align-items-center justify-content-center width-12 height-14" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-3 height-3" viewBox="0 0 16 16"><path d="M14.8,0a1.2,1.2,0,0,1,.85,2.05L9.7,8l5.95,5.95a1.2,1.2,0,0,1-1.7,1.7L8,9.7,2.05,15.65a1.2,1.2,0,0,1-1.7-1.7L6.3,8,.35,2.05A1.2,1.2,0,1,1,2.05.35L8,6.3,13.95.35A1.2,1.2,0,0,1,14.8,0Z"></path></svg></span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

            </footer>        </div>


    </body></html>
    <?php
}
