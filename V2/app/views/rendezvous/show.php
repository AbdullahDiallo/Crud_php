<!DOCTYPE html>
<html>

<head>
    <title>Liste des Rendez-vous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>

<?php include_once "nav.php"?>
    <div class="container">

        <h3 id="student-list-title"></h3>
        <div>
            <div style=" float:right"><a class="btn-add" href="/rendezvous/create">Nouveau Rendez-vous</a> </div>
            <table class="students-table">
                <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Description</th>
                <th>Client</th>
                <th>Actions</th>


                </tr>

                <?php foreach ($rendezVous as $rdv): ?>
                <tr class="student-info">
                    <td><?= htmlspecialchars($rdv['date']) ?></td>
                    <td><?= htmlspecialchars($rdv['heure']) ?></td>
                    <td><?= htmlspecialchars($rdv['description']) ?></td>
                    <td><?=htmlspecialchars($rdv['client_id']).' - ' .htmlspecialchars($rdv['client_nom']) . ' ' . htmlspecialchars($rdv['client_prenom']) ?></td>
                    <td>
                        <a class="btn btn-submit" href="/rendezvous/edit?id=<?= $rdv['id'] ?>">Modifier</a> |
                        <a class="btn btn-cancel" href="/rendezvous/delete?id=<?= $rdv['id'] ?>" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="js/scp.js"></script>
</body>

</html>