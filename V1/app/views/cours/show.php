<!DOCTYPE html>
<html>

<head>
    <title>Détails du Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <?php include_once "nav.php" ?>
    <div class="container mt-5 bg-white card-body">
        <h1>Détails du cours</h1>
        <div class="mb-3">
            <label><strong>Nom:</strong> <?= htmlspecialchars($cour['nom_cours']) ?></label>
        </div>
        <div class="mb-3">
            <label><strong>Prénom:</strong> <?= htmlspecialchars($cour['code_cours']) ?></label>
        </div>
        <div class="mb-3">
            <label><strong>Email:</strong> <?= htmlspecialchars($cour['nombre_heures']) ?></label>
        </div>



    </div>
</body>

</html>