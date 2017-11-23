use projetudev;
/* Requete  par num contrat & loc client */
SELECT num_contrat_loc, id_contrat_loc_client
FROM contrat_loc
GROUP BY num_contrat_loc

/* Requete par num contrat client et vehicule */
SELECT num_contrat_loc, id_contrat_loc_client, id_contrat_loc_vehicule
FROM contrat_loc
GROUP BY num_contrat_loc

/* Requete par num contrat client vehicule et agence*/
SELECT num_contrat_loc, id_contrat_loc_client, id_contrat_loc_vehicule, id_contrat_loc_agence
FROM contrat_loc
GROUP BY num_contrat_loc

/* Requete par  contrat client vehicule agence et nb options et penalite */
SELECT num_contrat_loc, id_contrat_loc_client, id_contrat_loc_vehicule, id_contrat_loc_agence, id_contrat_loc_penalite, id_contrat_loc_accessoire
FROM contrat_loc
GROUP BY num_contrat_loc

/* Requete contrat ou le client a une location sans options */
SELECT num_contrat_loc, id_contrat_loc_client, id_contrat_loc_accessoire, accessoire.lib_accessoire
FROM contrat_loc INNER JOIN accessoire on id_accessoire = contrat_loc.id_contrat_loc_accessoire
WHERE id_contrat_loc_accessoire = 1

/* requete num contrat client trié par agence */
SELECT num_contrat_loc, agence.lib_agence
FROM contrat_loc INNER JOIN agence on contrat_loc.id_contrat_loc_agence = agence.id_agence
WHERE id_agence = 1

/* requete numéro contrat avec nom client trié par agence */
SELECT num_contrat_loc, client.nom_client
FROM contrat_loc INNER JOIN client on contrat_loc.id_contrat_loc_client = client.id_client
WHERE id_contrat_loc_client IN (SELECT id_contrat_loc_client
FROM contrat_loc INNER JOIN agence on contrat_loc.id_contrat_loc_agence = agence.id_agence
WHERE id_agence = 3)

/* requete numéro contrat avec nom du client et modele du vehicule */
SELECT num_contrat_loc, client.nom_client, vehicule.marque_veh
FROM contrat_loc INNER JOIN client 
ON contrat_loc.id_contrat_loc_client = client.id_client
INNER JOIN vehicule ON contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh

/* requete by rodolphe modele marque vehicule date d & f location client qui vit chez les autres */
SELECT nom_client, vehicule.marque_veh, vehicule.modele_veh, contrat_loc.date_debut, contrat_loc.date_fin, pays.nom_pays
FROM contrat_loc 
INNER JOIN vehicule
on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
INNER JOIN client 
on id_contrat_loc_client = client.id_client
INNER JOIN villecp
on client.id_client_villecp = villecp.id_villecp
INNER JOIN pays
on client.id_client_villecp = pays.id_pays
WHERE pays.nom_pays <> "france";

SELECT client.nom_client, vehicule.modele_veh, datediff(date_fin, date_debut)
FROM contrat_loc
inner join client ON client.id_client = contrat_loc.id_contrat_loc_client
inner join vehicule on vehicule.id_veh = contrat_loc.id_contrat_loc_vehicule

select avg(datediff(contrat_loc.date_fin, contrat_loc.date_debut))
from contrat_loc;

/* marque modele veh --> incident  */
SELECT marque_veh, modele_veh
from vehicule
inner join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
inner join etat_lieux on etat_lieux.num_contrat_etat_lieux = contrat_loc.num_contrat_loc
where etat_lieux.incident = 1;

/* nom du mecanicien qui a changé le pneu crevé */
SELECT personnel.nom_pers, entretien.date_entretien_veh, piece.lib_piece, piece.prixunitHT_piece
from personnel
inner join intervient on intervient.id_pers = personnel.id_pers
inner join entretien on entretien.id_entretien = intervient.id_intervient_entretien
inner join changer on changer.id_changer_entretien = entretien.id_entretien
inner join piece on piece.id_piece = changer.id_changer_piece
where piece.lib_piece like 'pn%';


