<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./styles/normalize.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/variables.css">
    <link rel="stylesheet" href="./styles/image-compress-card.css">
    <link rel="stylesheet" href="./styles/error-message.css">
    <link rel="stylesheet" href="./styles/app.css">

    <script src="./client/Manager.js" defer></script>
    <script src="./client/uploadImageEventListener.js" defer></script>
    <script src="./client/formValidations.js" defer></script>
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