<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla {{$art->clave}}</title>
</head>
<body>
    <div>
        <center>
            <h1>PROYECTO: {{$pro->nombreProyecto}}</h1>
            <h1>ARTEFACTO: {{$art->nombre}}</h1>
            <table border=2 style='margin-left:auto;margin-right:auto;'>
                <tr bgcolor='#008caf' style='color:white'>
                    <th><h3>CLAVE: </h3></th>
                    <th><h3>{{$art->clave}}</h3></th>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                    <td><h3>Nombre: </h3></td>
                    <td>{{$art->nombre}}</td>
                </tr>
                <tr bgcolor='#cfffd0' align='center'>
                    <td><h3>Descripcion: </h3></td>
                    <td>{{$art->descripcion}}</td>
                </tr>
            </table>
            <h1>DATOS:</h1>
            <table border=2 style='margin-left:auto;margin-right:auto;'>
                <tr bgcolor='#008caf' style='color:white'>
                    <th><h3>ATRIBUTOS</h3></th>
                    <th><h3>DESCRIPCIÓN</h3></th>
                    <th><h3>TIPO</h3></th>
                    <th><h3>RANGO</h3></th>
                    <th><h3>EXCEPCIONES</h3></th>
                </tr>
                @foreach ($listaPlantilla as $plantilla)
                    @if ($plantilla->idArtefacto == $art->id && $plantilla->idProyecto == $pro->id)
                        <tr bgcolor='#fef7b5' align='center'>
                            <td><b>{{$plantilla->atributos}}</b></td>
                            <td>{{$plantilla->descripcion}}</td>
                            <td>{{$plantilla->tipo}}</td>
                            <td>{{$plantilla->rango}}</td>
                            <td>{{$plantilla->excepciones}}</td>
                        </tr>
                    @endif
                @endforeach                
            </table>
        </center>
    </div>
</body>
</html>