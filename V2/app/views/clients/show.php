<!DOCTYPE html>
<html>
<head>
    <title>Détails du Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<?php include_once "nav.php"?>
    <div class="container mt-5 bg-white card-body">
        <h1>Détails du Client</h1>
        <div class="mb-3">
            <label><strong>Nom:</strong> <?= htmlspecialchars($client['nom']) ?></label>
        </div>
        <div class="mb-3">
            <label><strong>Prénom:</strong> <?= htmlspecialchars($client['prenom']) ?></label>
        </div>
        <div class="mb-3">
            <label><strong>Email:</strong> <?= htmlspecialchars($client['email']) ?></label>
        </div>
        <div class="mb-3">
            <label><strong>Téléphone:</strong> <?= htmlspecialchars($client['telephone']) ?></label>
        </div>
        
        <h2>Rendez-vous</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rendezVous as $rdv): ?>
                    <tr>
                        <td><?= htmlspecialchars($rdv['date']) ?></td>
                        <td><?= htmlspecialchars($rdv['heure']) ?></td>
                        <td><?= htmlspecialchars($rdv['description']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
