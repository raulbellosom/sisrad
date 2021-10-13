
<style>
    #emp{
        font-family: Arial, Helvetica, sans-serif;
        margin: 5px;
        padding: 5px;
        width: auto ;
        /* display: inline-flex;
        align-items: center;
        flex-direction: column; */
    }
    /* table{
        display: block;
    } */
    th{
        background-color: grey;
        color: white;
        text-align: center;
        padding: 5px;
    }
</style>
<div id="emp" >
    
        <table border="1">
            <tr>
                <td rowspan="3">imagen logo</td>
                <td>FORMULARIO</td>
                <td colspan="2">Resultado de evaluacion diagnostica</td>
            </tr>
            <tr>
                <td>CÓDIGO</td>
                <td>VERSION</td>
                <td>ULIMA REVISIÓN</td>
            </tr>
            <tr>
                <td>AAP-PCR-04/F04</td>
                <td>3</td>
                <td>06-03-2017</td>
            </tr>
        </table>
   

    <br>
    <br>
    <p>Fecha: 12 de marzo de 2021</p>

        <table border="1">
            <thead>
                <tr>
                    <th colspan="4">Nombre del Docente</th>
                    <th colspan="2">Nombre de la Asignatura</th>
                </tr>
                <tr>
                    <td colspan="4">Mtra Evangelina Gonzalez Mora</td>
                    <td colspan="2">Administracion de base de datos</td>
                </tr>
                <tr>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Turno</th>
                    <th>Carrera</th>
                    <th>Tipo de evaluacion</th>
                    <th>No. de alumnos</th>
                </tr>
                <tr>
                    <td>8vo.</td>
                    <td>B</td>
                    <td>Vespertino</td>
                    <td>ISC</td>
                    <td>Escrito, oral</td>
                    <td>10</td>
                </tr>
            </thead>
        </table>
  

    <br>
    <br>

        <table border="1">
            <tr>
                <th>Conocimientos, competencias especificas y/o genericas previas</th>
                <th>Nulo</th>
                <th>Bajo</th>
                <th>Aceptable</th>
                <th>Bueno</th>
            </tr>
            <tr>
                <td>criterio</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>


    <p>Plan de acción</p>

  
        <table border="1">
            <tr>
                <th rowspan="2">General</th>
                <td>Deficiencias</td>
                <td>Acciones sugeridas y recursos necesarios</td>
                <td>Tiempo de ejecución e impacto en cronograma</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="2">Particular</th>
                <td>Nombre del alumno</td>
                <td>Deficiencias (temas, áreas, otros)</td>
                <td>Acción sugerida (académica, psicologica, etc)</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
   

    {{-- <div>
        <table>
            <thead >
                <tr>
                    <th>Fecha de elaboración</th>
                    <th>Tipo de reporte</th>
                    <th>Carrera</th>
                    <th>Asignatura</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Turno</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($reportes as $reporte)
                    <tr>
                        <td>{{$reporte->created_at}}</td>
                        <td>{{$reporte->tipoReporte}}</td>
                        <td>{{$reporte->carrera}}</td>
                        <td>{{$reporte->asignatura}}</td>
                        <td>{{$reporte->grado}}</td>
                        <td>{{$reporte->grupo}}</td>
                        <td>{{$reporte->turno}}</td>
                    @endforeach
                </tbody>
            </table>
        <a  class="btn btn-primary" href="{{url('/downloadPDF')}}">Generate</a>
    </div> --}}
    <a  class="btn btn-primary" href="{{url('/downloadPDF')}}">Generate</a>
</div>
