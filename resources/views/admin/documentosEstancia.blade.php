<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

   
    <link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/formato.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <link rel="stylesheet" href='{{ asset("/css/main.css") }}'>

</head>
<body>
    <!-- SideBar -->
	@include('plantilla/admin/sideBar')

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		@include('plantilla/admin/navBar')

		<!-- Content page -->
		<div class="container p-3">
			<div class="page-header">
			  <h2 class="text-titles">Documetos Registrados<small>(Estancia)</small></h2>
			</div>
		</div>
        <div class="container">
            <form action="{{ route('buscar_estancia.index') }}" method="GET">
                @csrf
                  <!-- buscar-->
                    <div class="row">
                        <div class=" col-12 col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="texto" name="texto" placeholder="Buscar" value="">
                                
                        </div>
                        <div class="col-12 col-sm-12 col-md-2">
                            <input type="submit" value="Buscar" class="btn btn-outline-primary buscar">
                        </div>
                    </div>
            </form>
      
        </div>
        <!---notificacion --->
        @include('notificaciones/notificaciones')  
        @forelse($documentos['documentos'] as $respuestaD)
             @forelse($documentos['usuarios'] as $respuestaU)
                @if ($respuestaD->name==$respuestaU->name)
                    <div class="row p-4">
                        <div class="col-12">
                                <div class="row documentosUsuario">
                                    <div class="col-12" style="background: black; color:white;">
                                        <div class="text-center">Usuario</div>
                                    </div>
                                    <div class="col-12 col-sm-6 p-0">
                                        <div><div class="text-center" style="background: rgb(31 104 162); color:white;">Nombre/Apellidos</div><div class="text-center">{{ $respuestaU->nombres}} {{ $respuestaU->ape_paterno}} {{ $respuestaU->ape_materno}}</div></div>
                                    </div>
                                    <div class="col-12 col-sm-6 p-0">
                                        <div><div class="text-center" style="background: rgb(31 104 162); color:white;">Correo</div><div class="text-center">{{ $respuestaU->email}}</div></div>
                                    </div>
                                   
                                    <div class="col-6 col-sm-6 p-0">
                                        <div><div class="text-center" style="background: rgb(31 104 162); color:white;">Matricula</div><div class="text-center">{{ $respuestaU->matricula}}</div></div>
                                    </div>
                                    
                                    <div class="col-6 col-sm-6 p-0">
                                        <div><div class="text-center" style="background: rgb(31 104 162); color:white;">Carrera</div><div class="text-center">{{ $respuestaU->nombre_carrera}}</div></div>
                                    </div>
                                    <div class="col-12" style="background: black; color:white;">
                                        <div class="text-center">Documentos</div>
                                    </div>
                        <!--f02-->
                                    @if ($respuestaD->id_c_aceptacion)
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 doc" >
                                            <div>
                                                
                                                <div class="text-center divNombreCard">
                                                    Carta aceptación
                                                </div>
                                                <div class="text-center"> 
                                                    
                                                </div>
                                            </div>
                                        </div>          
                                    @endif
                        <!--f03-->
                                    @if($respuestaD->id_c_registro)
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 doc" >
                                                
                                                <div class="row text-center divNombreCard">
                                                    <div class="col-12">
                                                        F-03 Cedula registro
                                                    </div>
                                                </div>
                                               
                                                        <div class="row text-center">
                                                            <div class="col-12 nombreDoc">
                                                                {{$respuestaD->nombre_c_r}}
                                                            </div>
                                                            @switch($respuestaD->estado_c_r)
                                                                @case(0)
                                                                    <div class="col-12">
                                                                        <div class="text-center p-1"><span class="badge bg-danger text-dark">Con Observaciones</span></div>
                                                                    </div>
                                                                @break
                                                                @case(1)
                                                                    <div class="col-12">
                                                                        <div class="text-center p-1"><span class="badge bg-warning">Pendiente</span></div>
                                                                    </div>
                                                                @break
                                                                @case(2)
                                                                    <div class="col-12">
                                                                        <div class="text-center p-1"><span class="badge bg-success">Aceptado</span></div>
                                                                    </div>
                                                                @break
                                                                @default
                                                                    
                                                            @endswitch
                                                            <div class="col-6 p-1">
                                                                <form method="post" action="{{ route('ver_cd_estancia_f03_admin.index',[$respuestaD->nombre_c_r]) }}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-outline-primary btnVer" > <i class="zmdi zmdi-eye zmdi-hc-lg"></i> Ver</button>
                                                                </form>	
                                                            </div>
                                                            
                                                            @switch($respuestaD->estado_c_r)
                                                                @case(0)
                                                        <!--con observaciones-->
                                                                    <div class="col-6 p-1">
                                                                        <form method="post" action="{{ route('aceptar_estancia_f03_admin.index',[$respuestaD->id_usuario,$respuestaD->id_c_registro, $respuestaD->nombre_c_r]) }}">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-success btnAceptar" > <i class="zmdi zmdi-check zmdi-hc-lg"></i> Aceptar</button>
                                                                        </form>	
                                                                    </div>
                                                                    <div class="col-12 p-1">
                                                                        <form method="post" action="{{ route('pendiente_estancia_f03_admin.index',[$respuestaD->id_usuario,$respuestaD->id_c_registro, $respuestaD->nombre_c_r]) }}">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-warning btnPendiente" >Pendiente</button>
                                                                        </form>	
                                                                    </div>
                                                                    <div class="col-12 p-1">
                                                                        <form method="post" action="{{ route('conObservaciones_estancia_f03_admin.index') }}">
                                                                            @csrf
                                                                            <input type="text" name="id_c" id="id_c" value="{{$respuestaD->id_c_registro}}" class="id_d">
                    
                                                                            <button type="submit" class="btn btn-outline-danger btnObservaciones" > <i class="zmdi zmdi-alert-circle zmdi-hc-lg"></i> Ver Obsevaciones</button>
                                                                        </form>	
                                                                    </div>
                                                                    
                                                                @break    
                                                        <!--pendiente-->
                                                                @case(1)
                                                                    <div class="col-6 p-1">
                                                                        <form method="post" action="{{ route('aceptar_estancia_f03_admin.index',[$respuestaD->id_usuario,$respuestaD->id_c_registro, $respuestaD->nombre_c_r]) }}">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-success btnAceptar" > <i class="zmdi zmdi-check zmdi-hc-lg"></i> Aceptar</button>
                                                                        </form>	
                                                                    </div>
                                                                    <div class="col-12 p-1">
                                                                        <form method="post" action="{{ route('observaciones_estancia_f03_admin.index') }}">
                                                                            @csrf
                                                                            <input type="text" name="id_c" id="id_c" value="{{$respuestaD->id_c_registro}}" class="id_d">
                                                                            <button type="submit" class="btn btn-outline-danger btnObservaciones" > <i class="zmdi zmdi-alert-circle zmdi-hc-lg"></i> Obsevaciones</button>
                                                                        </form>	
                                                                    </div>
                                                                @break
                                                        <!--aceptado-->
                                                                @case(2)
                                                                
                                                                    <div class="col-6 p-1">
                                                                        <form method="post" action="{{ route('pendiente_estancia_f03_admin.index',[$respuestaD->id_usuario,$respuestaD->id_c_registro, $respuestaD->nombre_c_r]) }}">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-warning btnAceptar" >Pendiente</button>
                                                                        </form>	
                                                                    </div>
                                                                    <div class="col-12 p-1">
                                                                        <form method="post" action="{{ route('observaciones_estancia_f03_admin.index') }}">
                                                                            @csrf
                                                                            <input type="text" name="id_c" id="id_c" value="{{$respuestaD->id_c_registro}}" class="id_d">
                                                                            <button type="submit" class="btn btn-outline-danger btnObservaciones" > <i class="zmdi zmdi-alert-circle zmdi-hc-lg"></i> Obsevaciones</button>
                                                                        </form>	
                                                                    </div>
                                                                @break
                                                            
                                                                @default
                                                                    
                                                            @endswitch
                                                            
                                                        </div>
                                        </div>
                                    @endif
                        <!--f04-->
                                    @if ($respuestaD->id_d_proyecto)
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 doc" >
                                            <div>
                                                
                                                <div class="text-center divNombreCard">
                                                    Definición proyecto
                                                </div>
                                                <div class="text-center"> 
                                                    
                                                </div>
                                            </div>
                                        </div>                    
                                    @endif
                        <!--f05-->
                                    @if ($respuestaD->id_c_liberacion)
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 doc" >
                                            <div>
                                                
                                                <div class="text-center divNombreCard">
                                                    Carta liberación
                                                </div>
                                                <div class="text-center"> 
                                                    
                                                </div>
                                            </div>
                                        </div>                   
                                    @endif
                                </div>
                                
                        </div>
                    </div> 
                @endif
            @empty
                                                    
            @endforelse
            
        @empty
            <div class="row">
                <div class="col-12 text-center">
                    Sin documentos subidos
                </div>
            </div>                                     
        @endforelse

			
			
	</section>
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
<style>
    .doc{
        box-shadow: 0 1px 7px rgb(0 0 0 / 20%);
    }
</style>