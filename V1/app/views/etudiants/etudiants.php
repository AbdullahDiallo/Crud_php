<!DOCTYPE html>
<html>

<head>
    <title>Liste des étudiants</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="/style/style.css">

<body>

    <?php include_once "nav.php" ?>
    <div class="container">

        <h3 id="student-list-title"></h3>
        <div>
            <div style=" float:right"><a class="btn-add" href="/etudiants/create">Ajouter un étudiant</a> </div>
            <table class="students-table">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Filière</th>
                    <th>Actions</th>
                </tr>

                <?php while ($row = $etudiants->fetch_assoc()) : ?>
                    <tr class="student-info">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['prenom'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['filiere'] ?></td>
                        <td>
                        <a class="btn btn-secondary" href="/etudiants/show?id=<?= $row['id'] ?>">Details</a> --|-- <a class="btn-submit" href="/etudiants/edit?id=<?= $row['id'] ?>">Modifier</a> --|-- <a class="btn-cancel" href="/etudiants/delete?id=<?= $row['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <script src="/js/scp.js"></script>
</body>

</html>