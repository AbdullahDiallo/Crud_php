<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>

    <div class="container-form bg-white card card-body" style="max-width:480px; margin:0 auto; margin-top:110px;color:#000;">
        <h3>Modifier un étudiants</h3>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($students['id']) ?>" />
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= htmlspecialchars($students['nom']) ?>" placeholder="Nom" required />
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= htmlspecialchars($students['prenom']) ?>" placeholder="Prénom" required />
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($students['email']) ?>" placeholder="Email" required />
            </div>
            <div class="form-group">
                <label for="Telephone">Téléphone :</label>
                <input type="text" class="form-control" name="phone" id="Telephone" value="<?= htmlspecialchars($students['phone']) ?>" placeholder="Téléphone" required />
            </div>
            <div class="form-group">
                <label for="filiere">Filiere :</label>
                <input type="text" class="form-control" name="filiere" id="niveauann" value="<?= htmlspecialchars($students['filiere']) ?>" placeholder="Filiere" required />
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a class="btn btn-secondary" href="/etudiants">Retour à la liste</a>
        </form>
    </div>
    <script src="/js/valid.js"></script>
</body>

</html>