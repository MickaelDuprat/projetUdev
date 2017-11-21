use projetudev;

insert into civilite (lib_civ, abb_civ) values ("monsieur", "M");
insert into civilite (lib_civ, abb_civ) values ("madame", "Mme");
insert into civilite (lib_civ, abb_civ) values ("mademoiselle", "Mlle");

insert into pays (nom_pays) values ("France");
insert into pays (nom_pays) values ("Portugal");
insert into pays (nom_pays) values ("Allemagne");
insert into pays (nom_pays) values ("Royaume-Unis");
insert into pays (nom_pays) values ("Espagne");
insert into pays (nom_pays) values ("Slovaquie");
insert into pays (nom_pays) values ("Estonie");
insert into pays (nom_pays) values ("Etats_Unis");
insert into pays (nom_pays) values ("Irlande");
insert into pays (nom_pays) values ("Suisse");

insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Poitiers", "86000", 1);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Bordeaux", "33000", 1);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Niort", "79000", 1);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Chatellerault", "86100", 1);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Poey D'Oloron", "64400", 1);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Courçon", "17170", 1);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Dublin", "94568", 9);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Bratislava","82105", 6);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Marseille","03000", 1);
insert into villecp (ville_villecp, cp_villecp, id_villecp_pays) values ("Lisbonne", "1100-365", 2);

insert into type_permis (lib_type_permis) values ("Permis A");
insert into type_permis (lib_type_permis) values ("Permis B");
insert into type_permis (lib_type_permis) values ("Permis BSR");

insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Martin", "Jean-pierre", "1974-08-24", "jpmjtm@hotmail.com", "05-49-31-28-74", "110927164538", null, "25 rue des lilas", null, null, null, null, null, 1, 2, 3);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Bernard", "Julio", "1985-10-29", "juliolestchaud@hotmail.fr", "06-84-13-82-47", "010116348971", 0.15, "12 avenue des bisournours", null, null, "CGI", "70204275500109", "laurent delaunay", 1, 2, 7);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Thomas", "Evelyne", "1955-12-29", "tomtom@gmail.com", "05-66-37-44-66", "291216438729", null, "666 impasse de l'enfer", "résidence de c'est chaud cacao", "Appt 666", null, null, null, 3, 2, 5);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Petit", "Jean", "1955-04-11", "petitjean@wannadoo.fr", "02-12-23-34-45", "110402149765", 0.05, "111 avenue du général de Gaule", null, null, "EDF", 55208131766522, "Guillaume Pepy", 1, 1, 2);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Robert", "Petit", "1980-09-09", "petitrobert@yahoo.fr", "01-99-88-77-66", "090901264875", null, "913 boulevard de la Martinique", null, null, null, null, null, 1, 3, 1);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Richard", "Coeur de lion", "1999-02-07", "richardcoeurdelion@hotmail.fr", "03-17-84-95-62", "020703164859", 0.1, "10 avenue Downing street", null, null, null, null, null, 1, 2, 9);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Durand", "Colette", "1969-04-17", "PaulDurand69@gmail.fr", "01-33-17-86-63", "041733481952", null, "1 rue des champions", "Immeuble Godard", "appt 3 au 1er étage", "EPSI", 39350481600140, "Justine Commeny", 2, 2, 4);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Dupont", "Pierre", "1979-03-10", "dupont-cest-bon@hotmail.com", "02-01-00-99-98", "100324153658", 0.2, "19 bvd des cochons", null, null, null, null, null, 1, 2, 6);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Moreau", "Bruce", "1990-10-29", "bruce90toutpuissant@wannadoo.fr", "05-45-14-58-69", "102986142536", null, "44 rue de c'est bientôt mon anniversaire", null, null, "A la petite cochonne", 14325697894342, "Bruce tout puissant", 1, 1, 10);
insert into client (nom_client, prenom_client, dateN_client, email_client, tel_client, num_permis, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_type_permis, id_client_villecp)
values ("Lefebvre", "Paulette", "1933-07-15", "etpuispaulette@yahoo.com", "04-55-47-89-61", "150714263569", 0.5, "23 avenue des coquines", null, null, null, null, null, 2, 2, 8);

