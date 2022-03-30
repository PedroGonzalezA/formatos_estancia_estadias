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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
			  <h2 class="text-titles">Formatos <small>(Estancias)</small></h2>
			</div>
		</div>
		@include('notificaciones/notificaciones')
		<div class="container p-2">
				<ol class="list-group borde">
					<!-- f01 -->
					<li class="list-group-item d-flex justify-content-between align-items-start" style="border: 1px solid rgb(210, 210, 210);">
						<div class="row lista">
							<div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
								<div class="ms-2 me-auto">
									<div class="fw-bold">F01</div>
									Carta de Presentación
								</div>
							</div>
						
							<!--Descargar 01-->
							<div class="col-6 col-sm-12 col-md-3 col-lg-2 col-xl-2 p-1 colDescargar text-left">
								<a href="{{ route('descarga_cd_estancia_f01.index') }}">
									<button type="button" class="btn btn-outline-info btnDescargar"><i class="zmdi zmdi-download"> Descargar</i></button>
								</a>
							</div>
							<div class="col-6 col-sm-6 col-md-5 col-lg-3 col-xl-1 p-1 colLlenar  ">				
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-7 p-1 colArchivo">				
							</div>		
						</div>
					</li>
					<!-- f02 -->
					<li class="list-group-item d-flex justify-content-between align-items-start" style="border: 1px solid rgb(210, 210, 210);">
						<div class="row lista">
							<div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
								<div class="ms-2 me-auto">
									<div class="fw-bold">F02</div>
									Carta de Aceptación
								</div>
							</div>
							<!--Descargar 02-->
							<div class="col-6 col-sm-12 col-md-3 col-lg-2 col-xl-2 p-1 colDescargar text-left">
								<a href="{{ route('descarga_cd_estancia_f02.index') }}">
									<button type="button" class="btn btn-outline-info btnDescargar"><i class="zmdi zmdi-download"> Descargar</i></button>
								</a>
							</div>
							<div class="col-6 col-sm-6 col-md-5 col-lg-3 col-xl-1 p-1 colLlenar  ">					
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-7 p-1 colArchivo">
												@forelse ($documentos['documentos'] as $datoD)
														@forelse ($carta_aceptacion['carta_aceptacion'] as $datoCA)
																		<div class="row">
																			<div class="col-12 col-sm-12 py-1">
																				@switch($datoCA->estado)
																					@case(0)
																						<!--Observaciones-->
																						<div class="row">
																							<div class="col-12 col-sm-9">
																								<form class="btn-cancelarF2-system" action="{{ route('cancelar_f02_Estancia.index',[$datoCA->id_documentos,$datoCA->name]) }}" method="POST" enctype="multipart/form-data">
																									@csrf
																									<div class="row">
																										<div class="col-12 col-sm-9 id_d" >
																											<input type="text" name="nombreAf02" id="" value="{{$datoCA->nombre}}" class="nombreDoc"style=''>
																										</div>
																										<div class="col-12 col-sm-9 py-1" >
																											<input type="text" value="{{$datoCA->nombre}}" class="nombreDoc" disabled>
																										</div>
																										<div class="col-12 col-sm-3 py-1">
																											<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																										</div>
																									</div>
																									
																								</form>
																							</div>
																							<div class="col-12 col-sm-3">
																								<a href="{{ route('obsevaciones_f02.index') }}">
																									<button type="submit" class="btn btn-outline-danger divObservacionf02" ><i class="zmdi zmdi-folder-person">  Observaciones</i> </button>
																								</a>	
																							</div>
																											
																						</div>																																					
																					@break
																				
																					@case(1)
																					<!--pendiente-->
																					<div class="row">
																						<div class="col-12 col-sm-9">
																							<form class="btn-cancelarF2-system" action="{{ route('cancelar_f02_Estancia.index',[$datoCA->id_documentos,$datoCA->name]) }}" method="POST" enctype="multipart/form-data">
																								@csrf
																								<div class="row">
																									<div class="col-12 col-sm-9 px-3 py-1 id_d" >
																										<input type="text" name="nombreAf02" id="" value="{{$datoCA->nombre}}" class="nombreDoc"style=''>
																									</div>
																									<div class="col-12 col-sm-9 px-3 py-1" >
																										<input type="text" value="{{$datoCA->nombre}}" class="nombreDoc" disabled>
																									</div>
																									<div class="col-12 col-sm-3 px-3 py-1">
																										<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																									</div>
																								</div>																			
																							</form>
																						</div>
																						<div class="col-12 col-sm-3">
																							<div class="divPendientef02"><i class="zmdi zmdi-folder-person">  Pendiente</i>  </div>
																					@break
																					@case(2)
																					<!--aceptado-->
																							<div class="row">
																								<div class="col-9 col-sm-9 px-3 py-1" >
																									<input type="text" value="{{$datoCA->nombre}}" class="nombreDoc" disabled>
																								</div>
																								<div class="col-3 col-sm-3 px-3 py-1" >
																									<div class="divAceptadof02"><i class="zmdi zmdi-check-circle-u">  Aceptado</i> </div>
																								</div>
																							</div>																			
																					@break
																					@default
																							<p>Error</p>
																				@endswitch
																			</div>
																		</div>
														@empty
														<!-- enviar cedula registro con datos-->
															@forelse ($documentos['documentos'] as $dato)														
																<form action="{{ route('actualizar_f02_estancia.index',[auth()->user()->name,$datoD->name]) }}" method="post" enctype="multipart/form-data" >
																	@csrf
																		<input type="text" class="id_d" value="{{$datoD->id_documentos}}" name="id_docf02">
																		<span class="btn  fileinput-button">
																			<i class="zmdi zmdi-file"></i>
																			<input type="file" class="archivo" name="f02">
																		</span>
																		<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
																</form>
																
															@empty
																Error
															@endforelse	
														@endforelse	
												@empty
												<!-- enviar cedula registro vacio-->
													<form action="{{ route('subir_f02_estancia.index',[auth()->user()->name,auth()->user()->name]) }}" method="post" enctype="multipart/form-data" >
														@csrf
														<span class="btn  fileinput-button">
															<i class="zmdi zmdi-file"></i>
															<input type="file" class="archivo" name="f02">
														</span>
														<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
													</form>
												@endforelse			
							</div>
							<!--Error 01-->						
							@error('f02')
								<p class="border border-danger rounded-md bg-red-200 w-full text-red-600 p-2 my-2">{{ $message }}</p>
							@enderror													
										
						</div>
					</li>
					<!-- f03 -->
					<li class="list-group-item d-flex justify-content-between align-items-start" style="border: 1px solid rgb(210, 210, 210);">
						<div class="row lista">
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2">
								<div class="ms-2 me-auto">
									<div class="fw-bold">F03</div>
									Cédula de Registro
								</div>
							</div>
						
								
							@forelse ($datos['datosCedula'] as $dato)
								<!--ELIMINAR F03-->
								<div class="col-6 col-sm-6 col-md-5 col-lg-3 col-xl-2 p-1 colLlenar">
									<form class="btn-eliminarCR-system" method="post" action="{{ route('eliminar_f03',[$dato->id_alumno,$dato->id_empresa,$dato->id_asesor_emp,$dato->id_asesor_aca,$dato->id_proyecto]) }}">
										@csrf
										<button type="submit" class="btn btn-outline-danger btnCancelar" >Eliminar</button>
									</form>											
								</div>
								<!--Descargar F03-->
								<div class="col-12 col-sm-12 col-md-3 col-lg-2 col-xl-1 p-1 colDescargar text-center">
									<a href="{{ route('descarga_cd_estancia_f03.index') }}">
										<button type="button" class="btn btn-outline-info btnDescargar"><i class="zmdi zmdi-download"> Descargar</i></button>
									</a>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-7 p-1 colArchivo">
												@forelse ($documentos['documentos'] as $datoD)
														@forelse ($documentos['cedula_registro'] as $datoC)
																		<div class="row">
																			<div class="col-12 col-sm-12 py-1">
																				@switch($datoC->estado_c_r)
																					@case(0)
																						<!--Observaciones-->
																						<div class="row">
																							<div class="col-12 col-sm-9">
																								<form class="btn-cancelarF3-system" action="{{ route('cancelar_f03_Estancia.index',[$datoC->id_documentos,$datoC->name]) }}" method="POST" enctype="multipart/form-data">
																									@csrf
																									<div class="row">
																										<div class="col-12 col-sm-9 id_d" >
																											<input type="text" name="nombreAf03" id="" value="{{$datoC->nombre_c_r}}" class="nombreDoc"style=''>
																										</div>
																										<div class="col-12 col-sm-9 py-1" >
																											<input type="text" value="{{$datoC->nombre_c_r}}" class="nombreDoc" disabled>
																										</div>
																										<div class="col-12 col-sm-3 py-1">
																											<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																										</div>
																									</div>
																									
																								</form>
																							</div>
																							<div class="col-12 col-sm-3">
																								<a href="{{ route('obsevaciones_f03.index') }}">
																									<button type="submit" class="btn btn-outline-danger divObservacionf02" ><i class="zmdi zmdi-folder-person">  Observaciones</i> </button>
																								</a>	
																							</div>
																											
																						</div>																																					
																					@break
																				
																					@case(1)
																					<!--pendiente-->
																					<div class="row">
																						<div class="col-12 col-sm-9">
																							<form class="btn-cancelarF3-system" action="{{ route('cancelar_f03_Estancia.index',[$datoC->id_documentos,$datoC->name]) }}" method="POST" enctype="multipart/form-data">
																								@csrf
																								<div class="row">
																									<div class="col-12 col-sm-9 px-3 py-1 id_d" >
																										<input type="text" name="nombreAf03" id="" value="{{$datoC->nombre_c_r}}" class="nombreDoc"style=''>
																									</div>
																									<div class="col-12 col-sm-9 px-3 py-1" >
																										<input type="text" value="{{$datoC->nombre_c_r}}" class="nombreDoc" disabled>
																									</div>
																									<div class="col-12 col-sm-3 px-3 py-1">
																										<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																									</div>
																								</div>																			
																							</form>
																						</div>
																						<div class="col-12 col-sm-3">
																							<div class="divPendientef02"><i class="zmdi zmdi-folder-person">  Pendiente</i>  </div>
																					@break
																					@case(2)
																					<!--aceptado-->
																							<div class="row">
																								<div class="col-9 col-sm-9 px-3 py-1" >
																									<input type="text" value="{{$datoC->nombre_c_r}}" class="nombreDoc" disabled>
																								</div>
																								<div class="col-3 col-sm-3 px-3 py-1" >
																									<div class="divAceptadof02"><i class="zmdi zmdi-check-circle-u">  Aceptado</i> </div>
																								</div>
																							</div>																			
																					@break
																					@default
																							<p>Error</p>
																				@endswitch
																			</div>
																		</div>
														@empty
														<!-- enviar cedula registro con datos-->
															@forelse ($documentos['documentos'] as $dato)														
																<form action="{{ route('actualizar_f03_estancia.index',[auth()->user()->name,$datoD->name]) }}" method="post" enctype="multipart/form-data" >
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
												<!-- enviar cedula registro vacio-->
													<form action="{{ route('subir_f03_estancia.index',[auth()->user()->name,auth()->user()->name]) }}" method="post" enctype="multipart/form-data" >
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
								<!-- llenar cedula registro vacio-->
								<div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2 p-1 colLlenar">
									<a href="{{ route('home.index') }}">
										<button type="button" class="btn btn-outline-dark btnLlenar" >Llenar Cedula de Registro</button>
									</a>
								</div>
											
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 colArchivo">
													
								</div>
							@endforelse	
							<!--error 03-->				
							@error('f03')
								<p class="border border-danger rounded-md bg-red-200 w-full text-red-600 p-2 my-2">{{ $message }}</p>
							@enderror												
						</div>
					</li>
					<!--f04-->
					<li class="list-group-item d-flex justify-content-between align-items-start" style="border: 1px solid rgb(210, 210, 210);">
						<div class="row lista">	
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
								<div class="ms-2 me-auto">
									<div class="fw-bold">F04</div>
									Definición de Proyecto
								</div>
							</div>
							
							@forelse ($definicionP['datosDef'] as $dato)
											<!--eliminar F04-->
											<div class="col-6 col-sm-6 col-md-5 col-lg-3 col-xl-2 p-1 colLlenar">
												<form class="btn-eliminarDP-system" method="post" action="{{ route('eliminar_f04.index',[$dato->id_alumno,$dato->id_asesor_emp,$dato->id_proyecto,$dato->id_detalle]) }}">
													@csrf
													@foreach ($etapas['etapas'] as $datoE )
														<input type="text" name="id_etapas_{{$datoE->numero}}" value="{{$datoE->id}}" class="id_d" >
													@endforeach
													<button type="submit" class="btn btn-outline-danger btnCancelar" >Eliminar</button>
												</form>											
											</div>
											<!--Descargar F04-->
											<div class="col-12 col-sm-12 col-md-3 col-lg-2 col-xl-1 p-1 colDescargar text-centerr">
												<a href="{{ route('descarga_cd_estancia_f04.index') }}">
													<button type="button" class="btn btn-outline-info btnDescargar"><i class="zmdi zmdi-download"> Descargar</i></button>
												</a>
											</div>
											<div class="col-12 col-sm-12 col-md-12 col-lg-7 p-1 colArchivo">
												@forelse ($documentos['documentos'] as $datoD)
														@forelse ($etapas['definicion_proyecto'] as $datoDP)
																		<div class="row">
																			<div class="col-12 col-sm-12 py-1">
																				@switch($datoDP->estado_d_p)
																					@case(0)
																						<!--Observaciones-->
																						<div class="row">
																							<div class="col-12 col-sm-9">
																								<form class="btn-cancelarF4-system" action="{{ route('cancelar_f04_Estancia.index',[$datoDP->id_documentos,$datoDP->name]) }}" method="POST" enctype="multipart/form-data">
																									@csrf
																									<div class="row">
																										<div class="col-12 col-sm-9 id_d" >
																											<input type="text" name="nombreAf04" id="" value="{{$datoDP->nombre_d_p}}" class="nombreDoc"style=''>
																										</div>
																										<div class="col-12 col-sm-9 py-1" >
																											<input type="text" value="{{$datoDP->nombre_d_p}}" class="nombreDoc" disabled>
																										</div>
																										<div class="col-12 col-sm-3 py-1">
																											<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																										</div>
																									</div>
																									
																								</form>
																							</div>
																							<div class="col-12 col-sm-3">
																								<a href="{{ route('obsevaciones_f04.index') }}">
																									<button type="submit" class="btn btn-outline-danger divObservacionf02" ><i class="zmdi zmdi-folder-person">  Observaciones</i> </button>
																								</a>	
																							</div>
																											
																						</div>																																					
																					@break
																				
																					@case(1)
																					<!--pendiente-->
																					<div class="row">
																						<div class="col-12 col-sm-9">
																							<form class="btn-cancelarF4-system" action="{{ route('cancelar_f04_Estancia.index',[$datoDP->id_documentos,$datoDP->name]) }}" method="POST" enctype="multipart/form-data">
																								@csrf
																								<div class="row">
																									<div class="col-12 col-sm-9 px-3 py-1 id_d" >
																										<input type="text" name="nombreAf04" id="" value="{{$datoDP->nombre_d_p}}" class="nombreDoc"style=''>
																									</div>
																									<div class="col-12 col-sm-9 px-3 py-1" >
																										<input type="text" value="{{$datoDP->nombre_d_p}}" class="nombreDoc" disabled>
																									</div>
																									<div class="col-12 col-sm-3 px-3 py-1">
																										<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																									</div>
																								</div>																			
																							</form>
																						</div>
																						<div class="col-12 col-sm-3">
																							<div class="divPendientef02"><i class="zmdi zmdi-folder-person">  Pendiente</i>  </div>
																					@break
																					@case(2)
																					<!--aceptado-->
																							<div class="row">
																								<div class="col-9 col-sm-9 px-3 py-1" >
																									<input type="text" value="{{$datoDP->nombre_d_p}}" class="nombreDoc" disabled>
																								</div>
																								<div class="col-3 col-sm-3 px-3 py-1" >
																									<div class="divAceptadof02"><i class="zmdi zmdi-check-circle-u">  Aceptado</i> </div>
																								</div>
																							</div>																			
																					@break
																					@default
																							<p>Error</p>
																				@endswitch
																			</div>
																		</div>
														@empty
														<!-- enviar cedula registro con datos-->
															@forelse ($documentos['documentos'] as $dato)														
																<form action="{{ route('actualizar_f04_estancia.index',[auth()->user()->name,$datoD->name]) }}" method="post" enctype="multipart/form-data" >
																	@csrf
																		<input type="text" class="id_d" value="{{$datoD->id_documentos}}" name="id_docf04">
																		<span class="btn  fileinput-button">
																			<i class="zmdi zmdi-file"></i>
																			<input type="file" class="archivo" name="f04">
																		</span>
																		<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
																</form>
																
															@empty
																Error
															@endforelse	
														@endforelse	
												@empty
												<!-- enviar cedula registro vacio-->
													<form action="{{ route('subir_f04_estancia.index',[auth()->user()->name,auth()->user()->name]) }}" method="post" enctype="multipart/form-data" >
														@csrf
														<span class="btn  fileinput-button">
															<i class="zmdi zmdi-file"></i>
															<input type="file" class="archivo" name="f04">
														</span>
														<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
													</form>
												@endforelse			
											</div>
												
							@empty
										<!--llenar formmulario  f04-->
										<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 p-0 colLlenar">
											<a href="{{ route('f04Formulario.index') }}">
												<button type="button" class="btn btn-outline-dark btnLlenarDp" >Llenar Definición de Proyecto</button>
											</a>
										</div>
										<div class="col-12 col-sm-12 col-md-12 col-lg-8 colArchivo">
													
										</div>
							@endforelse
							<!--ERROR f04-->
							@error('f04')
								<p class="border border-danger rounded-md bg-red-200 w-full text-red-600 p-2 my-2">{{ $message }}</p>
							@enderror			
						</div>
					</li>
					<!--F05-->
					<li class="list-group-item d-flex justify-content-between align-items-start" style="border: 1px solid rgb(210, 210, 210);">
						<div class="row lista">
							<div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
								<div class="ms-2 me-auto">
									<div class="fw-bold">F05</div>
									Carta de Liberación
								</div>
							</div>
							<!--Descargar f05-->
							<div class="col-6 col-sm-12 col-md-3 col-lg-2 col-xl-2 p-1 colDescargar text-left">
								<a href="{{ route('descarga_cd_estancia_f05.index') }}">
									<button type="button" class="btn btn-outline-info btnDescargar"><i class="zmdi zmdi-download"> Descargar</i></button>
								</a>
							</div>
							<div class="col-6 col-sm-6 col-md-5 col-lg-3 col-xl-1 p-1 colLlenar  ">
												
							</div>
							<!--enviar doc f05-->
							<div class="col-12 col-sm-12 col-md-12 col-lg-7 p-1 colArchivo">
												@forelse ($documentos['documentos'] as $datoD)
														@forelse ($carta_aceptacion['carta_liberacion'] as $datoCL)
																		<div class="row">
																			<div class="col-12 col-sm-12 py-1">
																				@switch($datoCL->estado_c_l)
																					@case(0)
																						<!--Observaciones-->
																						<div class="row">
																							<div class="col-12 col-sm-9">
																								<form class="btn-cancelarF5-system" action="{{ route('cancelar_f05_Estancia.index',[$datoCL->id_documentos,$datoCL->name]) }}" method="POST" enctype="multipart/form-data">
																									@csrf
																									<div class="row">
																										<div class="col-12 col-sm-9 id_d" >
																											<input type="text" name="nombreAf05" id="" value="{{$datoCL->nombre_c_l}}" class="nombreDoc"style=''>
																										</div>
																										<div class="col-12 col-sm-9 py-1" >
																											<input type="text" value="{{$datoCL->nombre_c_l}}" class="nombreDoc" disabled>
																										</div>
																										<div class="col-12 col-sm-3 py-1">
																											<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																										</div>
																									</div>
																									
																								</form>
																							</div>
																							<div class="col-12 col-sm-3">
																								<a href="{{ route('obsevaciones_f05.index') }}">
																									<button type="submit" class="btn btn-outline-danger divObservacionf02" ><i class="zmdi zmdi-folder-person">  Observaciones</i> </button>
																								</a>	
																							</div>
																											
																						</div>																																					
																					@break
																				
																					@case(1)
																					<!--pendiente-->
																					<div class="row">
																						<div class="col-12 col-sm-9">
																							<form class="btn-cancelarF5-system" action="{{ route('cancelar_f05_Estancia.index',[$datoCL->id_documentos,$datoCL->name]) }}" method="POST" enctype="multipart/form-data">
																								@csrf
																								<div class="row">
																									<div class="col-12 col-sm-9 px-3 py-1 id_d" >
																										<input type="text" name="nombreAf05" id="" value="{{$datoCL->nombre_c_l}}" class="nombreDoc"style=''>
																									</div>
																									<div class="col-12 col-sm-9 px-3 py-1" >
																										<input type="text" value="{{$datoCL->nombre_c_l}}" class="nombreDoc" disabled>
																									</div>
																									<div class="col-12 col-sm-3 px-3 py-1">
																										<button type="submit" class="btn btn-outline-danger btnCancelar" >Cancelar</button>
																									</div>
																								</div>																			
																							</form>
																						</div>
																						<div class="col-12 col-sm-3">
																							<div class="divPendientef02"><i class="zmdi zmdi-folder-person">  Pendiente</i>  </div>
																					@break
																					@case(2)
																					<!--aceptado-->
																							<div class="row">
																								<div class="col-9 col-sm-9 px-3 py-1" >
																									<input type="text" value="{{$datoCL->nombre_c_l}}" class="nombreDoc" disabled>
																								</div>
																								<div class="col-3 col-sm-3 px-3 py-1" >
																									<div class="divAceptadof02"><i class="zmdi zmdi-check-circle-u">  Aceptado</i> </div>
																								</div>
																							</div>																			
																					@break
																					@default
																							<p>Error</p>
																				@endswitch
																			</div>
																		</div>
														@empty
														<!-- enviar cedula registro con datos-->
															@forelse ($documentos['documentos'] as $dato)														
																<form action="{{ route('actualizar_f05_estancia.index',[auth()->user()->name,$datoD->name]) }}" method="post" enctype="multipart/form-data" >
																	@csrf
																		<input type="text" class="id_d" value="{{$datoD->id_documentos}}" name="id_docf05">
																		<span class="btn  fileinput-button">
																			<i class="zmdi zmdi-file"></i>
																			<input type="file" class="archivo" name="f05">
																		</span>
																		<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
																</form>
																
															@empty
																Error
															@endforelse	
														@endforelse	
												@empty
												<!-- enviar cedula registro vacio-->
													<form action="{{ route('subir_f05_estancia.index',[auth()->user()->name,auth()->user()->name]) }}" method="post" enctype="multipart/form-data" >
														@csrf
														<span class="btn  fileinput-button">
															<i class="zmdi zmdi-file"></i>
															<input type="file" class="archivo" name="f05">
														</span>
														<button type="submit" class="btn btn-outline-info btnSubir">Enviar</button>
													</form>
												@endforelse			
							</div>	
							<!--error f05-->			
							@error('f05')
								<p class="border border-danger rounded-md bg-red-200 w-full text-red-600 p-2 my-2">{{ $message }}</p>
							@enderror													
										
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
	@media (max-width: 406px){
	
		.borde{
			border: 1px solid darkgrey;
		}
	}
</style>