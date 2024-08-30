<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioManager - Accueil</title>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('bootstrap_5.0.2/css/bootstrap.min.css') ?>">
    <style>
        .container {
            text-align: center;
            margin-top: 100px;
        }
        .btn-custom {
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue dans BiblioManager</h1>
        <img src="<?= base_url('favicon.ico') ?>" alt="Icône de BiblioManager" style="width: 100px; height: 100px;">
        <div class="mt-5">
            <a href="<?= site_url('login') ?>" class="btn btn-primary btn-custom">Se Connecter</a>
            <a href="<?= site_url('register') ?>" class="btn btn-secondary btn-custom">S'inscrire</a>
        </div>
    </div>
</body>
</html>
