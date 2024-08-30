<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap_5.0.2/css/bootstrap.min.css') ?>">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">BiblioManager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><?= session()->get('user')['name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Se déconnecter</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto" action="#" method="get">
                    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-5 pt-5">
        <h2>Mes Livres Empruntés</h2>
        <div class="row">
            <?php foreach ($books as $book): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['title'] ?></h5>
                            <p class="card-text"><strong>Auteur:</strong> <?= $book['author'] ?></p>
                            <p class="card-text"><strong>Type:</strong> <?= $book['type'] ?></p>
                            <p class="card-text"><strong>Année de publication:</strong> <?= $book['published_year'] ?></p>
                            <p class="card-text"><strong>Description:</strong> <?= strlen($book['description']) > 100 ? substr($book['description'], 0, 100) . '...' : $book['description'] ?></p>
                            <p class="card-text"><small class="text-muted">Date d'échéance : <?= date('d-m-Y', strtotime($book['due_date'])) ?></small></p>
                            <a href="<?= site_url('book/return/' . $book['book_id']) ?>" class="btn btn-danger">Rendre</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="<?= base_url('bootstrap_5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
