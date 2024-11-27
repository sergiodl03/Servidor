<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            <?php 
                if (isset($_SESSION['error'])){
                    echo "p{
                        color : red;
                    }";
            
                }
            ?>
            div{
                text-align: center;
            }
            body{
                background-color: greenyellow;
            }
        </style>
    </head>
    <body>
        <div>
        <h1> Formulario de inicio de sesión </h1>

        <form action="?method=auth" method="post">
            <label for="">nombre</label><br>
            <input type="text" name="name"><br>
            <br>
            <label for="">contraseña</label><br>
            <input type="password" name="password"><br>
            <br>
            <input type="submit"><br>
        </form>
        
    </body>
    <?php
        if($_SESSION['error']){
            $error = $_SESSION['error'];
            echo "<p>$error</p>";
            unset($_SESSION['error']);
        }
    ?>
    </div>
</html>