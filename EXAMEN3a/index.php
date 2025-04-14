<html>
    <head>
        <title>Welcome to LAMP Infrastructure</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
            require_once 'clases/Connection.php';
            require_once 'clases/Lamp.php';
            require_once 'clases/Lighting.php';
            require_once 'autoload.php';
            require_once 'changestatus.php';
            require_once 'indexx.php';

               $lamp1 = new Lamp();
               $lamp1 ->almacenar('1');
               $gestor = new lighting();
               $gestor -> getAllLamps($lamp);
                $gestor -> getLamps();
                $gestor = new indexx();
                $gestor -> drawLampsList('1');
                $gestor = new Connection();
                $gestor -> getConn();
            ?>
        </div>
    </body>
</html>
