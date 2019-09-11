create database myapplication;
use myapplication;
create table users(
     id int auto_increment primary key,
     username varchar(50) not null,
     password int ,
     email varchar(50) not null,
     phone_number varchar(10) not null);
