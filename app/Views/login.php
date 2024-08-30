<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('bootstrap_5.0.2/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="container mt-5">
        <h2>Se Connecter</h2>
        <form action="<?= site_url('login/process') ?>" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se Connecter</button>
        </form>
    </div>
</body>
</html>
