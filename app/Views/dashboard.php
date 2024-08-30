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
                <form class="d-flex ms-auto" action="<?= site_url('dashboard') ?>" method="get">
                    <input class="form-control me-2" type="search" name="search" placeholder="Rechercher" aria-label="Search" value="<?= esc($search) ?>">
                    <button class="btn btn-outline-light" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-5 pt-5">
        <div class="d-flex justify-content-between mb-3">
            <!-- Indication "Tri" et menus déroulants pour trier les livres -->
            <div class="d-flex align-items-center">
                <span class="me-2">Tri :</span>
                <form action="<?= site_url('dashboard') ?>" method="get" class="d-flex">
                    <input type="hidden" name="search" value="<?= esc($search) ?>">
                    <select class="form-select me-2" name="sort" aria-label="Tri des livres" onchange="this.form.submit()">
                        <option value="" disabled selected>Trier par</option>
                        <option value="1" <?= $sort === '1' ? 'selected' : '' ?>>ID</option>
                        <option value="2" <?= $sort === '2' ? 'selected' : '' ?>>Titre</option>
                        <option value="3" <?= $sort === '3' ? 'selected' : '' ?>>Type</option>
                        <option value="4" <?= $sort === '4' ? 'selected' : '' ?>>Auteur</option>
                        <option value="5" <?= $sort === '5' ? 'selected' : '' ?>>Année de publication</option>
                        <option value="6" <?= $sort === '6' ? 'selected' : '' ?>>Stock</option>
                    </select>
                    <select class="form-select" name="direction" aria-label="Direction du tri" onchange="this.form.submit()">
                        <option value="asc" <?= $direction === 'asc' ? 'selected' : '' ?>>Croissant</option>
                        <option value="desc" <?= $direction === 'desc' ? 'selected' : '' ?>>Décroissant</option>
                    </select>
                </form>
            </div>
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
                            <button type="button" class="btn btn-info btn-sm text-white fw-bold" data-bs-toggle="modal" data-bs-target="#bookModal" data-title="<?= esc($book['title']) ?>" data-description="<?= esc($book['description']) ?>">
                                Visualiser
                            </button>
                            <button type="button" class="btn btn-success btn-sm text-white fw-bold">Emprunter</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="bookModalLabel">Détails du Livre</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5 id="modalTitle"></h5>
            <p id="modalDescription"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var bookModal = document.getElementById('bookModal');
            bookModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Bouton cliqué pour ouvrir le modal
            var title = button.getAttribute('data-title'); // Extraire le titre
            var description = button.getAttribute('data-description'); // Extraire la description

            var modalTitle = bookModal.querySelector('#modalTitle');
            var modalDescription = bookModal.querySelector('#modalDescription');

            modalTitle.textContent = title;
            modalDescription.textContent = description;
            });
        });
    </script>


    <script src="<?= base_url('bootstrap_5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
