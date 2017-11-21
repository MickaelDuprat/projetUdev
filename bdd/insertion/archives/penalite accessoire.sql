use projetudev;

insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Pas d'options", 00.00);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Conducteur supplémentaire", 11.00);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("GPS", 13.00);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Siège enfant", 10.99);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Nacelle bébé", 10.00);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Réhausseur intégral", 7.99);
insert into accessoire (lib_accessoire, prix_journaHT_accessoire) values ("Facturation par courrier", 2.99);

insert into penalite (lib_penalite, taux_penalite) values ("pas de penalite", 1.00);
insert into penalite (lib_penalite, taux_penalite) values ("rendu sans le plein", 1.025);
insert into penalite (lib_penalite, taux_penalite) values ("non respect de la durée de location", 1.10);
insert into penalite (lib_penalite, taux_penalite) values ("non rendu d'options", 1.15);

insert into agence (lib_agence, add_agence, id_agence_villecp) values ("agence de Bordeaux", "10, rue des corbeaux", 12683);
insert into agence (lib_agence, add_agence, id_agence_villecp) values ("agence de Niort", "15, avenue des bois jolies", 32008);
insert into agence (lib_agence, add_agence, id_agence_villecp) values ("agence de Courçon", "8, allée du manque de chance", 5909);
insert into agence (lib_agence, add_agence, id_agence_villecp) values ("agence de Châtellerault", "222, avenue du village", 34184);
insert into agence (lib_agence, add_agence, id_agence_villecp) values ("agence de Poey d'Oleron", "666, boulevard de l'antéchrist", 26272);