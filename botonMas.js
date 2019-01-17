
if(typeUser=="ProductOwner") {
	inputsNombreProyecto();
}else if(typeUser=="ScrumMaster"){
	DragAndDrop();
}


function inputsNombreProyecto(){
	// cogemos el div padre
	var elementopadre = document.getElementById("ultimoDiv");
	// creamos un input para introducir el nombre de la tarea
	var inputNombre = document.createElement("input");
	// creamos un input para el boton añadir tarea
	var inputBoton	= document.createElement("input");
	
	// le agregamos atributos al input de añadir (imagen,tamaño)
	inputBoton.setAttribute("type", "image");
	inputBoton.setAttribute("src", "img/añadir.png");
	inputBoton.setAttribute("width", "25");
	inputBoton.setAttribute("height", "25");

	// le añadimos un evendo click que llama a la fucnion añadirEspecificacion
	inputBoton.addEventListener("click",añadirEspecificacion);
	inputNombre.setAttribute("name","nombreEspe");

	//insertamos el input del nombre despues del div padre
	insertarDespuesde(elementopadre,inputNombre);
	//insertamos el div de añadir despues del input de nombre de tarea
	insertarDespuesde(inputNombre,inputBoton);
		
}

function añadirEspecificacion(){
	//cogemos el div de especificaciones
	var elementopadre = document.getElementById("divEspe");
	//creamos un div nuevo
	var creardivnuevo = document.createElement('div');
	// le añadimos estilo al div que acabamos de crear
	creardivnuevo.setAttribute("style", "margin-bottom: 10px;border: solid yellowgreen");
	// cogemos el input del nombre del proyecto
	var inputnombreproyecto = document.getElementsByName("nombreEspe")[0].value;
	// añadimos el nombre de la tarea
	var añadirtextoespecificacion = document.createTextNode(inputnombreproyecto);
	// añadimos el texto al div 
	creardivnuevo.appendChild(añadirtextoespecificacion);
	// añadimos la funcion para crear el boton subir
	creardivnuevo.appendChild(botonSubir());
	// añadimos la funcion para crear el boton bajar
	creardivnuevo.appendChild(botonBajar());
	// añadimos la funcion para crear el boton eliminar
	creardivnuevo.appendChild(botonEliminar());
	elementopadre.appendChild(creardivnuevo);

}



function añadirBotones(element){
	element.appendChild(botonSubir());
	element.appendChild(botonBajar());
	element.appendChild(botonEliminar());


}


function insertarDespuesde(e,i){
	if(e.nextSibling){
		e.parentNode.insertBefore(i,e.nextSibling);

	} else {
		e.parentNode.appendChild(i);
	}
}


function botonSubir(){
	//creamos el un elemento img
	var imgsubir = document.createElement('img');
	// ponemos atributo src
	imgsubir.setAttribute("src", "img/arriba.png");
	// añadimos estilo 
	imgsubir.setAttribute("style","float:right");
	//añadimos el tamaño
	imgsubir.setAttribute("width", "25");
	imgsubir.setAttribute("height", "25");
	// añadimos un onclick pasandole el elemento
	imgsubir.setAttribute('onclick', 'subir(this)');
	//devolvemos la imagen
	return imgsubir;
}
function botonBajar(){
	var imgbajar = document.createElement('img');
	imgbajar.setAttribute("src", "img/bajar.png");
	imgbajar.setAttribute("style","float:right");
	imgbajar.setAttribute("width", "25");
	imgbajar.setAttribute("height", "25");
	imgbajar.setAttribute('onclick', 'bajar(this)');
	return imgbajar;
}
function botonEliminar(){
	var imgeliminar = document.createElement('img');
	imgeliminar.setAttribute("src", "img/eliminar.png");
	imgeliminar.setAttribute("style","float:right");
	imgeliminar.setAttribute("width", "25");
	imgeliminar.setAttribute("height", "25");
	imgeliminar.setAttribute('onclick', 'eliminar(this)');
	return imgeliminar;
}

function subir(element){
	s
	var elementAnterior = element.parentNode.previousSibling;
	
	var clonado = element.parentNode.cloneNode(true);
	var elementRaiz= element.parentNode.parentNode;

	
	var elementoPadre = element.parentNode;

	elementoPadre.parentNode.removeChild(elementoPadre);
	elementRaiz.insertBefore(clonado, elementAnterior);
}
function bajar(element){
	var elementSiguiente = element.parentNode.nextSibling.nextSibling;
	
	var clonado = element.parentNode.cloneNode(true);

	var elementRaiz = element.parentNode.parentNode;

	var elementoPadre = element.parentNode;
	
	elementoPadre.parentNode.removeChild(elementoPadre);	
	elementRaiz.insertBefore(clonado, elementSiguiente);
}
function eliminar(element){
	var elementoPadre = element.parentNode;
	elementoPadre.parentNode.removeChild(elementoPadre);
}




function hoverCandado(element){
	//encontramos el elemento padre del elemento que nos pasan
	var elementoPadreDiv = element.parentNode;
	//comprobamos que el elmento padre div tenga el fondo negro
	if (elementoPadreDiv.style.backgroundColor=="black") {
		// llamamos a la funcion candado abierto pasando el elemento recibido 
		candadoAbierto(element);
	}

}




function candadoCerrado(element){
	element.setAttribute("src","img/cerrado.png");

}



function candadoAbierto(element){
	element.setAttribute("src","img/abierto.png");	

}

function DragAndDrop(){
	// guardamos los divs de los sprint
	var divSprint = document.getElementsByClassName("acordeon");
	//iteramos sobre el array de divs
	for (var i = 0; i < divSprint.length; i++) {
		//comprobamos que si el fondo es negro
		if (divSprint[i].style.backgroundColor=="black") {
			//encontramos el elemento hermano del div que tiene el fondo negro
			var hermano = divSprint[i].nextSibling;
			//le añadimos un id al hermano para que puede recibir tareas mediante el  drag and drop
			hermano.setAttribute("id","cuadro2");

		}
	}

}