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
			  <h2 class="text-titles">Documetos <small>(Registrados)</small></h2>
			</div>
		</div>
        <table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Matricula</th>
					<th scope="col">Correo</th>
                    <th scope="col">Carta aceptación</th>
                    <th scope="col">Cedula registro</th>
                    <th scope="col">Definición proyecto</th>
                    <th scope="col">Carta liberación</th>
				</tr>
			</thead>
			<tbody>
                @forelse($documentos['documentos'] as $respuestaD)
                    <tr>
                        <th scope="row"></th>
                        
                            <th>{{ $respuestaD->name }}</th>
                            <th>{{ $respuestaD->email}}</th>
                            <th>
                                @if ($respuestaD->id_c_aceptacion)
                                    
                                @endif
                            </th>
                            <th>
                                @if($respuestaD->id_c_registro)
                                    <form method="post" action="{{ route('ver_cd_estancia_f03_admin.index',[$respuestaD->id_c_registro, $respuestaD->nombre_c_r]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary btnEliminar" >Ver</button>
                                    </form>	
                                @endif
                            </th>
                            <th>
                                 @if ($respuestaD->id_d_proyecto)
                                    
                                @endif
                            </th>
                            <th>
                                @if ($respuestaD->id_c_liberacion)
                                    
                                @endif
                            </th>
                        
                    </tr>
				@empty
                @endforelse

				
			</tbody>
		</table>

			
			
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