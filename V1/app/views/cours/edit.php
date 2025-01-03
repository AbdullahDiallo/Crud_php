<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>

    <div class="container-form bg-white card card-body" style="max-width:480px; margin:0 auto; margin-top:110px;color:#000;">
        <h3>Modifier un cours</h3>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($cour['id']) ?>" />
            <div class="form-group">
                <label for="nom_cours">Nom cours:</label>
                <input type="text" class="form-control" name="nom_cours" id="nom_cours" value="<?= htmlspecialchars($cour['nom_cours']) ?>" placeholder="Nom cours" required />
            </div>
            <div class="form-group">
                <label for="code_cours">Code cours :</label>
                <input type="text" class="form-control" name="code_cours" id="code_cours" value="<?= htmlspecialchars($cour['code_cours']) ?>" placeholder="Code cours" required />
            </div>
            <div class="form-group">
                <label for="nombre_heures">Nombre d'heures :</label>
                <input type="text" class="form-control" name="nombre_heures" id="nbr" value="<?= htmlspecialchars($cour['nombre_heures']) ?>" placeholder="Nombre d'heures" required />
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
            <a class="btn btn-secondary" href="/etudiants">Retour à la liste</a>
        </form>
    </div>
    <script src="/js/validation.js"></script>
</body>

</html>