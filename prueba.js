//funciones
var checkboxMarcado = false;
var nombreFormularioRelleno = false;
var comboProductOwner = false;
var comboScrumMaster = false;





function crearFormulario(){

	


	//marco habilitado
	var elementDiv = document.getElementById("div_formulario");
    elementDiv.hidden = false;

	//h1 formulario
	//crea el h1
	var titulo_formulario = document.createElement("h1");
	//pone los atributos del h1
	titulo_formulario.setAttribute("id", "titulo");
	//es el texto del h1
	var texto_formulario = document.createTextNode("Formulario");
	//inserta el texto en el h1
	titulo_formulario.appendChild(texto_formulario);
	//hace un insert al principio del todo
	document.getElementById("div_formulario").insertBefore(titulo_formulario, document.getElementById("div_formulario").firstChild);
	//inserta un salto de linea
	//document.getElementById("div_formulario").appendChild(document.createElement("br"));

	//label nombre
	var label_nombre = document.createElement("label");
	label_nombre.setAttribute("for", "nombre");
	var texto_formulario = document.createTextNode("Nombre");
	label_nombre.appendChild(texto_formulario);
	document.getElementById("formulario_izquierda").appendChild(label_nombre);

	//text nombre
	var label_nombre = document.createElement("input");
	label_nombre.setAttribute("id", "nombre_proyecto");
	label_nombre.setAttribute("type", "text");
	label_nombre.setAttribute("name", "nombre");
	label_nombre.setAttribute("required", "true");
	document.getElementById("formulario_izquierda").appendChild(label_nombre);
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));

	//label descripcion
	var label_descripcion = document.createElement("label");
	label_descripcion.setAttribute("for", "descripcion");
	label_descripcion.setAttribute("name", "descripcion_proj");
	var texto_formulario = document.createTextNode("Descripcion");
	label_descripcion.appendChild(texto_formulario);
	document.getElementById("formulario_izquierda").appendChild(label_descripcion);

	//text descripcion
	var label_descripcion = document.createElement("textarea");
	label_descripcion.setAttribute("name", "descripcion");
	label_descripcion.setAttribute("cols", "30");
	document.getElementById("formulario_izquierda").appendChild(label_descripcion);
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));

	//label descripcion
	var label_number = document.createElement("label");
	var texto_number = document.createTextNode("Codigo de proyecto");
	label_number.appendChild(texto_number);
	document.getElementById("formulario_izquierda").appendChild(label_number);
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));
	

	//text descripcion
	var numero_number = document.createElement("input");
	numero_number.setAttribute("id", "codigo_proyecto");
	numero_number.setAttribute("type","number");
	numero_number.setAttribute("name", "numero_proyecto");
	document.getElementById("formulario_izquierda").appendChild(numero_number);

	//combobox scrum
	
	var select_combobox_scrum = document.createElement("select");
	var opcion1_combobox_scrum = document.createElement("option");
	var opcion2_combobox_scrum = document.createElement("option");
	var texto_opcion1 = document.createTextNode("Scrum");
	var texto_opcion2 = document.createTextNode("opcion2");
	opcion1_combobox_scrum.appendChild(texto_opcion1);
	opcion2_combobox_scrum.appendChild(texto_opcion2);
	select_combobox_scrum.appendChild(opcion1_combobox_scrum);
	select_combobox_scrum.appendChild(opcion2_combobox_scrum);
	document.getElementById("formulario_derecha").appendChild(select_combobox_scrum);
	document.getElementById("formulario_derecha").appendChild(document.createElement("br"));
	

	//combobox product_owner

	var select_combobox_product = document.createElement("select");
	var opcion1_combobox_product = document.createElement("option");
	var opcion2_combobox_product = document.createElement("option");
	var texto_opcion1 = document.createTextNode("product");
	var texto_opcion2 = document.createTextNode("opcion2");
	opcion1_combobox_product.appendChild(texto_opcion1);
	opcion2_combobox_product.appendChild(texto_opcion2);
	select_combobox_product.appendChild(opcion1_combobox_product);
	select_combobox_product.appendChild(opcion2_combobox_product);
	document.getElementById("formulario_derecha").appendChild(select_combobox_product);
	document.getElementById("formulario_derecha").appendChild(document.createElement("br"));
	document.getElementById("formulario_derecha").appendChild(document.createElement("br"));

	//radio button 1
	var radio_button1 = document.createElement("input");
	radio_button1.setAttribute("type","radio");
	radio_button1.setAttribute("name","developer");
	document.getElementById("formulario_derecha").appendChild(radio_button1);
	var radio_label1 = document.createElement("label");
	var texto_label = document.createTextNode("developer1")
	radio_label1.appendChild(texto_label);
	document.getElementById("formulario_derecha").appendChild(radio_label1);
	document.getElementById("formulario_derecha").appendChild(document.createElement("br"));

	//radio button 2
	var radio_button2 = document.createElement("input");
	radio_button2.setAttribute("type","radio");
	radio_button2.setAttribute("name","developer");
	document.getElementById("formulario_derecha").appendChild(radio_button2);
	var radio_label2 = document.createElement("label");
	var texto_label = document.createTextNode("developer2")
	radio_label2.appendChild(texto_label);
	document.getElementById("formulario_derecha").appendChild(radio_label2);

	//boton crear
	var crear_boton = document.createElement("input");
	crear_boton.setAttribute("onclick", "comprobacionesFormulario();");
	crear_boton.setAttribute("type","button");
	crear_boton.setAttribute("name","crear");
	crear_boton.setAttribute("value","Crear");
	crear_boton.setAttribute("id","boton_crear_dentro");
	document.getElementById("formulario").appendChild(crear_boton);

	mostrarBoton();



	document.getElementById('botonCrearProyecto').style.display="none";
	document.getElementById('botonCrearProyecto').classList.add("deshabilitar");

	var reload_boton=document.createElement("input");
	reload_boton.setAttribute("type","button");
	reload_boton.setAttribute("onclick", "location.reload();");
	reload_boton.setAttribute("value","Try Again");
	reload_boton.setAttribute("id","boton_reload");
	document.getElementById("formulario").appendChild(reload_boton);
}





