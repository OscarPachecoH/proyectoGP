<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla {{$proc->clave}}</title>
</head>
<body>
    <div>
        <center>
            <h1>PROYECTO: {{$pro->nombreProyecto}}</h1>
            <h1>PROCESO: {{$proc->nombre}}</h1>
            <table border=2 style='margin-left:auto;margin-right:auto;'>
                <tr bgcolor='#008caf' style='color:white'>
                    <th><h3>CLAVE: </h3></th>
                    <th><h3>{{$proc->clave}}</h3></th>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                    <td><h3>Nombre: </h3></td>
                    <td>{{$proc->nombre}}</td>
                </tr>
            </table>
            <h1>PLANTILLA:</h1>
            <table border=2 style='margin-left:auto;margin-right:auto;'>
                <tr bgcolor='#008caf' style='color:white'>
                    <th><h3>PASOS</h3></th>
                    <th><h3>DESCRIPCIÓN</h3></th>
                    <th><h3>ACTIVIDADES</h3></th>
                    <th><h3>ACTORES</h3></th>
                </tr>
                @foreach ($listaPro as $plantilla)
                    @if ($plantilla->idProyecto == $proc->id && $plantilla->idProyecto == $pro->id)
                        <tr bgcolor='#fef7b5' align='center'>
                            <td>{{$plantilla->id}}</td>
                            <td>{{$plantilla->descripcion}}</td>
                            <td>{{$plantilla->actividades}}</td>
                            <td>{{$plantilla->actores}}</td>
                        </tr>
                    @endif
                @endforeach                
            </table>
        </center>
    </div>
</body>
</html>