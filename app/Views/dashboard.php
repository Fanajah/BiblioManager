<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Books</a>
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
        <div class="d-flex justify-content-between mb-3">
            <!-- Exemple de menu déroulant -->
            <select class="form-select w-auto" aria-label="Tri des livres">
                <option selected>Trier par</option>
                <option value="1">ID</option>
                <option value="2">Titre</option>
                <option value="3">Type</option>
                <option value="4">Auteur</option>
                <option value="5">Année de publication</option>
                <option value="6">Stock</option>
            </select>
        </div>

        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Auteur</th>
                    <th>Année de publication</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book): ?>
                    <tr>
                        <td><?= $book['id'] ?></td>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['type'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td><?= $book['published_year'] ?></td>
                        <td><?= $book['stock'] ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm text-white fw-bold">Visualiser</a>
                            <a href="#" class="btn btn-success btn-sm text-white fw-bold">Emprunter</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="<?= base_url('bootstrap_5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
