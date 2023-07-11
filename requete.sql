-- 
select * from programme join detailsProgramme on detailsProgramme.idDetails= programme.idDetails where idUser=1 and programme.debut<now() and programme.fin>now();
select * from programme join detailsProgramme on detailsProgramme.idDetails= programme.idDetails;
select * from programme join detailsProgramme on programme.idDetails=detailsProgramme.idDetails where idProgramme=1;

SELECT *
FROM detailsProgramme
JOIN programme ON programme.idDetails = detailsProgramme.idDetails
JOIN relation_dp_sakafo ON relation_dp_sakafo.idDetails = detailsProgramme.idDetails
JOIN sakafo ON relation_dp_sakafo.idSakafo = sakafo.idSakafo
where programme.debut<now() and programme.fin>now() and programme.idProgramme=1;

SELECT *
FROM detailsProgramme
JOIN programme ON programme.idDetails = detailsProgramme.idDetails
JOIN relation_dp_activite ON relation_dp_activite.idDetails = detailsProgramme.idDetails
JOIN activite ON relation_dp_activite.idActivite = activite.idActivite
where programme.debut<now() and programme.fin>now() and programme.idProgramme=1;

update programme set fin=''