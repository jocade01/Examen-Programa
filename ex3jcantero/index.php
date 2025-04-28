<?php
require_once 'autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightcyan;
        }

        .center {
            margin: auto;
            width: 60%;
            padding: 10px;
            background-color: lightgreen;
        }

        .element {
            display: inline-block;
            width: 100px;
            height: 120px;
            font-size: .6em;
            text-align: center;
            margin: 10px;
        }

        .element,
        .center {
            -moz-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            -webkit-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            border-radius: 10px;
            /*supported by all latest Browser*/
            -moz-border-radius: 10px;
            /*For older Browser*/
            -webkit-border-radius: 10px;
            /*For older Browser*/
            border: 3px solid navy;
        }

        .element img {
            width: 3em;
            vertical-align: middle;
        }

        .on {
            background-color: lightyellow;
        }

        .off {
            background-color: lightslategray;
        }

        h1 {
            font-size: 1.5em;
            text-align: center;
            background-color: black;
            color: azure;
        }

        form {
            text-align: center;
        }
    </style>
</head>
<body>
    
    <?php
        $lightning = new Lightning();

        $lightning->drawLampsList();
        
        $lightning->drawPotenciaZona();
    ?>
    
</body>
</html>