/* modele et marque des vehicules disponibles aujourd'hui par agence */
SELECT lib_modele, lib_marque, lib_agence
from vehicule
left join agence on agence.id_agence = vehicule.id_agence_vehicule
left join modele on modele.id_modele = vehicule.id_modele_vehicule
left join marque on marque.id_marque = modele.id_marque_modele
left join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
where contrat_loc.date_fin < now();

SELECT nom_client, prenom_client, add_facturation, villecp.ville_villecp, date_fact, lib_agence, marque_veh, modele_veh, date_debut, date_fin
from client
inner join villecp on villecp.id_villecp = client.id_client_villecp
inner join contrat_loc on contrat_loc.id_contrat_loc_client = client.id_client
inner join vehicule on vehicule.id_veh = contrat_loc.id_contrat_loc_vehicule
inner join agence on agence.id_agence_vehicule = vehicule.id_veh
inner join facture on facture.num_contrat_loc_facture = contrat_loc.num_contrat_loc
where facture.num_fact = 7;


select prix_journalier_veh 
from vehicule inner join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
where num_contrat_loc in (select num_contrat_loc_facture from facture where num_fact = 4)

)  * ( 

select datediff(date_fin, date_debut)
from contrat_loc
where num_contrat_loc in (select num_contrat_loc_facture from facture where facture.num_fact = 4)

) + ( 

select prix_journaHT_accessoire
from accessoire
where id_accessoire in (select id_contrat_loc_accessoire from contrat_loc
						where num_contrat_loc in (select num_contrat_loc_facture from facture where facture.num_fact = 4))
						 
) * ( 
select datediff(date_fin, date_debut)
from contrat_loc
where num_contrat_loc in (select num_contrat_loc_facture from facture where facture.num_fact = 4)

) * ( 

select taux_penalite
from penalite
where id_penalite in (SELECT id_contrat_loc_penalite from contrat_loc
						where num_contrat_loc in (select num_contrat_loc_facture from facture where num_fact = 4))

) as total;


/* véhicule disponible à la location aujourd'hui */
select distinct id_veh, lib_modele, lib_marque, lib_agence
from vehicule
left join agence on agence.id_agence = vehicule.id_agence_vehicule
left join modele on modele.id_modele = vehicule.id_modele_vehicule
left join marque on marque.id_marque = modele.id_marque_modele
left join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
where id_veh not in (select id_veh from vehicule inner join contrat_loc
    on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh where statut_facturation = 0);

/* véhicule en location parti en location a la date d'aujourd'hui */
    select id_veh from vehicule inner join contrat_loc
    on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh where statut_facturation = 0 and ;
    
    

/* véhicule disponible pour une location du 24 au 28 novembre  */
    
select distinct id_veh, lib_modele, lib_marque, lib_agence
from vehicule
left join agence on agence.id_agence = vehicule.id_agence_vehicule
left join modele on modele.id_modele = vehicule.id_modele_vehicule
left join marque on marque.id_marque = modele.id_marque_modele
left join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
where id_veh not in (select id_veh from vehicule inner join contrat_loc
    on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh 
    where statut_facturation = 0
    and contrat_loc.date_debut < '2017-11-28' and contrat_loc.date_fin > '2017-11-24');
    
/* véhicule disponible pour une location du 24 au 28 novembre pour l'agence 1  ! a recuperer en php l'agence sélectionnée par l'internaute, sa date de début de location et sa date de fin de location */
    
select distinct id_veh, lib_modele, lib_marque, id_cat_veh_vehicule, nbre_bagage_veh, nbre_passager_veh, nbre_portes_veh, lib_agence, id_agence, id_boiteV_vehicule
from vehicule
left join agence on agence.id_agence = vehicule.id_agence_vehicule
left join modele on modele.id_modele = vehicule.id_modele_vehicule
left join marque on marque.id_marque = modele.id_marque_modele
left join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
where id_agence = 1 /* info internaute */ and id_veh not in (select id_veh from vehicule inner join contrat_loc
    on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh 
    where statut_facturation = 0 /* pas touche au 0 */
    and contrat_loc.date_debut < '2017-11-28' /*info internaute */ and contrat_loc.date_fin > '2017-11-24' /* info internaute */);
    
    alter table modele alter column img_modele type varchar(60);
    