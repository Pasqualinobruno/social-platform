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
    // Inizializza un array per memorizzare tutti i post
    $posts = [];

    // Itera attraverso tutti i risultati della query
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $tags = $row['tags'];
        $date = $row['date'];

        // Istanza di un oggetto Media per il post corrente
        $media1 = new Media('image', 'path_to_image.jpg');
        $media2 = new Media('video', 'path_to_video.mp4');

        // Crea un oggetto Post per il post corrente con il supporto di più Media
        $post = new Post($title, $tags, $date, $media1, $media2);

        // Aggiungi il post corrente all'array di post
        $posts[] = $post;
    }
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
            <?php foreach ($posts as $post) : ?>
                <div class="col-3">
                    <div class="card p-1">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post->title ?></h5>
                            <p class="card-text">Pubblicata il <?= $post->date ?></p>
                            <div>I tags : <?= $post->tags ?></div>
                            <?php foreach ($post->mediaItems as $media) : ?>
                                <p>Tipo: <?= $media->type ?></p>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>


<style>
    .card {
        height: 100%;

    }

    .col-3 {
        margin-bottom: 1rem;
    }
</style>