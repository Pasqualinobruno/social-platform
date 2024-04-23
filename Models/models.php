<?php
// Includi il file per la connessione al database
require_once '../../social-platform/social/database.php';
require_once './post.php';
require_once './media.php';

// Esegui la query per recuperare i post dal database
$query = "SELECT `posts`.`title`, `posts`.`date`, `posts`.`tags` FROM `posts`;";
$result = $connection->query($query);

// Controlla se la query ha prodotto risultati
if ($result && $result->num_rows > 0) {
    // Estrai i dati per il primo post
    $row = $result->fetch_assoc();
    $title1 = $row['title'];
    $tags1 = $row['tags'];
    $date1 = $row['date'];
    $media1_post1 = new Media('image', 'path_to_image.jpg');
    $media2_post1 = new Media('video', 'path_to_video.mp4');

    // Crea un oggetto Post per il primo post con il supporto di più Media
    $post1 = new Post($title1, $tags1, $date1, $media1_post1, $media2_post1);

    // Estrai i dati per il secondo post
    $row = $result->fetch_assoc();
    $title2 = $row['title'];
    $tags2 = $row['tags'];
    $date2 = $row['date'];
    $media1_post2 = new Media('image', 'path_to_image2.jpg');
    $media2_post2 = new Media('video', 'path_to_video2.mp4');

    // Crea un oggetto Post per il secondo post con il supporto di più Media
    $post2 = new Post($title2, $tags2, $date2, $media1_post2, $media2_post2);
} else {
    echo "Nessun post trovato nel database.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../social/./style/style.css">
</head>

<body class="bg-info text-center">
    <h1>I Post </h1>
    <a href="../social/social.php">Exit</a>
    <div class="container mt-2">


        <div class="row">
            <div class="col-6">
                <div>
                    <div class="card p-1">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post1->title ?></h5>
                            <p class="card-text">Pubblicata il <?= $post1->date ?></p>
                            <div>I tags : <?= $post1->tags ?></div>
                            <?php foreach ($post1->mediaItems as $media) : ?>
                                <p>Tipo: <?= $media->type ?></p>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card p-1">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post2->title ?></h5>
                        <p class="card-text">Pubblicata il <?= $post2->date ?></p>
                        <div>I tags : <?= $post2->tags ?></div>
                        <?php foreach ($post2->mediaItems as $media) : ?>
                            <p>Tipo: <?= $media->type ?></p>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>