<?php
//1 ci connettiamo al database
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db-social-platform');

//2 mi collego al databese
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

//3 controllo che non ci siano errori
if ($connection && $connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
    die;
}
$no_result = "Non ci sono utenti con questo username";
//var_dump($connection);
$name_utent = '';
if (isset($_POST['utents'])) {
    $name_utent = trim($connection->real_escape_string($_POST['utents'])); // Sanifica l'input dell'utente
} else if ($_POST['utents'] = NULL) {
}

$sql = "SELECT `users`.`username`, `users`.`birthdate`, `users`.`phone`, `users`.`created_at`, `users`.`email`
FROM `users`
WHERE `users`.`username` 
LIKE '%" . $name_utent . "%'";

//$sql = "SELECT `users`.`username`, `users`.`birthdate`, `users`.`phone` , `users`.`created_at`, `users`.`email`
//FROM `users` WHERE `users`.`username` LIKE" . $name_utent . '%';
//$sql = "SELECT  `users`.`username`, `users`.`email`, `users`.`birthdate`, `medias`.`type`, `medias`.`path`, `medias`.`created_at`
//FROM `medias`
//JOIN `users`
//ON `medias`.`user_id` = `users`.`id`";

$result = $connection->query($sql);

// Se non ci sono risultati, imposta $no_result a true
if ($result && $result->num_rows === 0) {
    $no_result = true;
} else {
    $no_result = false;
}
//var_dump($result);
//if ($result->num_rows > 0) {
//    var_dump($result->fetch_assoc());
//    //while ($row = $result->fetch_assoc()) {
//    //    var_dump($row);
//    //}
//}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class=" d-flex  py-3">
        <h1>BOOL SOCIAL</h1>
        <form action="" method="post" class="d-flex">
            <input type="text" name="utents" id="untents" class="from-control" placeholder="Ricerca Utente" value="">
            <button type="submit" class="btn btn-success ms-2">Cerca</button>
        </form>
    </header>





    <main>
        <div class="container my-3">
            <div class="row">
                <h2>I nostri utenti</h2>
                <?php if ($no_result) : ?>
                    <h4 class="text-center text-danger p-2">Non ci sono utenti con questo username</h4>
                <?php endif; ?>
                <?php if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) :
                        ['username' => $username, 'email' => $email, 'birthdate' => $birthdate, 'phone' => $phone, 'created_at' => $created_at] = $row; ?>
                        <div class="col-3 border border-success-subtle mb-2 p-2">
                            <div><strong>Nome Utente</strong></div>
                            <div><?= $username ?></div>
                            <div><strong>Email</strong></div>
                            <div><?= $email ?></div>
                            <div><strong>Data del compleanno</strong></div>
                            <div><?= $birthdate ?></div>
                            <div><strong>Data di iscrizione</strong></div>
                            <div><?= $created_at ?></div>
                            <div><strong>Numero di cellulare</strong></div>
                            <div>+39 <?= $phone ?></div>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>
            </div>
        </div>
    </main>

</body>

</html>