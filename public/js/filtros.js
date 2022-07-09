// Datos de los divs
var carga_horaria = document.getElementsByClassName("carga-horaria");
var constancia_derecho = document.getElementsByClassName("constancia-derecho");
var carta_responsiva = document.getElementsByClassName("carta-responsiva");
var f01 = document.getElementsByClassName("f01");
var f02 = document.getElementsByClassName("f02");
var f03 = document.getElementsByClassName("f03");
var f04 = document.getElementsByClassName("f04");
var f05 = document.getElementsByClassName("f05");


function mostrarFiltros(){
	var valor = document.getElementById("filtros").value;

	//DESACTIVAMOS TODOS LOS DIV PARA ACTIVAR SOLO LO NECESARIO
	if(valor !== 1){
		for(let i = 0; i < carga_horaria.length; i++){
			carga_horaria[i].style.display = "none";
		}
		for(let i = 0; i < constancia_derecho.length; i++){
			constancia_derecho[i].style.display = 'none';
		}
		for(let i = 0; i < carta_responsiva.length; i++){
			carta_responsiva[i].style.display = 'none';
		}
		for(let i = 0; i < f01.length; i++){
			f01[i].style.display = 'none';
		}
		for(let i = 0; i < f02.length; i++){
			f02[i].style.display = 'none';
		}
		for(let i = 0; i < f03.length; i++){
			f03[i].style.display = 'none';
		}
		for(let i = 0; i < f04.length; i++){
			f04[i].style.display = 'none';
		}
		for(let i = 0; i < f05.length; i++){
			f05[i].style.display = 'none';
		}
	}
	//
	verFiltros(valor);
	
}

function verFiltros(value){

	//ACTIVAMOS TODO SI SELECCIONA QUE NO QUIERE NINGUN FILTRO
	if(value == 1){
		for(let i = 0; i < carga_horaria.length; i++){
			carga_horaria[i].style.display = "block";
		}
		for(let i = 0; i < constancia_derecho.length; i++){
			constancia_derecho[i].style.display = 'block';
		}
		for(let i = 0; i < carta_responsiva.length; i++){
			carta_responsiva[i].style.display = 'block';
		}
		for(let i = 0; i < f01.length; i++){
			f01[i].style.display = 'block';
		}
		for(let i = 0; i < f02.length; i++){
			f02[i].style.display = 'block';
		}
		for(let i = 0; i < f03.length; i++){
			f03[i].style.display = 'block';
		}
		for(let i = 0; i < f04.length; i++){
			f04[i].style.display = 'block';
		}
		for(let i = 0; i < f05.length; i++){
			f05[i].style.display = 'block';
		}
	}

	//CARGA HORARIA
	if(value == 2){
		for(let i = 0; i < carga_horaria.length; i++){
			carga_horaria[i].style.display = "block";
		}	
	}

	// CONSTANCIA DE DERECHO
	if(value == 3){
		for(let i = 0; i < constancia_derecho.length; i++){
			constancia_derecho[i].style.display = 'block';
		}
	}

	// CARTA RESPONSIVA
	if(value == 4){
		for(let i = 0; i < carta_responsiva.length; i++){
			carta_responsiva[i].style.display = 'block';
		}
	}

	// F01
	if(value == 5){
		for(let i = 0; i < f01.length; i++){
			f01[i].style.display = 'block';
		}
	}

	// F02
	if(value == 6){
		for(let i = 0; i < f02.length; i++){
			f02[i].style.display = 'block';
		}
	}

	//F03
	if(value == 7){
		for(let i = 0; i < f03.length; i++){
			f03[i].style.display = 'block';
		}	
	}

	//F04
	if(value == 8){
		for(let i = 0; i < f04.length; i++){
			f04[i].style.display = 'block';
		}	
	}

	//F05
	if(value == 9){
		for(let i = 0; i < f05.length; i++){
			f05[i].style.display = 'block';
		}
	}
}