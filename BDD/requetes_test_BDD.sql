/* Donner les plaques d'immatriculations des véhicules de la marque peugeot  */

select immat_veh, lib_marque, id_veh, lib_modele from vehicule
inner join modele on modele.id_modele = vehicule.id_modele_vehicule
inner join marque on marque.id_marque = modele.id_marque_modele
where lib_marque ='Peugeot';

/* Trier les véhicules par catégories croissantes */

select immat_veh, lib_marque, lib_modele, lib_cat_veh from vehicule
inner join modele on modele.id_modele = vehicule.id_modele_vehicule
inner join marque on marque.id_marque = modele.id_marque_modele
inner join cat_veh on cat_veh.id_cat_veh = vehicule.id_cat_veh_vehicule
order by lib_cat_veh ASC;

/* Trier les véhicules par puissance moteur déccroissante */

select immat_veh, puismoteur_veh, lib_marque, lib_modele, lib_cat_veh  from vehicule
inner join modele on modele.id_modele = vehicule.id_modele_vehicule
inner join marque on marque.id_marque = modele.id_marque_modele
inner join cat_veh on cat_veh.id_cat_veh = vehicule.id_cat_veh_vehicule
order by puismoteur_veh DESC;

/* Ne récupérer que les véhicules de types utilitaires et les classer leurs marques par ordre croissant */

SELECT lib_marque, lib_modele, lib_cat_veh FROM vehicule
inner join modele on modele.id_modele = vehicule.id_modele_vehicule
inner join marque on marque.id_marque = modele.id_marque_modele
INNER JOIN cat_veh on vehicule.id_cat_veh_vehicule = cat_veh.id_cat_veh
where id_cat_veh_vehicule = 8
order by lib_marque ASC;

/* Chercher les personnels (nom, prenom) du service technique par agence */

SELECT personnel.id_pers, id_fonction_pers_personnel, nom_pers, prenom_pers, lib_agence FROM personnel
inner join travaille on travaille.id_travaille_pers = personnel.id_pers
inner join agence on agence.id_agence = travaille.id_travaille_agence
where id_fonction_pers_personnel BETWEEN 8 and 10
order by lib_agence asc;

/* Chercher les personnels (nom, prenom, agence) du service technique intervenu pour chaque entretien et de quel véhicule */

SELECT id_fonction_pers_personnel, nom_pers, prenom_pers, lib_agence, id_entretien, id_vehicule FROM entretien
inner join intervient on intervient.id_intervient_entretien = entretien.id_entretien
inner join repertorie on repertorie.id_repertorie_entretien = entretien.id_entretien
inner join etat_lieux on etat_lieux.num_contrat_etat_lieux = repertorie.id_repertorie_etat_lieux
inner join contrat_loc on contrat_loc.num_contrat_loc = etat_lieux.num_contrat_etat_lieux
inner join travaille on travaille.id_travaille_pers = personnel.id_pers
inner join agence on agence.id_agence = travaille.id_travaille_agence
where id_entretien BETWEEN 1 and 10
order by lib_agence asc;

/* ********************************* REQUÊTE FACTURE / TVA / LIGNE FACTURE *********************************** */

/* Compter le nombre de lignes de la facture 250 */

select COUNT(id_ligne_facture) as Nombre_de_lignes from ligne_facture;

/* Récupérer les informations d’un client depuis la facture */

select id_client, nom_client, prenom_client, add_facturation, taux_remise
from contrat_loc inner join client on contrat_loc.id_contrat_loc_client = client.id_client 
where num_contrat_loc ='127';

/* Récupérer la TVA d’une pièce en particulier */ A REVOIR

select lib_piece, tva_lib
from piece 
inner join tva on piece.piece_tva = tva.code_tva where id_piece = '2';

/* Récupérer les informations d’une agence depuis la facture */

select lib_agence, add_agence from contrat_loc
	inner join agence on contrat_loc.id_contrat_loc_agence = agence.id_agence
	where num_contrat_loc ='383';

/* Montant de la facture n°7 */

select (
	select prix_journalier_veh as prix
	from vehicule inner join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh 
	where num_contrat_loc in (select num_contrat_loc_facture from facture
						  	  where facture.num_fact = '249')
	) * (
	select DATEDIFF(date_fin, date_debut) as nbjour
	from contrat_loc 
	where num_contrat_loc in (select num_contrat_loc_facture from facture
						  where facture.num_fact = '249') 
	) as total;
	
/* Donner le modèle et la marque du véhicule dont on a changé les phares */
	
select lib_marque, lib_modele, num_contrat_loc, etat_lieux.id_etat_lieux
from vehicule 
inner join modele on modele.id_modele = vehicule.id_modele_vehicule
inner join marque on marque.id_marque = modele.id_marque_modele
inner join contrat_loc on vehicule.id_veh = contrat_loc.id_contrat_loc_vehicule
inner join etat_lieux on contrat_loc.num_contrat_loc = etat_lieux.num_contrat_etat_lieux
inner join repertorie on etat_lieux.id_etat_lieux = repertorie.id_repertorie_etat_lieux
inner join piece on repertorie. = piece.id_piece
inner join changer on piece.id_piece = changer.id_changer_piece
where piece.lib_piece like 'pneu%';

/* Qui travaille dans quelle agence */

select nom_pers, prenom_pers, lib_fonction_pers, agence.lib_agence
from personnel
inner join fonction_pers on personnel.id_fonction_pers_personnel = fonction_pers.id_fonction_pers
inner join travaille on personnel.id_pers = travaille.id_travaille_pers
inner join agence on travaille.id_travaille_agence = agence.id_agence
order by agence.id_agence;

/* Requêtes Factures / TVA / Ligne Facture de la facture n°1

Compter le nombre de lignes d’une facture
Récupérer les informations d’un client depuis la facture
Récupérer la TVA d’une pièce en particulier depuis la facture
Récupérer les informations concernant l’agence éditrice de la facture */

select num_fact, date_fact, id_veh, id_client, nom_client, prenom_client, ligne_facture_type_ligneF, ligne_facture_tva, lib_agence, lib_accessoire, lib_penalite from client
inner join contrat_loc on client.id_client = contrat_loc.id_contrat_loc_client
inner join accessoire on accessoire.id_accessoire = contrat_loc.id_contrat_loc_accessoire
inner join agence on contrat_loc.id_contrat_loc_agence = agence.id_agence
inner join vehicule on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
inner join facture on contrat_loc.num_contrat_loc = facture.num_contrat_loc_facture
inner join penalite on penalite.id_penalite = facture.id_penalite_facture
inner join ligne_facture on facture.num_fact = ligne_facture.ligne_facture_num_fact
inner join tva on ligne_facture.id_ligne_facture = tva.code_tva
inner join type_lignef on ligne_facture.id_ligne_facture = type_lignef.id_type_ligneF
where num_fact =9;
