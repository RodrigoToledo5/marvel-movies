<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.fluid.classless.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next MCU Film</title>
    <link rel="stylesheet" href="css/pico.classless.min.css">
    <meta name="description" content="Next movie marvel">

</head>

<body>
    <main>
        <section>
            <?php if (isset($data["poster_url"])) : ?>
                <img src="<?= $data["poster_url"] ?>" width="300" alt="Movie Poster" style="border-radius:10px">
            <?php endif; ?>
        </section>
        <hgroup>
            <h3><?= $data["title"]; ?> In comming </h3>
            <p>Date: <?= $data["release_date"]; ?></p>
            <p>Next movie: <strong><?= $data["following_production"]["title"]; ?></strong> </p>
            <p>Description: <?= $data["following_production"]["overview"]; ?></p>
        </hgroup>
    </main>
</body>

</html>
<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: flex;
        justify-content: center;
        align-content: center;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        margin-inline: 8vw;
    }
</style>