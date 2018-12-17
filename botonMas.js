if(typeUser=="ProductOwner") {
	inputsNombreProyecto();
}

function inputsNombreProyecto(){
	var elementopadre = document.getElementById("ultimoDiv");
	var inputNombre = document.createElement("input");
	var inputBoton	= document.createElement("input");
	

	inputBoton.setAttribute("type", "image");
	inputBoton.setAttribute("src", "img/añadir.png");
	inputBoton.setAttribute("width", "25");
	inputBoton.setAttribute("height", "25");
	
	inputBoton.addEventListener("click",añadirEspecificacion);
	inputNombre.setAttribute("name","nombreProyecto");

	insertarDespuesde(elementopadre,inputNombre);
	insertarDespuesde(inputNombre,inputBoton);
		
}




function añadirEspecificacion(){
	var elementopadre = document.getElementById("divEspe");
	var creardivnuevo = document.createElement('div');
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