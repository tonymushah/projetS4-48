create database projet48;
\c projet48;

create table user(
    id serial PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    poids float,
    taille float,
    image text 
);
