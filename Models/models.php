<?php
// Includi il file per la connessione al database
require_once '../../social-platform/social/database.php';
require_once './post.php';
require_once './media.php';

// Esegui la query per recuperare il titolo del post dal database
$query = "SELECT `posts`.`title`, `posts`.`date`, `posts`.`tags` FROM `posts`;";
$result = $connection->query($query);

// Controlla se la query ha prodotto risultati
if ($result && $result->num_rows > 0) {
    // Estrai il titolo dal risultato della query
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $tags = $row['tags'];
    $date = $row['date'];



    // Istanza di un oggetto Media
    $media1 = new Media('image', 'path_to_image.jpg');
    $media2 = new Media('video', 'path_to_video.mp4');

    // Istanza di un oggetto Post con il supporto di più Media
    $post1 = new Post($title, $tags, $date, $media1, $media2);
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
</head>

<body>
    <div class="container">
        <h1><?= $post1->title ?></h1>
        <p>Pubblicata il <?= $post1->date ?></p>
        <div>I tags :<?= $post1->tags ?></div>
    </div>
    <?php foreach ($post1->mediaItems as $media) : ?>
        <p>Tipo: <?= $media->type ?></p>
    <?php endforeach ?>
</body>

</html>