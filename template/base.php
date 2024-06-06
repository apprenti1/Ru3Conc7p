<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $baseurl ?>assets/libs/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script defer src="<?= $baseurl ?>assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= $baseurl ?>assets/css/base.css">
    <link rel="stylesheet" href="<?= $baseurl ?>assets/css/master.css">
    <link rel="icon" href="<?= $baseurl ?>assets/img/icon.ico">
    <title><?= $title ?></title>
</head>
<body>

    <?php require '../template/navbar.php'; ?>
    <?php require $template; ?>
</body>
</html>