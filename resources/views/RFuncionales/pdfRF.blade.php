<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Requerimientos Funcionales</title>
</head>
<body>
    <div>
        <center>
            <h1>PROYECTO: {{$pro->nombreProyecto}}</h1>
            <h1>TABLA DE REQUERIMIENTOS FUNCIONALES</h1>
            <table border=2 style='margin-left:auto;margin-right:auto;'>
                <tr bgcolor='#008caf' style='color:white'>
                    <th><h3>CLAVE</h3></th>
                    <th><h3>DESCRIPCIÓN</h3></th>
                </tr>
                @foreach ($listaRF as $rf)
                        @if($rf->idProyecto == $pro->id)
                            <tr bgcolor='#fef7b5' align='center'>
                                <td align="center">{{$rf->clave}}</td>
                                <td align="center">{{$rf->descripcion}}</td>
                            </tr> 
                        @endif 
                    @endforeach                
            </table>
        </center>
    </div>
</body>
</html>