/*
document.addEventListener('DOMContentLoaded', function(){
	var crearFormulario = document.getElementsByTagName("input")[0];
	crearFormulario.addEventListener("click",mostrarFormularioCreacionUsuario);
});

*/
function crearFormulario(){
	//marco habilitado
	var elementDiv = document.getElementById("formulario");
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
	document.getElementById("formulario").insertBefore(titulo_formulario, document.getElementById("formulario").firstChild);
	//inserta un salto de linea
	//document.getElementById("formulario").appendChild(document.createElement("br"));

	//label nombre
	var label_nombre = document.createElement("label");
	label_nombre.setAttribute("for", "nombre");
	var texto_formulario = document.createTextNode("Nombre");
	label_nombre.appendChild(texto_formulario);
	document.getElementById("formulario_izquierda").appendChild(label_nombre);

	//text nombre
	var label_nombre = document.createElement("input");
	label_nombre.setAttribute("type", "text");
	label_nombre.setAttribute("name", "nombre");
	document.getElementById("formulario_izquierda").appendChild(label_nombre);
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));
	document.getElementById("formulario_izquierda").appendChild(document.createElement("br"));

	//label descripcion
	var label_descripcion = document.createElement("label");
	label_descripcion.setAttribute("for", "descripcion");
	var texto_formulario = document.createTextNode("Descripcion");
	label_descripcion.appendChild(texto_formulario);
	document.getElementById("formulario_izquierda").appendChild(label_descripcion);

	//text descripcion
	var label_descripcion = document.createElement("textarea");
	label_descripcion.setAttribute("name", "descripcion");
	label_descripcion.setAttribute("cols", "30");
	document.getElementById("formulario_izquierda").appendChild(label_descripcion);

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

	//combobox project
	var select_combobox_project = document.createElement("select");
	var opcion1_combobox_project = document.createElement("option");
	var opcion2_combobox_project = document.createElement("option");
	var texto_opcion1 = document.createTextNode("Project");
	var texto_opcion2 = document.createTextNode("opcion2");
	opcion1_combobox_project.appendChild(texto_opcion1);
	opcion2_combobox_project.appendChild(texto_opcion2);
	select_combobox_project.appendChild(opcion1_combobox_project);
	select_combobox_project.appendChild(opcion2_combobox_project);
	document.getElementById("formulario_derecha").appendChild(select_combobox_project);
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
	crear_boton.setAttribute("type","button");
	crear_boton.setAttribute("name","crear");
	crear_boton.setAttribute("value","Crear");
	crear_boton.setAttribute("id","boton_crear_dentro");
	document.getElementById("formulario").appendChild(crear_boton);
}