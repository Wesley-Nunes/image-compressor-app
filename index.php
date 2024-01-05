<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Image Compressor is a user-friendly tool designed to efficiently compress images" />

    <link rel="shortcut icon" href="./media/favicon.svg" type="svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <script type="module" src="./client.js" defer></script>

    <link rel="stylesheet" href="./style.css">

    <title>Image Compressor</title>
</head>
<body>
    <section class="app">
        <?php include("./template/image-compress-card.html"); ?>
        <?php include("./template/error-message.html"); ?>
        <?php include("./template/footer.html"); ?>
    </section>
</body>
</html>