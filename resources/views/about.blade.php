<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Moje CV</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4 mb-md-0 border-end">
                                <img
                                    src="{{ Vite::asset('resources/images/myimage.jpg') }}"
                                    alt="Zdjęcie profilowe"
                                    class="img-fluid rounded-circle mb-3 shadow-sm mx-auto d-block"
                                    style="max-width: 180px;"
                                >

                                <h1 class="h3 mb-0">Filip Kowalski</h1>
                                <p class="text-muted">Junior Web Developer</p>

                                <hr>

                                <ul class="list-unstyled small text-muted">
                                    <li><strong>Email:</strong> filip@example.com</li>
                                    <li><strong>Telefon:</strong> +48 123 456 789</li>
                                    <li><strong>Miasto:</strong> Warszawa</li>
                                </ul>
                            </div>

                            <div class="col-md-8 ps-md-4">
                                <section class="mb-4">
                                    <h2 class="h5 border-bottom pb-2 mb-3">Profil</h2>
                                    <p class="mb-0">
                                        Jestem początkującym programistą webowym, zainteresowanym PHP, Laravel
                                        oraz nowoczesnym frontendem. Lubię uczyć się nowych technologii i rozwijać
                                        swoje umiejętności poprzez praktyczne projekty.
                                    </p>
                                </section>

                                <section class="mb-4">
                                    <h2 class="h5 border-bottom pb-2 mb-3">Doświadczenie</h2>

                                    <div class="mb-3">
                                        <h3 class="h6 mb-1">Projekt uczelniany – Aplikacja Laravel</h3>
                                        <p class="text-muted small mb-1">2024 – obecnie</p>
                                        <p class="mb-0 small">
                                            Tworzenie prostej aplikacji CRUD w Laravel, konfiguracja routingu,
                                            Blade, migracje baz danych, integracja z Bootstrapem oraz Vite.
                                        </p>
                                    </div>

                                    <div>
                                        <h3 class="h6 mb-1">Projekty własne – Strony WWW</h3>
                                        <p class="text-muted small mb-1">2023 – 2024</p>
                                        <p class="mb-0 small">
                                            Kilka hobbystycznych stron statycznych przy użyciu HTML, CSS i podstaw
                                            JavaScript, służących do nauki responsywności oraz layoutu.
                                        </p>
                                    </div>
                                </section>

                                <section class="mb-4">
                                    <h2 class="h5 border-bottom pb-2 mb-3">Umiejętności</h2>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="mb-0 small">
                                                <li>PHP / Laravel (podstawy)</li>
                                                <li>HTML5, CSS3</li>
                                                <li>Bootstrap 5</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="mb-0 small">
                                                <li>Git / GitHub</li>
                                                <li>Podstawy SQL / SQLite</li>
                                                <li>Visual Studio Code</li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <h2 class="h5 border-bottom pb-2 mb-3">Edukacja</h2>

                                    <p class="mb-0 small">
                                        <strong>Informatyka – studia</strong><br>
                                        Uczelnia XYZ<br>
                                        2023 – obecnie
                                    </p>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
