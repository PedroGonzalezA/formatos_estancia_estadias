<!doctype html>
<html lang="es">
    <head>
    <title>DEFINICIÓN DEL PROYECTO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <!-- Wrap the content of your PDF inside a main tag -->
            <div class="container">
                <div class="col-6">
                    <a href="{{ route('estancia.index') }}" class="btn "  ><i class="zmdi zmdi-arrow-left"></i></a>
                </div>
                <p class="text-center p-0 m-0"><b>Universidad Politécnica de Quintana Roo</b><br>Dirección de Vinculación, Difusión y Extensión Universitaria</p>
                @forelse ($datos as $dato)                        
                            <form  method="POST" action="{{ route('f04Guardar.index') }}">
                                @csrf
                                <table class="table table-borderless p-0 m-1" >
                                        <tr class="p-0 m-0">
                                            <td class="p-0">
                                                <div>
                                                    <div class="titulo text-center">  DEFINICIÓN DEL PROYECTO</div>
                                                    <div class="subT text-center">
                                                        <small>[Estancia]</small> 
                                                        <select class="form-control text-center " name="id_proceso" id="" required>
                                                            <option value="1">Estancia 1</option>
                                                            <option value="2">Estancia 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-0"><div class="subT text-right" style="height: 5px;"><small>Fecha:</small></div></div></td>
                                            <td colspan="2" class="p-0" style="height: 5px;"><div><div class="text-center" style="border-bottom: 1px solid black;"><small>Cancun, Quintana Roo a <?php echo date("d/m/Y");?></small> </div><div class="subT text-center"><small>LOCALIDAD, ESTADO Y FECHA (DD/MM/AA)</small></div></div></td>
                                            
                                        </tr>
                                    </table>

                                    <table class="table table-borderless p-0 m-1">
                                        <tr class="p-0 m-0">
                                            <td class="p-0 px-1" style="width: 150px; border: 1px solid black;"><div><div class=" text-left" ><small>Datos del Alumno </small></div></div></td>
                                            <td class="p-0 px-1" style="width: 120px; border: 1px solid black;"><div><div class=" text-left"> <small>Nombre:</small></div></div></td>
                                            <td colspan="2" class="p-0" style="border: 1px solid black;">
                                                <div>
                                                    <input type="text" disabled class="form-control text-center datosF04" placeholder="{{$dato->ape_paterno}} {{$dato->ape_materno}} {{$dato->nombres}}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="p-0 m-0"> 
                                            <td class="p-0 px-1" style="width: 100px; border: 1px solid black;">
                                                <div class="row">
                                                    <div class=" text-left col-4" ><small>Grupo: </small></div>
                                                    <div class="col-8"><input type="text" class="form-control text-center datosF04" style="width: 70px;" placeholder="Grupo" name="grupo" required></div>
                                                </div>
                                            </td>
                                            <td class="p-0 px-1" style="width: 120px; border: 1px solid black;"><div><div class=" text-left"> <small>Asesor UPQROO:</small></div></div></td>
                                            <td colspan="2" class="p-0" style="border: 1px solid black;">
                                                <div>
                                                    <input type="text" disabled class="form-control text-center datosF04" placeholder="{{$dato->ape_paterno_aa}} {{$dato->ape_materno_aa}} {{$dato->nombres_aa}}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="p-0 m-0"> 
                                            <td class="p-0 px-1 " style="width: 100px; border-left: 1px solid black;"><div><div class=" text-center" ><small>Datos </small></div></div></td>
                                            <td class="p-0 px-1" style="width: 120px; border: 1px solid black;"><div><div class=" text-left"> <small>Nombre:</small></div></div></td>
                                            <td colspan="2" class="p-0" style="border: 1px solid black;">
                                                <div>
                                                    <input type="text" disabled class="form-control text-center datosF04" placeholder="{{$dato->nombre_emp}}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="p-0 m-0"> 
                                            <td class="p-0 px-1 " style="width: 100px; border-left: 1px solid black;"><div><div class=" text-center" ><small>de la </small></div></div></td>
                                            <td class="p-0 px-1" style="width: 120px; border: 1px solid black;"><div><div class=" text-left"> <small>Asesor:</small></div></div></td>
                                            <td colspan="2" class="p-0" style="border: 1px solid black;">
                                                <div>
                                                    <input type="text" disabled class="form-control text-center datosF04" placeholder="{{$dato->ape_paterno_ae}} {{$dato->ape_materno_ae}} {{$dato->nombres_ae}}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="p-0 m-0"> 
                                            <td class="p-0 px-1 " style="width: 100px; border-left: 1px solid black; border-bottom: 1px solid black;"><div><div class=" text-center" ><small>Empresa</small></div></div></td>
                                            <td class="p-0 px-1" style="width: 20px; border: 1px solid black;"><div><div class=" text-left"> <small>Puesto:</small></div></div></td>
                                            <td colspan="2" class="p-0" style="border: 1px solid black;">
                                                <div>
                                                    <input type="text" class="form-control text-center datosF04" name="puesto"placeholder="Puesto" required>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                        <tr class="p-0 m-0">
                                            <td class="p-0 px-1" style="width: 100px; border: 1px solid black;"><div><div class=" text-left"> <small>Nombre del Proyecto:</small></div></div></td>
                                            <td colspan="3" class="p-0" style="border: 1px solid black;">
                                                <div>
                                                    <input type="text" class="form-control text-center datosF04" disabled placeholder="{{$dato->nombre_proyecto}}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="p-0 m-0"> 
                                            <td class="p-0" style="width: 100px; border: 1px solid black;"><div><div class=" text-left"> <small>Objetivos del Proyecto:</small></div></div></td>
                                            <td colspan="3" class="p-0" style="border: 1px solid black;">
                                                <div>
                                                    <input type="text" class="form-control text-center datosF04" name="objetivosP" placeholder="Objetivos del proyecto" required>
                                                </div>
                                            </td>
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
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>                      
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                            <tr class=""> 
                                                <td class="p-0 px-1" style="width: 230px; border: 1px solid black; height:40px;"><div><div class=" text-center" ><small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td class="p-0 px-1 tabla" style="width: 50px; border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                                <td colspan="2" class="p-0 px-1 tabla" style="border: 1px solid black; height:40px;"><div><div class=" text-center"> <small></small></div></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <div>
                                                            <textarea name="actividades" class="form-control area" id="" cols="30" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <div>
                                                            <textarea name="resultados" class="form-control area" id="" cols="30" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <div>
                                                            <textarea name="evidencia" class="form-control area" id="" cols="30" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-0 px-1" style="width: 150px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <div>
                                                            <textarea name="instrumentos" class="form-control area" id="" cols="30" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </td>
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
                                                <td class="p-0 px-1" style="width: 200px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <textarea name="asignaturas" class="form-control area" id="" cols="30" rows="5"></textarea>
                                                    </div>
                                                </td>
                                                <td class="p-0 px-1" style="width: 200px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <textarea name="topicos" class="form-control area" id="" cols="30" rows="5"></textarea>
                                                    </div>
                                                </td>
                                                <td class="p-0 px-1" style="width: 200px; border: 1px solid black; height:40px;">
                                                    <div>
                                                        <textarea name="estrategias" class="form-control area" id="" cols="30" rows="5"></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <br>
                                    <table class="table table-borderless p-0 m-1" >
                                        <tbody>
                                            <tr class="p-0 m-0">
                                                <td colspan="2" class="p-1"><div><div style="border-bottom: 1px solid black;"></div><div class="subT text-center"><small>{{$dato->ape_paterno_ae}} {{$dato->ape_materno_ae}} {{$dato->nombres_ae}}</small></div><div class="subT text-center"><small></small></div><div class="subT text-center"><small>{{$dato->nombre_emp}}</small></div></div></td>
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
                                    <button class="btn btn-dark btn-lg btn-block" type="submit"><i > Guardar</i></button>
                            </form>
                                
                    @empty
                @endforelse 
            </div>

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
            .datosF04{
                font-size: 13px;
                height: 24px;
                background-color: #BBBBBB;
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
            .area{
                background:#BBBBBB;
            }
            .btnG{

            }
</style>