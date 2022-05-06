<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Observaciones</title>

   
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
    @include('plantilla/admin/sideBar')
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		@include('plantilla/admin/navBar')
        <div class="container p-3">
			<div class="page-header">
			  <h2 class="text-titles">Observaciones <small>(f-01_Carta Aceptación Estadía)</small></h2>
			</div>
		</div>
        <div class="container">
				<form action="{{ route('guardarObservaciones_estadia_f01_admin.index',[$datos['id_c']]) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-12 p-0">
                                <a href="{{ route('documentoEstadiaAdmin.index') }}" class="btn "  ><i class="zmdi zmdi-arrow-left"></i></a>
                        </div>
                        <div class="col-12 p-1">
                            <textarea class="form-control" id="observaciones" rows="3" name="observaciones"></textarea>
                        </div>
                        <div class="col-12 p-1">
                            <button class="btn btn-dark btn-lg btn-block" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>											
          
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