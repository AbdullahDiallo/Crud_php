<!DOCTYPE html>
<html>

<head>
    <title>Liste des cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <?php include_once "nav.php" ?>

    <div class="container">

        <h3 id="student-list-title"></h3>
        <div>
            <div style=" float:right"><a class="btn-add" href="/cours/create">Ajouter un cours</a> </div>
            <table class="students-table">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Code cours</th>
                    <th>Nombre d'heures</th>
                    <th>Actions</th>
                </tr>

                <?php while ($row = $cour->fetch_assoc()) : ?>
                    <tr class="student-info">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nom_cours'] ?></td>
                        <td><?= $row['code_cours'] ?></td>
                        <td><?= $row['nombre_heures'] ?>H</td>

                        <td>
                            <a class="btn btn-secondary" href="/cours/show?id=<?= $row['id'] ?>">Details</a> --|-- <a class="btn-submit" href="/cours/edit?id=<?= $row['id'] ?>">Modifier</a> --|-- <a class="btn-cancel" href="/cours/delete?id=<?= $row['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <script src="js/scp_cours.js"></script>
</body>

</html>