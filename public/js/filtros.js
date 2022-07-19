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

// Para el checkbox

	
var checkbox = document.getElementById('checkbox');
var sin_hijos = document.getElementsByClassName('saber-contenido');

checkbox.addEventListener("change", validaCheckbox, false);
function validaCheckbox(){
	
var valor = document.getElementById("filtros").value;
	var checked = checkbox.checked;

		if(checked && valor == 2){
			// alert('checkbox1 esta seleccionado');
			var data = document.getElementsByClassName("saber-carga");
			for(let i = 0; i <data.length; i++){
				if (data[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}else{
			var data = document.getElementsByClassName("saber-carga");
			for(let i = 0; i <data.length; i++){
				if (data[i].childNodes.length > 1) {
				// console.log(data[i]);
				}else{
					let datapadre1 = data[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}
		}

		////

		if(checked && valor == 3){
			// alert('checkbox1 esta seleccionado');
			var data3 = document.getElementsByClassName("saber-constancia");
			for(let i = 0; i <data3.length; i++){
				if (data3[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data3[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}
		if(checked && valor == 1){



			// alert('checkbox1 esta seleccionado');
			var data1 = document.getElementsByClassName("saber-carga");
			for(let i = 0; i <data1.length; i++){
				if (data1[i].childNodes.length > 1) {
					
				}else{
					let datapadre1 = data1[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}
			var data2 = document.getElementsByClassName("saber-constancia");
			for(let i = 0; i <data2.length; i++){
				if (data2[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data2[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}

			var data3 = document.getElementsByClassName("saber-constancia");
			for(let i = 0; i <data3.length; i++){
				if (data3[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data3[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}

			var data4 = document.getElementsByClassName("saber-carta");
			for(let i = 0; i <data4.length; i++){
				if (data4[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data4[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}

			var data5 = document.getElementsByClassName("saber-f01");
			for(let i = 0; i <data5.length; i++){
				if (data5[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data5[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}

			var data6 = document.getElementsByClassName("saber-f02");
			for(let i = 0; i <data6.length; i++){
				if (data6[i].childNodes.length > 1) {
					
				}else{
					let datapadre1 = data6[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}

			var data7 = document.getElementsByClassName("saber-f03");
			for(let i = 0; i <data7.length; i++){
				if (data7[i].childNodes.length > 1) {
			    
				}else{
					let datapadre1 = data7[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}

			var data8 = document.getElementsByClassName("saber-f04");
			for(let i = 0; i <data8.length; i++){
				if (data8[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data8[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}

			var data9 = document.getElementsByClassName("saber-f05");
			for(let i = 0; i <data9.length; i++){
				if (data9[i].childNodes.length > 1) {
					
				}else{
					let datapadre1 = data9[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				}
			}

			
			for(let i = 0; i < data5.length ; i++){

			if( data6[i].childNodes.length <= 1 && data1[i].childNodes.length <= 1 && data2[i].childNodes.length <= 1 
				&& data3[i].childNodes.length <= 1 && data4[i].childNodes.length <= 1 
				&& data5[i].childNodes.length <= 1 && data7[i].childNodes.length <= 1  && data8[i].childNodes.length <= 1 
				&& data9[i].childNodes.length <= 1){
					
					let datapadre1 = data5[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
					console.log("El no tiene hijos",datapadre3);
				}
			}
		}

		if(checked && valor == 4){
			// alert('checkbox1 esta seleccionado');
			var data4 = document.getElementsByClassName("saber-carta");
			for(let i = 0; i <data4.length; i++){
				if (data4[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data4[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}
		if(checked && valor == 5){
			// alert('checkbox1 esta seleccionado');
			var data5 = document.getElementsByClassName("saber-f01");
			for(let i = 0; i <data5.length; i++){
				if (data5[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data5[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}
		if(checked == false && valor == 5){
			var data5 = document.getElementsByClassName("saber-f01");
			for(let i = 0; i <data5.length; i++){
				
					let datapadre1 = data5[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				
			}
		}

		if(checked && valor == 6){
			// alert('checkbox1 esta seleccionado');
			var data6 = document.getElementsByClassName("saber-f02");
			for(let i = 0; i <data6.length; i++){
				if (data6[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data6[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}
		if(checked == false && valor == 6){
			var data6 = document.getElementsByClassName("saber-f02");
			for(let i = 0; i <data6.length; i++){
				
					let datapadre1 = data6[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				
			}
		}

		if(checked && valor == 7){
			// alert('checkbox1 esta seleccionado');
			var data7 = document.getElementsByClassName("saber-f03");
			for(let i = 0; i <data7.length; i++){
				if (data7[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data7[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}
		if(checked == false && valor == 7){
			var data7 = document.getElementsByClassName("saber-f03");
			for(let i = 0; i <data7.length; i++){
				
					let datapadre1 = data7[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				
			}
		}

		if(checked && valor == 8){
			// alert('checkbox1 esta seleccionado');
			var data8 = document.getElementsByClassName("saber-f04");
			for(let i = 0; i <data8.length; i++){
				if (data8[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data8[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}
		if(checked == false && valor == 8){
			var data8 = document.getElementsByClassName("saber-f04");
			for(let i = 0; i <data8.length; i++){
				
					let datapadre1 = data8[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				
			}
		}

		if(checked && valor == 9){
			// alert('checkbox1 esta seleccionado');
			var data9 = document.getElementsByClassName("saber-f05");
			for(let i = 0; i <data9.length; i++){
				if (data9[i].childNodes.length > 1) {
			  //   console.log(data[i]);
				}else{
					let datapadre1 = data9[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'none';
				}
			}
		}
		if(checked == false && valor == 9){
			var data9 = document.getElementsByClassName("saber-f05");
			for(let i = 0; i <data9.length; i++){
				
					let datapadre1 = data9[i].parentNode;
					let datapadre2 = datapadre1.parentNode;
					let datapadre3 = datapadre2.parentNode;
					datapadre3.style.display = 'block';
				
			}
		}
		
}



