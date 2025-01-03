<!DOCTYPE html>
<html>

<head>
    <title>Liste des Rendez-vous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>


    <div class="container-form bg-white card card-body" style="max-width:480px; margin:0 auto; margin-top:110px;color:#000;">
        <div class="container mt-5">
            <h3>Créer un Rendez-vous</h3>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="" method="POST">

                <div class="mb-3">
                    <label for="client_id" class="form-label">Client :</label>
                    <select id="client_id" name="client_id" class="form-control" required>
                        <option value="">-- Sélectionner un client --</option>
                        <?php foreach ($clients as $client): ?>
                            <option value="<?= $client['id'] ?>">
                                <?= htmlspecialchars($client['id']) . ' - ' .  htmlspecialchars($client['nom']) . ' ' . htmlspecialchars($client['prenom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date :</label>
                    <input type="date" id="date-picker" name="date" class="form-control" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="heure" class="form-label">Heure :</label>
                    <select id="time-picker" name="heure" class="form-select" required>
                        <option value="" selected disabled>Heure de visite</option>
                        <?php
                        $times = ["09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00"];
                        foreach ($times as $time) {
                            $selected = (isset($rendezVous['heure']) && $rendezVous['heure'] == $time) ? 'selected' : '';
                            echo "<option value=\"$time\" $selected>$time</option>";
                        }
                        ?>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="/rendezvous" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
    <script src="/js/calendrar.js"></script>
</body>

</html>