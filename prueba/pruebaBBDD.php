<?php

   $cadena_conexion = "mysql:dbname=Escuela; host=localhost";
   $usuario = 'root';
   $clave ='';
   $conexion = null;

   try{
    $conexion = new PDO($cadena_conexion, $usuario, $clave);

    

    $sql = "SELECT nombre FROM `Alumno` WHERE codigo_curso in(
        SELECT codigo FROM Curso WHERE nombre= ?)";

    //$resultado = $conexion->query($sql);

    $resultado = $conexion->prepare(($sql));

    $resultado->execute(array('Matemáticas'));

    foreach($resultado as $Alumno){
        echo $Alumno['nombre']."<br>"; 
    }

    echo "Conexión establecida con éxito";

   }catch(PDOException $e){
    echo "Problema en la conexión";
   }finally{
    $conexion = null;
   }