insert into cat_veh (lib_cat_veh) values ('Berline');
insert into cat_veh (lib_cat_veh) values ('Utilitaire');
insert into cat_veh (lib_cat_veh) values ('Luxe');
insert into cat_veh (lib_cat_veh) values ('Citadine');
insert into cat_veh (lib_cat_veh) values ('SUV');
insert into cat_veh (lib_cat_veh) values ('Cabriolet');
insert into cat_veh (lib_cat_veh) values ('Sport');

insert into boiteV (lib_boiteV) values ('Manuelle');
insert into boiteV (lib_boiteV) values ('Automatique');

insert into type_carb (lib_type_carb) values ('SP 95');
insert into type_carb (lib_type_carb) values ('SP 98');
insert into type_carb (lib_type_carb) values ('Diesel');
insert into type_carb (lib_type_carb) values ('GPL');

insert into type_veh ( lib_type_veh) values ('Voiture');
insert into type_veh (lib_type_veh) values ('Moto');
insert into type_veh (lib_type_veh) values ('Scooter');
insert into type_veh (lib_type_veh) values ('Trotinette');
insert into type_veh (lib_type_veh) values ('Camionnette');
insert into type_veh (lib_type_veh) values ('Minibus');

insert into nb_place (lib_nbPlace) values ('1');
insert into nb_place (lib_nbPlace) values ('2');
insert into nb_place (lib_nbPlace) values ('3');
insert into nb_place (lib_nbPlace) values ('4');
insert into nb_place (lib_nbPlace) values ('5');
insert into nb_place (lib_nbPlace) values ('6');
insert into nb_place (lib_nbPlace) values ('7');
insert into nb_place (lib_nbPlace) values ('8');
insert into nb_place (lib_nbPlace) values ('9');

insert into nb_porte (lib_nbPorte) values ('3');
insert into nb_porte (lib_nbPorte) values ('5');

insert into options_veh (lib_options) values ('GPS');
insert into options_veh (lib_options) values ('Climatisation');
insert into options_veh (lib_options) values ('Vitre teintée');
insert into options_veh (lib_options) values ('Caméras de recul');
insert into options_veh (lib_options) values ('Détecteur de recul');
insert into options_veh (lib_options) values ('ABS');
insert into options_veh (lib_options) values ('ESP');
insert into options_veh (lib_options) values ('Airbags');

insert into emission (lib_emission) values ('30');
insert into emission (lib_emission) values ('35');
insert into emission (lib_emission) values ('40');
insert into emission (lib_emission) values ('45');
insert into emission (lib_emission) values ('50');
insert into emission (lib_emission) values ('55');
insert into emission (lib_emission) values ('60');
insert into emission (lib_emission) values ('65');
insert into emission (lib_emission) values ('70');
insert into emission (lib_emission) values ('75');
insert into emission (lib_emission) values ('80');
insert into emission (lib_emission) values ('85');

insert into nb_bagage (lib_nbBagage) values ('80');
insert into nb_bagage (lib_nbBagage) values ('85');

insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('AB-293-CF', 'Ford', 'C-Max', '2005-05-15', '2000-01-01', 4, 100, 5.8, 58, 2, 1, 2, 1, 1, 1, 1, 1, 2);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('BE-742-LS', 'Peugeot', '2008', '2008-10-25', '2000-01-01', 5, 110, 6.2, 70, 5, 1, 3, 1, 2, 2, 2, 2, 1);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('ZX-904-WS', 'Renault', 'Kangoo', '2010-08-06', '2000-01-01', 4, 110, 5.9, 54, 2, 1, 3, 2, 1, 1, 2, 3, 2);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('JD-948-QL', 'Audi', 'A5 SB AUTO', '2011-03-10', '2000-01-01', 6, 180, 6.0, 81, 3, 1, 1, 2, 1, 2, 3, 4, 2);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('UX-040-BZ', 'Renault', 'Twingo', '2009-06-12', '2000-01-01', 4, 90, 5.7, 42, 4, 1, 3, 2, 1, 1, 3, 5, 1);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('TF-108-MQ', 'Citroën', 'C1', '2004-09-21', '2000-01-01', 4, 70, 5.1, 33, 4, 1, 3, 2, 1, 2, 4, 6, 1);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('SQ-108-PE', 'Audi', 'A5 CABRIOLET AUTO', '2012-11-05', '2000-01-01', 6, 170, 4.5, 105, 6, 1, 1, 2, 2, 1, 4, 7, 2);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('PA-108-YX', 'Citroën', 'DS4', '2014-04-02', '2000-01-01', 5, 110, 5.6, 75, 1, 1, 3, 1, 1, 2, 5, 8, 1);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('IQ-108-ZJ', 'Peugeot ', 'Partner', '2009-08-10', '2000-01-01', 4, 110, 8.0, 49, 2, 1, 1, 1, 1, 1, 6, 9, 2);
insert into vehicule (immat_veh, marque_veh, modele_veh, dateachat_veh, date_circulation_veh, puisfisc_veh, puismoteur_veh, conso_veh, prix_journalier_veh, id_cat_veh_vehicule, id_type_veh_vehicule, id_type_carb_vehicule, id_nb_bag_vehicule, id_boiteV_vehicule, id_nb_porte_vehicule, id_options_vehicule, id_emission_vehicule, id_nb_place_vehicule)
values ('LH-108-QK', 'Alfa Romeo', 'Giulietta', '2013-02-12', '2000-01-01', 6, 180, 6.2, 110, 3, 1, 1, 2, 2, 1, 6, 10, 1);

