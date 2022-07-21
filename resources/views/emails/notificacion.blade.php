<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @switch($status)
        @case(1)<!--Aceptado-->
        <h1>Estatus de tu documento</h1>
        <p>Buen dia Alumno de la UPQROO te mandamos este correo para informarte que tu documento "{{$nameDoc}}"  fue aceptado</p>
            @break
        @case(2)<!--Obervaciones-->
        <h1>Estatus de tu documento</h1>
        <p>Buen dia Alumno de la UPQROO te mandamos este correo para informarte que tu documento "{{$nameDoc}}"  tiene ciertas errores, favor de revisar la pagina de <a href="ceduladeregistro.upqroo.edu.mx/">Estancias y Estadias</a></p>
            @break
        @default
            
    @endswitch
    
</body>
</html>