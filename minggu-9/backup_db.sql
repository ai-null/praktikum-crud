create table web_crud;

create table user(
    id_user int not null primary key auto_increment,
    username varchar(30) not null,
    password varchar(30) not null
);

create table member(
    id_member int not null primary key auto_increment,
    first_name varchar(30) not null,
    last_name varchar(30) not null,
    kota varchar(30) not null,
    provinsi varchar(30) not null,
    kode_pos varchar(30) not null
);