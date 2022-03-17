<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPQROO</title>

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
	@include('plantilla/alumno/sideBar')

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		@include('plantilla/alumno/navBar')
		<!-- Content page -->
		<div class="container p-3">
			<div class="page-header">
			  <h2 class="text-titles">Formatos <small>(Estadías)</small></h2>
			</div>
		</div>
		<div class="container p-2">
				<ol class="list-group">
				
		<!-- f03 -->
					<li class="list-group-item d-flex justify-content-between align-items-start">
						<div class="row lista">
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2">
								<div class="ms-2 me-auto">
									<div class="fw-bold">F03</div>
									Cedula de registro
								</div>
							</div>
						
								@forelse ($datos['datosCedula'] as $dato)
										<div class="col-6 col-sm-6 col-md-5 col-lg-3 col-xl-2 p-0 colLlenar">
											<form method="post" action="{{ route('eliminar_f03Estadia.index',[$dato->id_alumno,$dato->id_empresa,$dato->id_asesor_emp,$dato->id_asesor_aca,$dato->id_proyecto]) }}">
												@csrf
												<button type="submit" class="btn btn-outline-danger btnCancelar" >Eliminar</button>
											</form>											
										</div>
										<div class="ccol-12 col-sm-12 col-md-3 col-lg-2 col-xl-1 p-1 colDescargar text-center">
											<a href="{{ route('descarga_cd_estadia_f03.index') }}">
												<button type="button" class="btn btn-outline-info btnDescargar"><i class="zmdi zmdi-download"> Descargar</i></button>
											</a>
										</div>
										<div class="col-12 col-sm-12 col-md-12 col-lg-7 colArchivo">
											@forelse ($documentos['documentos'] as $datoD)
													@forelse ($documentos['cedula_registro'] as $datoC)
													
													<div class="row">
														<div class="col-12 col-sm-9">
															<form action="{{ route('cancelar_f03_Estadia.index',[$datoC->id,$datoC->name]) }}" method="POST" enctype="multipart/form-data">
																@csrf
																<div class="row">
																	<div class="col-12 col-sm-9 px-3 py-1">
																		<input type="text" name="nombreAf03" id="" value="{{$datoC->nombre_c_r}}" class="nombreDoc id_d">
																	</div>
																	<div class="col-12 col-sm-3 px-3 py-1">
																		<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																	</div>
																</div>																			
															</form>
														</div>

																<div class="col-12 col-sm-3 py-1">
																
																	@switch($datoC->estado_c_r)
																		@case(0)
																			
																			<a href="{{ route('obsevaciones_f03_estadia.index') }}">
																				<button type="submit" class="btn btn-outline-danger divObservacionf02" ><i class="zmdi zmdi-folder-person">  Observaciones</i> </button>
																			</a>
																		@break
															
																		@case(1)
																			<div class="divPendientef02"><i class="zmdi zmdi-folder-person">  Pendiente</i>  </div>
																		@break
																		@case(2)
																			<div class="divAceptadof02"><i class="zmdi zmdi-check-circle-u">  Aceptado</i> </div>
																		@break
																		@default
																			<p>Error</p>
																	@endswitch
																</div>

													</div>
													@empty
														@forelse ($documentos['documentos'] as $dato)
																<form action="{{ route('actualizar_f03_estadia.index',[auth()->user()->name,$datoD->name]) }}" method="post" enctype="multipart/form-data" >
																	@csrf
																		<input type="text" class="id_d" value="{{$datoD->id_documentos}}" name="id_docf03">
																		<span class="btn  fileinput-button">
																			<i class="zmdi zmdi-file"></i>
																			<input type="file" class="archivo" name="f03">
																		</span>
																		<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
																</form>
														@empty
															Error															
														@endforelse	
													@endforelse	
											@empty
													<form action="{{ route('subir_f03_estadia.index',[auth()->user()->name,auth()->user()->name]) }}" method="post" enctype="multipart/form-data" >
														@csrf
														<span class="btn  fileinput-button">
															<i class="zmdi zmdi-file"></i>
															<input type="file" class="archivo" name="f03">
														</span>
														<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
													</form>
											@endforelse	
										</div>											
																				
										
								@empty
										<div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2 p-0 colLlenar">
											<a href="{{ route('home.index') }}">
												<button type="button" class="btn btn-outline-dark btnLlenar" >Llenar Cedula de Registro</button>
											</a>
										</div>
										<div class="col-12 col-sm-12 col-md-12 col-lg-8 colArchivo">
										
										</div>											
										
								@endforelse
						</div>
					</li>

				</ol>
				
		</div>
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
	.id_d{
		visibility: hidden;
		display: none;
		width:10px;
	}
</style>