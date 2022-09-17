<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exercice 1 - Application MVC - Controller</title>
</head>

<body>

    <?php
require_once('controllers/controllers.php');

$controller = new Controllers();
$controller->dispatch();

?>



</body>

</html>