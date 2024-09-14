<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory )
    -> withServiceAccount(__DIR__."/ista-87257-firebase-adminsdk-602h6-3f80c76cfd.json")
    ->withDatabaseUri("https://ista-87257-default-rtdb.firebaseio.com");
$database = $factory->createDatabase();

$tables = $database->getReference('gestion_bibliotheque')->getValue();

$livres = $tables['livre'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
    <title>DOnnees from fire base</title>
</head>
<body>

    <main class="container">
        <h1 class="text-primary fw-bold text-center">Liste de livres</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($livres as $livre) : ?>
                <tr>
                    <td scope="col"> <?= $livre['titre']?> </td>
                    <td scope="col"><?= $livre["auteur"]?></td>
                    <td scope="col">
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                        <button class="btn btn-warning   btn-sm">Modiffier</button>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </main>
    

    <script src="../bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.js" crossorigin="anonymous"></script>
</body>
</html>




