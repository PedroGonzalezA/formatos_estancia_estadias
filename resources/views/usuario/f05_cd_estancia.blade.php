<!doctype html>
<html lang="es">
    <head>
    <title>Carta Presentacion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            /** Define the margins of your page **/
            @page {
            }
            body { 
                margin-top: 0cm; 
                margin-left: 1.4cm; 
                margin-right: 1.4cm; 
                margin-bottom: 0cm;  
            }
            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 0px; 

                /** Extra personal styles **/
                color: white;
                text-align: center;
                line-height: 35px;
            }
            .Parrafo{
             font-size: 13px;
             text-align: justify;
             text-justify: inter-word;
            }
            .ParrafoFecha{
             font-size: 12px;
             text-align:left;
             
            }
            .ParrafoFirma{
             font-size: 13px;
             text-align:left;
             
            }
            .ParrafoEmpresa{
             font-size: 13px;
             text-align: left;
            }
            .colu{
                width: 360px;
            }
            .colu2{
                width: 240px;
            }
            .cabecera{
                font-size: 14px;
            }
            .textoC{
                text-align: center;
                justify-content: center;
                align-items: center;
                vertical-align: middle;
                border-bottom: 1px solid black;
                border-left: 1px solid black;
                border-right: 1px solid black;
                border-top: 1px solid black;

            }
            .nombreP{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
        </header>

        <footer>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
        @forelse ($usuario as $dato)
           @if(auth()->user()->name === $dato->matricula )
                @forelse ($datos as $datodp)
                    @if(auth()->user()->name === $dato->matricula )
                    <table>
                        <tr>
                            <td colspan="2" class="p-0 m-0">
                                    <div class="textoC">
                                        <p class="cabecera">CARTA DE LIBERACIÓN<br>FAVOR DE REALIZAR ESTA CARTA<br>EN UNA HOJA MEMBRETADA DE LA EMPRESA</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="cabecera"><b>CARTA DE LIBERACIÓN DE ESTANCIA</b></p>
                                    </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="colu p-0 m-0">
                            </td>
                            <td class="colu2 p-2 m-0">
                                    <p class="ParrafoFecha">
                                            Fecha: Cancún, Quintana Roo a <?php echo date("d/m/y");?>.
                                    </p>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <p class="ParrafoEmpresa">
                            <b>LIC. JOSÉ ANTONIO MORALES BAILÓN</b>
                            <br><b>ENCARGADO INTERINO DE LA DIRECCIÓN</b>
                            <br><b>DE VINCULACIÓN, DIFUSIÓN Y EXTENSIÓN UNIVERSITARIA.</b>
                            <br><b>UNIVERSIDAD POLITÉCNICA DE QUINTANA ROO</b> 
                    </p>
                    <div class="Parrafo">
                            Por medio de la presente, hacemos constar que el alumno <b>{{$dato->ape_paterno}} {{$dato->ape_materno}} {{$dato->nombres}}</b>, del Programa Educativo {{$dato->nombre_carrera}}, 
                            ha cumplido satisfactoriamente sus actividades de  Estadía, realizada en esta <b>{{$dato->nombre_emp}}</b>; elaborando el proyecto: {{$dato->nombre_proyecto}}
                            durante el periodo comprendido del <b>fecha de inicio</b>  al <b>fecha de terminación</b>, el cual desarrolló en el departamento de <b>Nombre del departamento </b>,
                            bajo la asesoría de <b>{{$dato->ape_paterno_ae}} {{$dato->ape_materno_ae}} {{$dato->nombres_ae}}</b>, por parte de la empresa.     
                        </div>
                        <br>      
                        <br>
                        <div class="Parrafo">
                        Se autoriza de igual forma, el uso de la información institucional y de los resultados obtenidos para la realización del reporte final de la estadía.
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p class="ParrafoFirma">
                            <b>ATENTAMENTE</b>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <table class="table table-borderless p-0 m-1" >
                                <tbody>
                                    <tr class="p-0 m-0">
                                                        <td colspan="2" class="p-1"><div><div style="border-bottom: 1px solid black;"></div><div class="subT text-center"><small>{{$dato->ape_paterno_ae}} {{$dato->ape_materno_ae}} {{$dato->nombres_ae}}</small></div><div class="subT text-center"><small>{{$datodp->puesto}}</small></div><div class="subT text-center"><small></small></div></div></td>
                                                        <td colspan="1" ></td>
                                                        <td colspan="2" class="p-1"><div><div style="border-bottom: 1px solid black;"></div><div class="subT text-center"><small>{{$dato->ape_paterno_aa}} {{$dato->ape_materno_aa}} {{$dato->nombres_aa}}</small></div><div class="subT text-center"><small>Asesor Académico</small></div></div></td>
                                    </tr>
                                    <br>
                                    <br>
                                </tbody>
                            </table>
                        </p>
                    @endif                     
                @empty

                @endforelse  
          
           @endif                     
        @empty

        @endforelse            
        </main>
    </body>
</html>
