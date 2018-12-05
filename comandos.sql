--USUARIOS

INSERT INTO `users`(`id_user`, `user`, `password`, `rol`, `name`, `last_name`, `mail`, `phone_number`) VALUES (1,"lzabala",SHA2("lzabala123",512),"ScrumMaster","Leandro","Zabala","lzabala@xtec.cat",656788453);

INSERT INTO `users`(`id_user`, `user`, `password`, `rol`, `name`, `last_name`, `mail`, `phone_number`) VALUES (LAST_INSERT_ID(),"emieza",SHA2("emieza123",512),"ProductOwner","Enric","Mieza","emieza@xtec.cat",563221789);

INSERT INTO `users`(`id_user`, `user`, `password`, `rol`, `name`, `last_name`, `mail`, `phone_number`) VALUES (LAST_INSERT_ID(),"ksedano",SHA2("kevin123",512),"Developer","Kevin","Sedano","kevinsedanosmx@gmail.com",617183420);

INSERT INTO `users`(`id_user`, `user`, `password`, `rol`, `name`, `last_name`, `mail`, `phone_number`) VALUES (LAST_INSERT_ID(),"xusbcn",SHA2("xus123",512),"Developer","Xus","Diamante","xusbcndo@gmail.com",625334321);

--PROYECTOS POR USUARIOS

INSERT INTO `proj_users`(`id_proj_user`, `user`, `cod_project`, `name_proj`) VALUES (1,"lzabala",10,"¿Quién es Quién?");

INSERT INTO `proj_users`(`id_proj_user`, `user`, `cod_project`, `name_proj`) VALUES (LAST_INSERT_ID(),"emieza",10,"¿Quién es Quién?");

INSERT INTO `proj_users`(`id_proj_user`, `user`, `cod_project`, `name_proj`) VALUES (LAST_INSERT_ID(),"ksedano",10,"¿Quién es Quién?");

INSERT INTO `proj_users`(`id_proj_user`, `user`, `cod_project`, `name_proj`) VALUES (LAST_INSERT_ID(),"xusbcn",20,"Gestor de Proyectos SCRUM");

--PROYECTOS

INSERT INTO `project`(`id_project`, `cod_project`, `name_project`, `description`, `product_owner`, `scrum_master`, `date_start`, `date_finish`, `comments`, `budget`) VALUES (1,10,"¿Quién es Quién?","¿Quien será? Adivina la carta.","emieza","lzabala",SYSDATE(),SYSDATE(),"",20000);

INSERT INTO `project`(`id_project`, `cod_project`, `name_project`, `description`, `product_owner`, `scrum_master`, `date_start`, `date_finish`, `comments`, `budget`) VALUES (LAST_INSERT_ID(),20,"Gestor de Proyectos SCRUM","¿SCRUM? ¿Eso se come?","emieza","lzabala",SYSDATE(),SYSDATE(),"",30000);

--ESPECIFICACIONES

INSERT INTO `specifications`(`id_specification`, `cod_specification`, `cod_project`, `name_specification`, `description`, `comments`, `hours`, `date`, `completed`) VALUES (1,1,10,"Caracteristicas personaje","Configuraremos las caracteristicas de los personajes en el archivo config.txt","",1,SYSDATE(),false);

INSERT INTO `specifications`(`id_specification`, `cod_specification`, `cod_project`, `name_specification`, `description`, `comments`, `hours`, `date`, `completed`) VALUES (LAST_INSERT_ID(),2,10,"Una caracteristica por linea","Las caracteristicas tienen que estar divididas en lineas, una caracteristica por linea.","",2,SYSDATE(),false);

INSERT INTO `specifications`(`id_specification`, `cod_specification`, `cod_project`, `name_specification`, `description`, `comments`, `hours`, `date`, `completed`) VALUES (LAST_INSERT_ID(),3,10,"Archivo configuración images.txt","Dispondremos de un segundo archivo de configuración, contendrá las imagenes con sus caracteristicas.","",3,SYSDATE(),false);

INSERT INTO `specifications`(`id_specification`, `cod_specification`, `cod_project`, `name_specification`, `description`, `comments`, `hours`, `date`, `completed`) VALUES (LAST_INSERT_ID(),1,20,"Diseño y Analisis","Diseño y Analisis de la Base de Datos.","",6,SYSDATE(),false);

INSERT INTO `specifications`(`id_specification`, `cod_specification`, `cod_project`, `name_specification`, `description`, `comments`, `hours`, `date`, `completed`) VALUES (LAST_INSERT_ID(),2,20,"Usuarios y Permisos","Habrán distintos permisos de usuarios: ScrumMaster, ProductOwner y Developer.","",4,SYSDATE(),false);

INSERT INTO `specifications`(`id_specification`, `cod_specification`, `cod_project`, `name_specification`, `description`, `comments`, `hours`, `date`, `completed`) VALUES (LAST_INSERT_ID(),3,20,"Pagina de Login","Habrá una pagina de login única para todos los usuarios.","",1,SYSDATE(),false);
