CREATE DATABASE eProject CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci';
USE eProject;

CREATE TABLE category (
    category_id int primary key auto_increment ,
    name varchar(255) not null
);

create table product (
    id_product int primary key auto_increment ,
    name_pro varchar(255) not null ,
    price int not null ,
    quantity int not null ,
    content text not null ,
    status boolean not null ,
    category_id int not null
);

create table image (
    id int primary key auto_increment,
    id_product int not null ,
    image text not null
);

create table cart (
    id int primary key auto_increment,
    id_product int not null ,
    transaction_id int not null ,
    quantity_ord int not null ,
    total_price int not null
);

create table transaction (
    transaction_id int primary key not null ,
    username_id int not null ,
    order_date date not null ,
    total int not null ,
    payment varchar(50) not null
);

create table account (
    username_id int primary key not null ,
    username varchar(50) not null ,
    password text not null ,
    email text not null ,
    phone int not null ,
    roles varchar(10)
);


