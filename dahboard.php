<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Titre</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container mt-5 text-center">
    <!-- Formulaire d'ajout d'article -->
    <form action="article.php" method="post">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Nom</label>
            <input type="text" class="form-control" id="exampleInputName" name="nom">
        </div>
        <div class="mb-3">
            <label for="exampleInputPrice" class="form-label">Prix</label>
            <input type="number" class="form-control" id="exampleInputPrice" name="prix">
        </div>
        <div class="mb-3">
            <label for="exampleInputQuantity" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="exampleInputQuantity" name="quantite">
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Ajouter un article</button>
    </form>
</div>
</body>
</html>