function comprobacionesFormulario(){
	comprobarNombreFormularioRelleno();
	comprobarComboboxSeleccionadoMaster();
	comprobarComboboxSeleccionadoOwner();
	comprobarCheck();
	respuestaFormulario();
	//document.getElementById('botonCrearProyecto').disabled=false;
	//document.getElementById('botonCrearProyecto').classList.remove("deshabilitar");

}
function comprobarCheck() {
	for (i = 0; i < document.getElementsByClassName("checkboxes").length; i++) {
		if( document.getElementsByClassName("checkboxes")[i].checked ) {
		 	checkboxMarcado = true;
		 	return true;
		}
		else{
			checkboxMarcado = false;
		}
	}
}
function comprobarNombreFormularioRelleno(){
	nombre_proyecto = document.getElementById("nombre_proyecto");
	if (document.getElementById("nombre_proyecto").value == "") {
		nombreFormularioRelleno = false;
	}
	else{
		nombreFormularioRelleno = true;
	}
}
function comprobarComboboxSeleccionadoMaster(){
	var lista_scrum_master = document.getElementById("campo_scrum_master");
    if(lista_scrum_master.selectedIndex !=0 )
    	comboScrumMaster = true;
    else{
    	comboScrumMaster = false;
    }
}
function comprobarComboboxSeleccionadoOwner(){
	var lista_product_owner = document.getElementById("campo_product_owner");
    if(lista_product_owner.selectedIndex !=0 )
    	comboProductOwner = true;
    else{
    	comboProductOwner = false;
    }
}
function respuestaFormulario(){
	if (nombreFormularioRelleno == false) {
		erroresFormulario();
		document.getElementById('boton_crear_dentro').style.display="none";
		document.getElementById('boton_reload').style.display="block";
	}
	else if (comboScrumMaster == false) {
		erroresFormulario();
	}
	else if (comboProductOwner == false) {
		erroresFormulario();
	}
	else if (checkboxMarcado == false) {
		erroresFormulario();
	}
	else if (checkboxMarcado == true && nombreFormularioRelleno == true 
	&& comboScrumMaster == true && comboProductOwner == true) {
		document.getElementById("formulario").submit();
	}
}

document.addEventListener('DOMContentLoaded', function(){
	var crear_boton_creacion = document.createElement("input");
	crear_boton_creacion.setAttribute("onclick", "crearFormulario()");
	crear_boton_creacion.setAttribute("type","button");
	crear_boton_creacion.setAttribute("name","crearProyecto");
	crear_boton_creacion.setAttribute("value","Crear proyecto nuevo");
	crear_boton_creacion.setAttribute("id","botonCrearProyecto");
	document.getElementById("id_boton").appendChild(crear_boton_creacion);

});



function erroresFormulario(){
	var imageErrorfortmulario=document.createElement('IMG');
 	imageErrorfortmulario.setAttribute("src", "css/images/cancelar.png");
 	imageErrorfortmulario.setAttribute("width", "20px");
	var parrafoerror=document.createElement('p');
	var textoerror=document.createTextNode("No pueden existir campos vacios");
	parrafoerror.appendChild(textoerror);
	document.getElementById("error_proyecto").appendChild(parrafoerror);
  	document.getElementById("error_proyecto").style.display="block";
}


