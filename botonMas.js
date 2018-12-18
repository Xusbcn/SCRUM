


if(typeUser=="ProductOwner") {
	inputsNombreProyecto();
}

function inputsNombreProyecto(){
	var elementopadre = document.getElementById("ultimoDiv");
	var inputNombre = document.createElement("input");
	var inputBoton	= document.createElement("input");
	var inputEliminar = document.createElement("input");
	var inputBajar = document.createElement("input");
	var inputSubir = document.createElement("input");
	

	inputBoton.setAttribute("type", "image");
	inputBoton.setAttribute("src", "img/añadir.png");
	inputBoton.setAttribute("width", "25");
	inputBoton.setAttribute("height", "25");


	inputEliminar.setAttribute("type", "image");
	inputEliminar.setAttribute("src", "img/eliminar.png");
	inputEliminar.setAttribute("width", "25");
	inputEliminar.setAttribute("height", "25");


	inputBajar.setAttribute("type", "image");
	inputBajar.setAttribute("src", "img/bajar.png");
	inputBajar.setAttribute("width", "25");
	inputBajar.setAttribute("height", "25");

	inputSubir.setAttribute("type", "image");
	inputSubir.setAttribute("src", "img/arriba.png");
	inputSubir.setAttribute("width", "25");
	inputSubir.setAttribute("height", "25");




	
	inputBoton.addEventListener("click",añadirEspecificacion);
	//inputEliminar.addEventListener("click",elminarDiv);
	inputSubir.addEventListener("click",subirElemento);
	inputBajar.addEventListener("click",bajarElemento);
	inputNombre.setAttribute("name","nombreProyecto");

	insertarDespuesde(elementopadre,inputNombre);
	insertarDespuesde(inputNombre,inputSubir);
	insertarDespuesde(inputNombre,inputBajar);
	insertarDespuesde(inputNombre,inputEliminar);
	insertarDespuesde(inputNombre,inputBoton);
		
}



function añadirEspecificacion(){
	var elementopadre = document.getElementById("divEspe");
	var creardivnuevo = document.createElement('div');
	creardivnuevo.addEventListener("click",cambiarColor);
	var inputnombreproyecto = document.getElementsByTagName("input")[0].value;
	var añadirtextoespecificacion = document.createTextNode(inputnombreproyecto);
	creardivnuevo.appendChild(añadirtextoespecificacion);
	elementopadre.appendChild(creardivnuevo);


}


function insertarDespuesde(e,i){
	if(e.nextSibling){
		e.parentNode.insertBefore(i,e.nextSibling);

	} else {
		e.parentNode.appendChild(i);
	}
}

function cambiarColor(element){
	var arrayDivs = document.getElementsByTagName("div");
	for (var i = 0; i < arrayDivs.length; i++) {
		arrayDivs[i].style.color="black";
	}
	this.style.color = "red";
}


function elminarDiv(){
	var elementopadre = document.getElementById("divEspe");
	var arrayDivs = document.getElementsByTagName("div");
	for (var i = 0; i < arrayDivs.length; i++) {
		if (arrayDivs[i].style.color=="red") {
			elementopadre.removeChild(arrayDivs[i]);
		}
	}
}






function bajarElemento(){
	var arrayDivs = document.getElementsByTagName("div");
	var elementoPadre = document.getElementById("divEspe");
	for (var i = 0; i < arrayDivs.length; i++) {
		if (arrayDivs[i].style.color=="red") {
			var elementoHermano = arrayDivs[i].nextSibling;
			var clonarHermano = elementoHermano.cloneNode(true);
			clonarHermano.addEventListener("click",cambiarColor);
			elementoPadre.removeChild(elementoHermano);
			elementoPadre.insertBefore(clonarHermano,arrayDivs[i]);

			
		}
	}

}



function subirElemento(){
	var arrayDivs = document.getElementsByTagName("div");
	var elementoPadre = document.getElementById("divEspe");
	for (var i = 0; i < arrayDivs.length; i++) {
		if (arrayDivs[i].style.color=="red") {
			var elementoHermano = arrayDivs[i].previousSibling;
			var clonarHermano = elementoHermano.cloneNode(true);
			clonarHermano.addEventListener("click",cambiarColor);
			elementoPadre.removeChild(elementoHermano);
			elementoPadre.insertBefore(clonarHermano,arrayDivs[i]);

			
		}
	}

}