<!doctype html>
<html lang="es">
    <head>
    <title>Carta Presentacion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>

        </header>

        <footer>
            Copyright &copy; <?php echo date("d/m/y");?> 
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <p class="text-center p-0 m-0"><b>Universidad Politécnica de Quintana Roo</b><br>Dirección de Vinculación, Difusión y Extensión Universitaria</p>
            @forelse ($usuario as $dato)
                        @forelse ($datos as $datodp)
                                <table class="table table-borderless p-0 m-1" >
                                    <tr class="p-0 m-0">
                                        <td class="p-0"><div><div class="titulo text-center">  DEFINICIÓN DEL PROYECTO</div><div class="subT text-center"><small>[Estancia {{$datodp->id_proceso}}] </small></div></div></td>
                                        <td class="p-0"><div class="subT text-right" style="height: 5px;"><small>Fecha:</small></div></div></td>
                                        <td colspan="2" class="p-0" style="height: 5px;"><div><div class="text-center" style="border-bottom: 1px solid black;"><small>Cancun, Quintana Roo a <?php echo date("d/m/Y");?></small> </div><div class="subT text-center"><small>LOCALIDAD, ESTADO Y FECHA (DD/MM/AA)</small></div></div></td>
                                        
                                    </tr>
                                </table>
                                <table class="table table-borderless p-0 m-1">
                                    <tr class="p-0 m-0">
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left" ><small>Datos del Alumno </small></div></div></td>
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left"> <small>Nombre:</small></div></div></td>
                                        <td colspan="2" class="p-0 px-1 " style="border: 1px solid black;"><div><div class=" text-center"> <small>{{$dato->ape_paterno}} {{$dato->ape_materno}} {{$dato->nombres}}</small></div></div></td>
                                    </tr>
                                    <tr class="p-0 m-0"> 
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left" ><small>Grupo: {{$datodp->grupo}}</small></div></div></td>
                                        <td class="p-0 px-1" style="border: 1px solid black;"><div><div class=" text-left"> <small>Asesor UPQROO:</small></div></div></td>
                                        <td colspan="2" class="p-0 px-1 " style="border: 1px solid black;"><div><div class=" text-center"> <small>{{$dato->ape_paterno_aa}} {{$dato->ape_materno_aa}} {{$dato->nombres_aa}}</small></div></div></td>
                                    </tr>
                                    <tr class="p-0 m-0"> 
                                        <td class="p-0 px-1 " style=" border-left: 1px solid black;"><div><div class=" text-center" ><small>Datos </small></div></div></td>
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left"> <small>Nombre:</small></div></div></td>
                                        <td colspan="2" class="p-0 px-1 " style="border: 1px solid black;"><div><div class=" text-center"> <small>{{$dato->nombre_emp}}</small></div></div></td>
                                    </tr>
                                    <tr class="p-0 m-0"> 
                                        <td class="p-0 px-1 " style=" border-left: 1px solid black;"><div><div class=" text-center" ><small>de la </small></div></div></td>
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left"> <small>Asesor:</small></div></div></td>
                                        <td colspan="2" class="p-0 px-1"  style="width: 200px; border: 1px solid black;"><div><div class=" text-center"> <small>{{$dato->ape_paterno_ae}} {{$dato->ape_materno_ae}} {{$dato->nombres_ae}}</small></div></div></td>
                                    </tr>
                                    <tr class="p-0 m-0"> 
                                        <td class="p-0 px-1 " style=" border-left: 1px solid black; border-bottom: 1px solid black;"><div><div class=" text-center" ><small>Empresa</small></div></div></td>
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left"> <small>Puesto:</small></div></div></td>
                                        <td colspan="2" class="p-0 px-1" style="width: 200px; border: 1px solid black;"><div><div class=" text-center" style="justify-content: center;"> <small>{{$datodp->puesto}}</small></div></div></td>
                                    </tr>
                                
                                    <tr class="p-0 m-0">
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left"> <small>Nombre del Proyecto:</small></div></div></td>
                                        <td colspan="3" class="p-0 px-1 " style="border: 1px solid black;"><div><div class=" text-center"> <small>{{$dato->nombre_proyecto}}</small></div></div></td>
                                    </tr>
                                    <tr class="p-0 m-0"> 
                                        <td class="p-0 px-1" style=" border: 1px solid black;"><div><div class=" text-left"> <small>Objetivos del Proyecto:</small></div></div></td>
                                        <td colspan="3" class="p-0 px-1 " style="border: 1px solid black;"><div><div class=" text-center"> <small>{{$datodp->objetivos_proyecto}}</small></div></div></td>
                                    </tr>
                                </table>
                                <table class="table table-borderless p-0 m-1">
                                    <thead class="table-secondary">
                                        <tr class="">
                                            <td class="p-0 px-1 " style="width: 230px; border-top: 1px solid black; border-left: 1px solid black;"><div><div class=" text-center" ><small>Descripción de Etapas del Proyecto</small></div></div></td>
                                            <td class="p-0 px-1 " style="width: 80px; border-top: 1px solid black; border-left: 1px solid black;"><div><div class=" text-center"> <small>Tiempo </small></div></div></td>
                                            <td class="p-0 px-1 " style="width: 80px; border-top: 1px solid black; border-right: 1px solid black;"><div><div class=" text-center"> <small>Aproximado </small></div></div></td>
                                            <td colspan="2" class="p-0 px-1" style=" border-top: 1px solid black; border-right: 1px solid black;"><div><div class=" text-center"> <small>Descripción de Competencias</small></div></div></td>
                                        </tr>
                                        <tr class="">
                                            <td class="p-0 px-1" style="width: 230px; border-left: 1px solid black;"><div><div class=" text-center" ><small></small></div></div></td>
                                            <td class="p-0 px-1 tabla" colspan="2" style="width: 160px; border-left: 1px solid black; border-right: 1px solid black;"><div><div class=" text-center"> <small>de Duración</small></div></div></td>
                                            <td colspan="2" class="p-0 px-1 tabla" style="border-right: 1px solid black;"><div><div class=" text-center"> <small></small></div></div></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td class="p-0 px-1" style="width: 230px;  border-top: 1px solid black; border-left: 1px solid black;"><div><div class=" text-center" ><small></small></div></div></td>
                                            <td class="p-0 px-1 tabla" colspan="2" style="width: 160px; border: 1px solid black;"><div><div class=" text-center"> <small>Programar</small></div></div></td>
                                            <td colspan="2" class="p-0 px-1 tabla" style=" border-top: 1px solid black; border-right: 1px solid black;"><div><div class=" text-center"> <small></small></div></div></td>
                                        </tr>
                                        <tr class=""> 
                                            <td class="p-0 px-1" style="width: 230px; border-left: 1px solid black;"><div><div class=" text-center" ><small></small></div></div></td>
                                            <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black;"><div><div class=" text-center"> <small>Semana</small></div></div></td>
                                            <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black;"><div><div class=" text-center"> <small>Horas</small></div></div></td>
                                            <td colspan="2" class="p-0 px-1 tabla" style="border-right: 1px solid black;"><div><div class=" text-center"> <small></small></div></div></td>
                                        </tr>
                                        @foreach ($etapas as $datoE)
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center " ><small>{{$datoE->descripcion_etapas}}</small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <div class=" text-center">
                                                            @if ($datoE->semana_inicial)
                                                                <div><small>{{$datoE->semana_inicial}}</small></div>
                                                                <div style="font-size: 10px">---</div>
                                                                <div> <small>{{$datoE->semana_final}}</small></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small>{{$datoE->horas}}</small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small>{{$datoE->descripcion_competencias}}</small></div></div></td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            <p style="">
                                <table class="table table-borderless p-0 m-1">
                                    <thead class="table-secondary">
                                        <tr class=""> 
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black;"><div><div class=" text-center" ><small>Actividades de Aprendizaje</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black;"><div><div class=" text-center"> <small>Resultados de Aprendizaje</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black;"><div><div class=" text-center"> <small>Evidencia</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black;"><div><div class=" text-center"> <small>Instrumentos de Evaluación</small></div></div></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class=""> 
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;"><div><div class="parrafo" ><small>{{$datodp->actividades}}</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small>{{$datodp->resultados}}</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small>{{$datodp->evidencia}}</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small>{{$datodp->instrumentos}}</small></div></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless p-0 m-1" >
                                    <thead class="table-secondary">
                                        <tr class=""> 
                                            <td class="p-0 px-1" style="width: 200px; border: 1px solid black;"><div><div class=" text-center" ><small>Asignaturas</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 200px; border: 1px solid black;"><div><div class=" text-center"> <small>Tópicos Recomendados</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 200px; border: 1px solid black;"><div><div class=" text-center"> <small>Estrategias Didácticas</small></div></div></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class=""> 
                                            <td class="p-0 px-1" style="width: 200px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small>{{$datodp->asignaturas}}</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 200px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small>{{$datodp->topicos}}</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 200px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small>{{$datodp->estrategias}}</small></div></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                                <table class="table table-borderless p-0 m-1" >
                                    <tbody>
                                        <tr class="p-0 m-0">
                                            <td colspan="2" class="p-1"><div><div style="border-bottom: 1px solid black;"></div><div class="subT text-center"><small>{{$dato->ape_paterno_ae}} {{$dato->ape_materno_ae}} {{$dato->nombres_ae}}</small></div><div class="subT text-center"><small>{{$datodp->puesto}}</small></div><div class="subT text-center"><small>{{$dato->nombre_emp}}</small></div></div></td>
                                            <td colspan="1" ></td>
                                            <td colspan="2" class="p-1"><div><div style="border-bottom: 1px solid black;"></div><div class="subT text-center"><small>{{$dato->ape_paterno_aa}} {{$dato->ape_materno_aa}} {{$dato->nombres_aa}}</small></div><div class="subT text-center"><small>{{$dato->nombre_carrera}}</small></div></div></td>
                                        </tr>
                                        <br>
                                        <br>
                                        <tr class="p-0 m-0">
                                            <td colspan="2" class="p-1 text-center sello" style="height: 70px; border-bottom: 1px solid black;">SELLO</td>
                                            <td colspan="1" ></td>
                                            <td colspan="2" class="p-1" style="height: 70px;"><div><div style="border-bottom: 1px solid black;"></div><div class="subT text-center"><small>{{$dato->ape_paterno}} {{$dato->ape_materno}} {{$dato->nombres}}</small></div></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                        @empty
                        @endforelse
            @empty
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Faltan datos porfavor llene la cédula de registro para que se autocompleten el documento.</h1>
                    </div>
                </div>
            @endforelse 
        </main>
    </body>
</html>

<style>
            /** Define the margins of your page **/
            @page {
            }
            body { 
                margin-top: 10px; 
                margin-left: 0px; 
                margin-right: 0px; 
                margin-bottom: 10px;  
            }
            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: transparent;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                background-color: transparent;
                color: white;
                text-align: center;
                line-height: 35px;
            }
            .panel{
                background-color: #16355a;
                color: white;
                padding: 3px 3px 3px 3px;
            }
            .titulo{
                font-size: 13px;
            }
            .datos{
                text-align: center;
                background-color: #E1E1E1;
                border-bottom: 1px solid black;
            }
            .subT{
                font-size: 13px;
            }
            .tabla{
                border: 1px  solid black;
            }
            .tablaE{
                border-left: 1px solid black;
                
            }
            .sello{
                justify-content: center;
                align-items: center;
            }

            .parrafo{
                text-align: justify;
            }
</style>