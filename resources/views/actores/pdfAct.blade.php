<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantilla {{$actor->clave}}</title>
</head>
<body>
    <div>
        <center>
            <h1>PROYECTO: {{$pro->nombreProyecto}}</h1>
            <h1>PLANTILLA DEL ACTOR</h1>
            <table border=2 style='margin-left:auto;margin-right:auto;'>
                <tr bgcolor='#008caf' style='color:white'>
                    <th><h2>CLAVE: </h2></th>
                    <th><h2>{{$actor->clave}}</h2></th>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                 <td><h3>Nombre: </h3></td>
                 <td>{{$actor->nombre}}</td>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                 <td><h3>Descripcion: </h3></td>
                 <td>{{$actor->descripcion}}</td>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                 <td><h3>Caracteristicas: </h3></td>
                 <td>{{$actor->caracteristicas}}</td>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                 <td><h3>Responsabilidad: </h3></td>
                 <td>{{$actor->responsabilidad}}</td>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                 <td><h3>Referencias: </h3></td>
                 <td>{{$actor->referencias}}</td>
                </tr>  
           </table>
        </center>
    </div>
</body>
</html>