<!DOCTYPE html>
<html>

<head>
    <title>Modifier un client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>

    <div class="container-form bg-white card card-body" style="max-width:480px; margin:0 auto; margin-top:110px;color:#000;">
        <h3>Modifier un Client</h3>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']) ?>">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?= htmlspecialchars($client['nom']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text"  id="prenom" name="prenom" class="form-control" value="<?= htmlspecialchars($client['prenom']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($client['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" class="form-control" value="<?= htmlspecialchars($client['telephone']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="/clients" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
<script src="/js/validation.js"></script>
</html>