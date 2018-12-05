create table users
(
    id_user int not null AUTO_INCREMENT,
    user varchar(20) not null,
    password varchar(512) not null,
    rol varchar(20) not null,
    name varchar(20) not null,
    last_name varchar(20),
    mail varchar(20) not null,
    phone_number int not null,
    PRIMARY KEY (id_user),
    UNIQUE KEY user (user),
    UNIQUE KEY mail (mail),
    UNIQUE KEY phone_number (phone_number)
);
create table proj_users
(
    id_proj_user int not null AUTO_INCREMENT,
    user varchar(20) not null,
    cod_project int not null,
    name_proj varchar(20),
    PRIMARY KEY (id_proj_user)
);
create table project
(
    id_project int not null AUTO_INCREMENT,
    cod_project int not null,
    name_project varchar(30) not null,
    description varchar(40) not null,
    product_owner varchar(20) not null,
    scrum_master varchar(20) not null,
    date_start date not null,
    date_finish date not null,
    comments varchar(40) not null,
    budget int not null,
    PRIMARY KEY (id_project)
);
create table sprints
(
    id_sprint int not null AUTO_INCREMENT,
    cod_project int not null,
    number_sprint int not null,
    name_sprint varchar(20) not null,
    date_start date not null,
    date_finish date not null,
    total_hours int not null,
    hours_left int not null,
    PRIMARY KEY (id_sprint)
);
create table specifications
(
    id_specification int not null AUTO_INCREMENT,
    cod_specification int not null,
    cod_project int not null,
    name_specification varchar(20) not null,
    description varchar(40) not null,
    comments varchar(40) not null,
    hours int not null,
    date date not null,
    completed boolean,
    PRIMARY KEY (id_specification)
);

alter table sprints
add constraint fk_cod_project_sprints
foreign key (cod_project) references specifications(cod_project);

alter table specifications
add constraint fk_cod_project_specifications
foreign key (cod_project) references project(cod_project);

alter table project
add constraint fk_cod_project_project
foreign key (cod_project) references proj_users(cod_project);

alter table proj_users
add constraint fk_user_proj_users
foreign key (user) references users(user);

alter table sprints
add constraint fk_cod_project_sprints_project
foreign key (cod_project) references project(cod_project);



/* por si acaso
alter table sprints
drop foreign key fk_cod_project_sprints

alter table specifications
drop foreign key fk_cod_project_specifications

alter table project
drop foreign key fk_cod_project_project

alter table proj_users
drop foreign key fk_user_proj_users
*/