insert into tva (tva_lib) values ("1.2");
insert into tva (tva_lib) values ("1.1");
insert into tva (tva_lib) values ("1.055");
insert into tva (tva_lib) values ("1.021");

insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("Phare xeon prenium", 320.12, 2);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("bougie ", 3.12, 1);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("phare arriere", 150.21, 3);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("retroviseur universel ", 69.20, 1);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("enjoliver type alu", 120.24, 1);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("pneu avant michelin 190-55-55 90V", 87.77, 1);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("batterie", 100.43, 1);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("essuie-glace", 30.50, 2);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("filtre a air", 25.21, 3);
insert into piece (lib_piece, prixunitHT_piece, piece_tva) values ("pneu arriere dunlop 185-55-65 95H", 55.23, 4);

insert into type_etat_lieux (lib_type_etat_lieux) values ("etat des lieux entrer vehicule");
insert into type_etat_lieux (lib_type_etat_lieux) values ("etat des lieux incident vehicule");
insert into type_etat_lieux (lib_type_etat_lieux) values ("etat des lieux sortie vehicule");

insert into agence (lib_agence, add_agence, id_agence_vehicule, id_agence_villecp) values ("agence de bordeaux", "10, rue des corbeaux", 1, 2);
insert into agence (lib_agence, add_agence, id_agence_vehicule, id_agence_villecp) values ("agence de niort", "15, avenue des bois jolies", 2, 3);
insert into agence (lib_agence, add_agence, id_agence_vehicule, id_agence_villecp) values ("agence de pau", "8, allée du manque de chance", 3, 5);

insert into penalite (lib_penalite, taux_penalite) values ("pas de penalite", 1.00);
insert into penalite (lib_penalite, taux_penalite) values ("rendu sans le plein", 1.025);
insert into penalite (lib_penalite, taux_penalite) values ("non respect de la durée de location", 1.10);
insert into penalite (lib_penalite, taux_penalite) values ("non rendu d'options", 1.15);

insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("pas d'options", 00.00);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("GPS", 50.50);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Siège auto", 25.25);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Conducteur supplémentaire", 7.50);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("rehausseur", 9.99);

insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2015/10/04", "2015/10/04", "2015/10/05", 580.25, 4, 3, 6, 5, 2);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2016/01/17", "2016/01/18", "2016/01/20", 1024.12, 9, 1, 3, 2, 1);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2016/02/13", "2016/02/13", "2016/02/14", 2009.43, 10, 2, 9, 1, 3);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2016/08/14", "2016/08/15", "2016/08/15", 580.10, 1, 2, 7, 2, 4);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2017/12/01", "2017/12/02", "2017/12/03", 1849.05, 3, 3, 10, 1, 3);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2016/11/05", "2016/11/05", "2016/11/07", 954.14, 2, 1, 1, 3, 3);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2017/08/03", "2017/08/04", "2017/08/05", 1500.58, 7, 1, 4, 4, 2);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2015/12/03", "2015/12/03", "2015/12/08", 3800.44, 6, 3, 2, 1,2);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2016/12/21", "2016/12/22", "2016/12/23", 1498.12, 5, 2, 8, 4, 1);
insert into contrat_loc (date_contrat, date_debut, date_fin, caution, id_contrat_loc_client, id_contrat_loc_agence, id_contrat_loc_vehicule, id_contrat_loc_accessoire, id_contrat_loc_penalite)
values ("2017/10/10", "2017/10/12", "2017/10/14", 2784.24, 8, 3, 5, 3, 4);

insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (12500, 12700, "2014/10/04", false, null, 4, 3);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (18900, 19100, "2015/01/18", true, "pneu arriere crevé", 7, 3);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (30039, 30120, "2015/02/13", false, null, 1, 3);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (24938, 25200, "2015/08/15", true, "phare arriere cassé", 5, 2);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (40234, 40320, "2015/12/02", false, null, 8, 3);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (8033, 8239, "2016/02/05", false, null, 10, 3);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (54093, 54132, "2016/04/08", false, null, 2, 3);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (5234, 5413, "2016/12/08", true, "pneu avant crevé", 3, 2);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (30804, 30945, "2017/04/22", false, null, 9, 3);
insert into etat_lieux (id_km_depart, id_km_arrive, date_etat_lieux, incident, type_incident, num_contrat_etat_lieux, code_type_etat_lieux_etat_lieux)
values (1049, 1209, "2017/10/12", true, "phare xeon cassé", 6, 3);

insert into facture (date_fact, num_contrat_loc_facture) values ("2015/10/04",7);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 5);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 10);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 4);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 6);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 9);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 2);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 8);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 1);
insert into facture (date_fact, num_contrat_loc_facture) values ("2017/10/18", 3);

INSERT INTO entretien (date_entretien_veh, motif_entretien_veh) VALUES ("2015/01/20", 'changement du pneu arriere');
INSERT INTO entretien (date_entretien_veh, motif_entretien_veh) VALUES ("2015/08/29", 'changement de phare arriere');
INSERT INTO entretien (date_entretien_veh, motif_entretien_veh) VALUES ("2016/12/25", 'changement du roue avant');
INSERT INTO entretien (date_entretien_veh, motif_entretien_veh) VALUES ("2017/10/23", 'changement de phare xeon');

insert into type_ligneF (lib_type_ligneF) values ("vehicule");
insert into type_ligneF (lib_type_ligneF) values ("options");
insert into type_ligneF (lib_type_ligneF) values ("penalite");

insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(1, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(1, 2, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(1, 3, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(2, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(2, 2, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(3, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(3, 3, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(4, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(4, 2, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(4, 3, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(5, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(5, 3, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(6, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(6, 2, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(6, 3, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(7, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(7, 2, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(7, 3, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(8, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(8, 3, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(9, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(9, 2, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(10, 1, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(10, 2, 1);
insert into ligne_facture (ligne_facture_num_fact, ligne_facture_type_ligneF, ligne_facture_tva) values(10, 3, 1);

insert into type_pers (service_type_pers, fonct_type_pers)
values ("mécanique", "chef mécanicien");
insert into type_pers (service_type_pers, fonct_type_pers)
values ("mécanique", "mécanicien");
insert into type_pers (service_type_pers, fonct_type_pers)
values ("administratif", "secrétaire");
insert into type_pers (service_type_pers, fonct_type_pers)
values ("administratif", "assistant de direction");
insert into type_pers (service_type_pers, fonct_type_pers)
values ("administratif", "comptable");
insert into type_pers (service_type_pers, fonct_type_pers)
values ("direction", "directeur");
insert into type_pers (service_type_pers, fonct_type_pers)
values ("direction", "directeur commercial");
insert into type_pers (service_type_pers, fonct_type_pers)
values ("commercial", "commercial");

insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Da silva", "Jose", "25 rue des étoiles", null, "1955/03/10", "05-46-07-48-95", null, 2);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Dos santos", "Manuel", "1 rue des mécanos", null, "1980/12/29", "06-78-9485-67", "03-12-47-89-56", 1);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Lasecretaire", "Joseline", "3 rue des danseuses etoiles", null, "1994/01/01", "03-47-85-51-26", "06-01-02-03-04", 3);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Lecomptable", "Michel", "25 rue des étoiles", null, "1961/03/10", "05-46-07-48-95", null, 5);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Ledirecteur", "Robert", "111 attention a tes fesses", null, "1967/02/28", "04-23-45-56-78", null, 6);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Lechebotte", "Jean_Louis", "2 place du numéro deux", null, "1969/06/24", "01-14-25-36-58", null, 7);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Amazon", "Vivian", "999 avenue du flouze", null, "1971/04/07", "05-45-24-86-95", null, 8);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Lesympathique", "Loic", "06 bvd des capucines", null, "1976/06/09", "05-46-07-48-95", null, 4);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Leboulet", "samuel", "15 rue des paysans", null, "1984/07/12", "04-56-87-84-95", null, 1);
insert into personnel (nom_pers, prenom_pers, add1_pers, add2_pers, dateN_pers, tel1_pers, tel2_pers, id_pers_type_pers)
values ("Lavilaine", "Linda", "11 place des petits hommes", null, "1986/10/07", "03-25-51-56-96", null, 8);

insert into intervient (statut_entretien, id_entretien, id_pers, id_intervient_entretien, id_intervient_pers)
values (true, 1, 2, 1, 2);
insert into intervient (statut_entretien, id_entretien, id_pers, id_intervient_entretien, id_intervient_pers)
values (true, 2, 1, 2, 1);
insert into intervient (statut_entretien, id_entretien, id_pers, id_intervient_entretien, id_intervient_pers)
values (true, 3, 1, 3, 1);
insert into intervient (statut_entretien, id_entretien, id_pers, id_intervient_entretien, id_intervient_pers)
values (false, 4, 2, 4, 2);

insert into repertorie (qtite_piece, id_etat_lieux, id_entretien, id_repertorie_etat_lieux, id_repertorie_entretien)
values (2, 2, 1, 2, 1);
insert into repertorie (qtite_piece, id_etat_lieux, id_entretien, id_repertorie_etat_lieux, id_repertorie_entretien)
values (2, 4, 2, 4, 2);
insert into repertorie (qtite_piece, id_etat_lieux, id_entretien, id_repertorie_etat_lieux, id_repertorie_entretien)
values (2, 8, 3, 8, 3);
insert into repertorie (qtite_piece, id_etat_lieux, id_entretien, id_repertorie_etat_lieux, id_repertorie_entretien)
values (1, 10, 4, 10, 4);

insert into changer (qte_piece, id_entretien, id_piece, id_changer_entretien, id_changer_piece)
values (2, 1, 10, 1, 10);
insert into changer (qte_piece, id_entretien, id_piece, id_changer_entretien, id_changer_piece)
values (1, 2, 3, 2, 3);
insert into changer (qte_piece, id_entretien, id_piece, id_changer_entretien, id_changer_piece)
values (2, 3, 6, 3, 6);
insert into changer (qte_piece, id_entretien, id_piece, id_changer_entretien, id_changer_piece)
values (2, 4, 1, 4, 1);

insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 1, 1, 1, 1);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 1, 3, 1, 3);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 1, 5, 1, 5);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 1, 10, 1, 10);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 2, 2, 2, 2);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 2, 4, 2, 4);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 2, 8, 2, 8);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 3, 6, 3, 6);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 3, 7, 3, 7);
insert into travaille (id_agence, id_pers, id_travaille_agence, id_travaille_pers)
values ( 3, 9, 3, 9);

insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (1, 2, 1, 2);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (2, 1, 2, 1);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (3, 3, 3, 3);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (4, 4, 4, 4);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (5, 4, 5, 4);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (6, 3, 6, 3);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (7, 2, 7, 2);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (8, 2, 8, 2);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (9, 1, 9, 1);
insert into applique (id_contrat_loc, id_penalite, id_applique_contrat_loc, id_applique_penalite)
values (10, 4, 10, 4);

insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (1, 5, 1, 5);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (2, 2, 2, 2);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (3, 1, 3, 1);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (4, 2, 4, 2);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (5, 1, 5, 1);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (6, 3, 6, 3);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (7, 4, 7, 4);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (8, 1, 8, 1);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (9, 4, 9, 4);
insert into choisit (id_contrat_loc, id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire)
values (10, 3, 10, 3);

insert into concerne (id_veh, id_entretien, id_concerne_veh, id_concerne_entretien)
values (4, 1, 4, 1);
insert into concerne (id_veh, id_entretien, id_concerne_veh, id_concerne_entretien)
values (10, 2, 10, 2);
insert into concerne (id_veh, id_entretien, id_concerne_veh, id_concerne_entretien)
values (9, 3, 9, 3);
insert into concerne (id_veh, id_entretien, id_concerne_veh, id_concerne_entretien)
values (1, 4, 1, 4);


