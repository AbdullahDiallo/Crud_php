<!DOCTYPE html>
<html>

<head>
    <title>Ajouter un client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>


    <div class="container-form bg-white card card-body" style="max-width:480px; margin:0 auto; margin-top:110px;color:#000;">
        <h3>Ajouter un client</h3>
        <form action="" method="POST">
            <div class="form-group">


                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required />
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom" required>

            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="email" required>

            </div>
            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Téléphone" required>

            </div>


            <button class="btn btn-primary" type="submit">Ajouter</button>
            <a class="btn btn-secondary" href="/clients">Retour à la liste</a>
        </form>
    </div>
</body>
<script src="/js/validation.js"></script>
</html>