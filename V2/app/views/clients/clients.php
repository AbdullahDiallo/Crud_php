<!DOCTYPE html>
<html>

<head>
    <title>Liste des clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>

<?php include_once "nav.php"?>
    <div class="container">

        <h3 id="student-list-title"></h3>
        <div>
            <div style=" float:right"><a class="btn-add" href="/clients/create">Ajouter un clients</a> </div>
            <table class="students-table">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>


                </tr>

                <?php foreach ($clients as $client): ?>
                    <tr class="student-info">
                        <td><?= htmlspecialchars($client['nom']) ?></td>
                        <td><?= htmlspecialchars($client['prenom']) ?></td>
                        <td><?= htmlspecialchars($client['email']) ?></td>
                        <td><?= htmlspecialchars($client['telephone']) ?></td>
                        <td>
                        <a class="btn-submit" href="/clients/show?id=<?= $client['id'] ?>">Details du client</a> --|-- <a class="btn btn-secondary" href="/clients/edit?id=<?= $client['id'] ?>">Modifier</a> --|-- <a class="btn-cancel" href="/clients/delete?id=<?= $client['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="js/scp_cours.js"></script>
</body>

</html>