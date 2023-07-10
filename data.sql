CREATE DATABASE abinci;
\c abinci;

CREATE TABLE IF NOT EXISTS users(
    idUser serial primary key,
    nom VARCHAR(50),
    email VARCHAR(250),
    mdp VARCHAR(50),
    poids decimal,
    taille decimal,
    image VARCHAR(50),
    montant decimal
);

CREATE TABLE IF NOT EXISTS sakafo(
    idSakafo serial primary key,
    nom VARCHAR(50),
    images VARCHAR(50),
    type_ int
);

CREATE TABLE IF NOT EXISTS activite(
    idActivite serial primary key,
    nom VARCHAR(50),
    images VARCHAR(50),
    type_ int
);


CREATE TABLE IF NOT EXISTS detailsProgramme(
    idDetails serial primary key,
    nom VARCHAR(50),
    duree_jour int,
    type_ int,
    prix decimal
);

CREATE TABLE IF NOT EXISTS relation_dp_sakafo(
    idDpsakafo serial primary key,
    idDetails int,
    idSakafo int,
    foreign key (idDetails) references detailsProgramme (idDetails),
    foreign key (idSakafo) references sakafo (idSakafo)
);

CREATE TABLE IF NOT EXISTS relation_dp_activite(
    idDpActivite serial primary key,
    idDetails int,
    idActivite int,
    foreign key (idDetails) references detailsProgramme (idDetails),
    foreign key (idActivite) references activite (idActivite)
);

CREATE TABLE IF NOT EXISTS programme(
    idProgramme serial primary key,
    debut Date,
    fin Date,
    idUser int,
    idDetails int,
    foreign key (idUser) references users (idUser),
    foreign key (idDetails) references detailsProgramme (idDetails)
);

CREATE TABLE IF NOT EXISTS code(
    idCode int primary key,
    montant decimal,
    status_ int
);

CREATE TABLE IF NOT EXISTS liste_attente(
    idListe serial primary key,
    idCode int,
    idUser int,
    validation_ int,
    foreign key (idCode) references code (idCode),
    foreign key (idUser) references users (idUser)
);


INSERT INTO users VALUES (default, 'Rabe', 'rabe@gmail.com', '123', 60, 165);
INSERT INTO users VALUES (default, 'Rakoto', 'rakoto@gmail.com', '123', 70, 170);

INSERT INTO sakafo VALUES(default, 'assiete legume', 'assiete1.png', 0);
INSERT INTO sakafo VALUES(default, 'assiete legume', 'assiete2.png', 0);
INSERT INTO sakafo VALUES(default, 'assiete legume,oeuf', 'assiete3.png', 0);
INSERT INTO sakafo VALUES(default, 'assiete legume,riz', 'assiete4.png', 0);
INSERT INTO sakafo VALUES(default, 'assiete legume,poisson', 'assiete5.png', 0);
INSERT INTO sakafo VALUES(default, 'steack,oeuf', 'assiete6.png', 0);
INSERT INTO sakafo VALUES(default, 'salade poulet', 'assiete7.png', 0);
INSERT INTO sakafo VALUES(default, 'salade de pate, viande', 'aliemnt1.png', 1);
INSERT INTO sakafo VALUES(default, 'salade viande', 'aliemnt2.png', 1);
INSERT INTO sakafo VALUES(default, 'salade viande, oeuf', 'aliemnt3.png', 1);
INSERT INTO sakafo VALUES(default, 'salade de pate', 'aliemnt4.png', 1);
INSERT INTO sakafo VALUES(default, 'poulet sauce, riz', 'aliemnt5.png', 1);
INSERT INTO sakafo VALUES(default, 'flocon avoine', 'aliemnt6.png', 1);
INSERT INTO sakafo VALUES(default, 'avoine,yaourt, fruit', 'aliemnt7.png', 1);

INSERT INTO activite VALUES (default, 'jogging', 'joogin.png', 0);
INSERT INTO activite VALUES (default, 'corde a sauté', 'joogin.png', 0);
INSERT INTO activite VALUES(default, 'cardio', 'cardio.png', 0);
INSERT INTO activite VALUES(default, 'byciclette', 'byciclette.png', 0);
INSERT INTO activite VALUES(default, 'squats', 'squat.png', 1);
INSERT INTO activite VALUES(default, 'fente', 'fente.png', 1);
INSERT INTO activite VALUES(default, 'pecteauraux', 'pecteauraux.png', 1);
INSERT INTO activite VALUES(default, 'biceps', 'biceps.png', 1);

INSERT INTO detailsProgramme VALUES(default, 'regime 7j', 7, 0, 10000);
INSERT INTO detailsProgramme VALUES(default, 'regime 14j', 14, 0, 20000);
INSERT INTO detailsProgramme VALUES(default, 'regime 30j', 30, 0, 40000);
INSERT INTO detailsProgramme VALUES(default, 'regime 7j', 7, 1, 20000);
INSERT INTO detailsProgramme VALUES(default, 'regime 14j', 14, 1, 40000);
INSERT INTO detailsProgramme VALUES(default, 'regime 30j', 30, 1, 80000);

INSERT INTO relation_dp_sakafo VALUES(default, 1, 1);
INSERT INTO relation_dp_sakafo VALUES(default, 2, 2);
INSERT INTO relation_dp_sakafo VALUES(default, 3, 3);
INSERT INTO relation_dp_sakafo VALUES(default, 4, 4);
INSERT INTO relation_dp_sakafo VALUES(default, 5, 5);
INSERT INTO relation_dp_sakafo VALUES(default, 6, 7);

INSERT INTO relation_dp_activite VALUES(default, 1, 1);
INSERT INTO relation_dp_activite VALUES(default, 2, 3);
INSERT INTO relation_dp_activite VALUES(default, 3, 2);
INSERT INTO relation_dp_activite VALUES(default, 4, 5);
INSERT INTO relation_dp_activite VALUES(default, 5, 6);
INSERT INTO relation_dp_activite VALUES(default, 6, 4);

INSERT INTO programme VALUES(default, '2023-07-10', '2023-07-17', 1, 1);
INSERT INTO programme VALUES(default, '2023-07-10', '2023-07-24', 2, 2);
INSERT INTO programme VALUES(default, '2023-07-17', '2023-07-23', 1, 4);
INSERT INTO programme VALUES(default, '2023-07-23', '2023-07-30', 2,  1);

INSERT INTO code VALUES(123456789, 30000, 0);
INSERT INTO code VALUES(789456123, 40000, 0);
INSERT INTO code VALUES(963025874, 50000, 0);
INSERT INTO code VALUES(854712036, 80000, 0);
INSERT INTO code VALUES(654128796, 20000, 0);
INSERT INTO code VALUES(412789630, 10000, 0);

-- 


CREATE VIEW V_Programme_Sakafo as select idProgramme, s.idSakafo, dtp.idDetails, s.nom, s.type_ 
    from programme as p 
    join detailsProgramme as dtp 
        on p.idDetails = dtp.idDetails 
    join relation_dp_sakafo as dp_s
        on dp_s.idDetails = dtp.idDetails
    join sakafo as s
        on s.idSakafo = dp_s.idSakafo
;
