create database projetudev;
use projetudev;
set names 'utf8';

create table contrat_loc (
	num_contrat_loc int NOT NULL AUTO_INCREMENT,
	date_contrat date not null,
	date_debut date NOT NULL,
	date_fin date NOT NULL,
	caution double(6,2) NOT NULL,
	id_contrat_loc_client int NOT NULL,
	id_contrat_loc_vehicule int NOT NULL,
	id_contrat_loc_agence int NOT NULL,
	id_contrat_loc_accessoire int NOT NULL,
	id_contrat_loc_penalite int NOT NULL,
	CONSTRAINT pk_num_contrat Primary key (num_contrat_loc)
);

CREATE TABLE piece (
	id_piece int NOT NULL AUTO_INCREMENT,
	lib_piece varchar(100) NOT NULL,
	prixunitHT_piece double(6,2) NOT NULL,
	piece_tva int NOT NULL,
	CONSTRAINT pk_id_piece PRIMARY KEY (id_piece)
);

CREATE TABLE etat_lieux (
	id_etat_lieux int NOT NULL AUTO_INCREMENT,
	id_km_depart int(6) not null,
	id_km_arrive int(6) not null,
	date_etat_lieux date not null,
	incident boolean,
	type_incident varchar (200) default null,
	num_contrat_etat_lieux int NOT NULL,
	code_type_etat_lieux_etat_lieux int NOT NULL,
	CONSTRAINT pk_id_etat_lieux PRIMARY KEY (id_etat_lieux)
);

CREATE TABLE type_etat_lieux (
	code_type_etat_lieux int NOT NULL AUTO_INCREMENT,
	lib_type_etat_lieux varchar(80) NOT NULL,
	CONSTRAINT pk_code_type_etat_lieux PRIMARY KEY (code_type_etat_lieux)
);

CREATE TABLE changer (
	qte_piece int default null,
	id_entretien int NOT NULL,
	id_piece int NOT NULL,
	id_changer_entretien int NOT NULL,
	id_changer_piece int NOT NULL,
	CONSTRAINT pk_changer PRIMARY KEY (id_entretien, id_piece)
);

CREATE TABLE repertorie (
	qtite_piece int default null,
	id_etat_lieux int NOT NULL,
	id_entretien int NOT NULL,
	id_repertorie_etat_lieux int NOT NULL,
	id_repertorie_entretien int NOT NULL,
	CONSTRAINT pk_repertorie PRIMARY KEY (id_etat_lieux, id_entretien)
);

CREATE TABLE accessoire (
	id_accessoire int NOT NULL AUTO_INCREMENT,
	lib_accessoire varchar(80) not null,
	prix_journaHT_accessoire double(5,2) not null,
	CONSTRAINT pk_id_accessoire PRIMARY KEY (id_accessoire)
);

CREATE TABLE penalite (
	id_penalite int NOT NULL AUTO_INCREMENT,
	lib_penalite VARCHAR(80) NOT NULL,
	taux_penalite double(6,3) NOT NULL,
	CONSTRAINT pk_id_penalite PRIMARY KEY (id_penalite)
);

CREATE TABLE Agence (
	id_agence int NOT NULL AUTO_INCREMENT,
	lib_agence VARCHAR(80) not null,
	add_agence varchar(250) not null,
	id_agence_vehicule int NOT NULL,
	id_agence_villecp int not null,
	CONSTRAINT pk_id_agence PRIMARY KEY (id_agence)
);

CREATE TABLE pays (
	id_pays int NOT NULL AUTO_INCREMENT,
	nom_pays VARCHAR(30),
	
	CONSTRAINT Pk_pays PRIMARY KEY (id_pays)
);

CREATE TABLE villecp (
	id_villecp int NOT NULL AUTO_INCREMENT,
	ville_villecp varchar(50),
	cp_villecp char (15),
	id_villecp_pays INT NOT NULL,
	
	CONSTRAINT Pk_villecp PRIMARY KEY (id_villecp)
);

CREATE table civilite (
	id_civ int NOT NULL AUTO_INCREMENT,
	lib_civ char(15),
	abb_civ char(4),
	
	CONSTRAINT Pk_civilite PRIMARY KEY (id_civ)
);
	
CREATE TABLE type_permis (
	id_type_permis int NOT NULL AUTO_INCREMENT,
	lib_type_permis varchar (20),

	CONSTRAINT Pk_permis PRIMARY KEY (id_type_permis)
);
	
CREATE TABLE client (
	id_client int NOT NULL AUTO_INCREMENT,
	nom_client varchar(50) NOT null,
	prenom_client varchar(30) NOT null,
	dateN_client date,
	email_client varchar(70),
	tel_client char(15),
	num_permis VARCHAR (20),
	taux_remise double (5,2),
	add_facturation varchar (250) not null,
	add1_client varchar(250) DEFAULT null,
	add2_client varchar(250) DEFAULT null,
	raisonS_societe varchar (50) DEFAULT NULL,
	siret_societe char(14) DEFAULT NULL,
	nomC_societe varchar(50) DEFAULT NULL,
	id_client_civ int NOT NULL,
	id_client_type_permis int NOT NULL, 
	id_client_villecp int NOT NULL,
	
	CONSTRAINT Pk_client PRIMARY KEY (id_client)
);

	CREATE TABLE possesion (
	date_deliv date NOT NULL,
	id_client int NOT NULL,
	id_type_permis int NOT NULL,
	id_possesion_client int NOT NULL,
	id_possesion_type_permis int NOT NULL,
	
	CONSTRAINT Pk_possesion PRIMARY KEY (id_client, id_type_permis)
);
		
CREATE TABLE type_veh(
    id_type_veh int NOT NULL AUTO_INCREMENT,
    lib_type_veh VARCHAR(80) NOT null,
    constraint Pk_id_type_veh primary key (id_type_veh)
);

CREATE TABLE type_carb(
    id_type_carb int NOT NULL AUTO_INCREMENT,
    lib_type_carb VARCHAR(10) NOT null,
    constraint Pk_id_type_carb primary key (id_type_carb)
);

CREATE TABLE nb_bagage(
    id_nbBagage int NOT NULL AUTO_INCREMENT,
    lib_nbBagage VARCHAR(30) NOT null,
    constraint Pk_id_nbBagage primary key (id_nbBagage)
);

CREATE TABLE boiteV(
    id_boiteV int NOT NULL AUTO_INCREMENT,
    lib_boiteV VARCHAR(12) NOT null,
    constraint Pk_id_boiteV primary key (id_boiteV)
);

CREATE TABLE nb_porte(
    id_nbPorte int NOT NULL AUTO_INCREMENT,
    lib_nbPorte VARCHAR(30) NOT null,
    constraint Pk_id_nbPorte primary key (id_nbPorte)
);

create table cat_veh(
	id_cat_veh int NOT NULL AUTO_INCREMENT,
	lib_cat_veh varchar(50) not null,
	constraint Pk_cat_veh primary key (id_cat_veh)
);
	
CREATE TABLE emission(
    id_emission int NOT NULL AUTO_INCREMENT,
    lib_emission VARCHAR(40) NOT null,
    constraint Pk_id_emission primary key (id_emission)
);

CREATE TABLE options_veh(
    id_options int NOT NULL AUTO_INCREMENT,
    lib_options VARCHAR(80) NOT null,
    constraint Pk_id_options primary key (id_options)
);

CREATE TABLE nb_place(
    id_nbPlace int NOT NULL AUTO_INCREMENT,
    lib_nbPlace VARCHAR(40) NOT null,
    constraint Pk_id_nbPlace primary key (id_nbPlace)
);

CREATE TABLE ligne_facture(
    id_ligne_facture int NOT NULL AUTO_INCREMENT,
    ligne_facture_num_fact INT NOT NULL,
    ligne_facture_type_ligneF int not null,
    ligne_facture_tva int NOT NULL,
    constraint Pk_id_ligne_facture primary key (id_ligne_facture)
);

CREATE TABLE tva(
    code_tva int NOT NULL AUTO_INCREMENT,
    tva_lib double(5,3) NOT null,
    constraint Pk_code_tva primary key (code_tva)
);

CREATE TABLE facture(
    num_fact int NOT NULL AUTO_INCREMENT,
    date_fact DATE NOT null,
    num_contrat_loc_facture INT NOT null,
    constraint Pk_num_fact primary key (num_fact)
);

CREATE TABLE entretien(
    id_entretien int NOT NULL AUTO_INCREMENT,
    date_entretien_veh DATE NOT null,
    motif_entretien_veh BLOB(250) NOT null,
    constraint Pk_id_entretien primary key (id_entretien)
);

CREATE TABLE vehicule(
    id_veh int NOT NULL AUTO_INCREMENT,
    immat_veh VARCHAR(20) DEFAULT null,
    dateachat_veh DATE NOT null,
    date_circulation_veh DATE not null,
    puisfisc_veh INT(2) default NULL,
    puismoteur_veh INT(3) default NULL,
    conso_veh DOUBLE(3,1) DEFAULT null,
    prix_journalier_veh DOUBLE(5,2) NOT null,
    id_cat_veh_vehicule INT NOT NULL,
    id_type_veh_vehicule INT NOT NULL,
    id_type_carb_vehicule INT NOT NULL,
    id_nb_bag_vehicule INT NOT NULL,
    id_boiteV_vehicule INT NOT NULL,
    id_nb_porte_vehicule INT NOT NULL,
    id_options_vehicule INT NOT NULL,
    id_emission_vehicule INT NOT NULL,
    id_nb_place_vehicule INT NOT NULL,
    id_marque_vehicule int not null,
    id_modele_vehicule int not null,    
    constraint Pk_id_vehicule primary key (id_veh)  
);

	create table personnel (
	id_pers int NOT NULL AUTO_INCREMENT,
	nom_pers varchar(50) not null,
	prenom_pers varchar(30) not null,
	add1_pers varchar(250) not null,
	add2_pers varchar(250) default null,
	dateN_pers date not null,
	tel1_pers varchar(15) not null,
	tel2_pers varchar(15) default null,
	id_pers_type_pers int not null,
	constraint Pk_personnel primary key(id_pers)
 );
	
	create table type_pers (
	id_type_pers int NOT NULL AUTO_INCREMENT,
	service_type_pers varchar(30) not null,
	fonct_type_pers varchar(30) not null,
	constraint Pk_type_pers primary key(id_type_pers)
);

	create table travaille (
	id_agence int not null,
	id_pers int not null,
	id_travaille_agence int NOT NULL,
	id_travaille_pers int not null,
	constraint Pk_travaille primary key(id_agence, id_pers)
	);
	
	create table intervient (
	statut_entretien boolean,
	id_entretien int not null,
	id_pers int not null,
	id_intervient_entretien int not null,
	id_intervient_pers int not null,
	constraint pk_intervient PRIMARY KEY (id_entretien, id_pers)
	);
	
	create table concerne (
	id_veh int not null,
	id_entretien int not null,
	id_concerne_veh int not null,
	id_concerne_entretien int not null,
	constraint pk_intervient PRIMARY KEY (id_veh, id_entretien)
	);
	
	create table choisit (
	qtite int default null,
	id_contrat_loc int not null,
	id_accessoire int not null,
	id_choisit_contrat_loc int not null,
	id_choisit_accessoire int not null,
	constraint pk_choisit PRIMARY KEY (id_contrat_loc, id_accessoire)
	);
	
	create table applique (
	id_contrat_loc int not null,
	id_penalite int not null,
	id_applique_contrat_loc int not null,
	id_applique_penalite int not null,
	constraint pk_applique PRIMARY KEY (id_contrat_loc, id_penalite)
	);
	
	create table type_ligneF (
	id_type_ligneF int not null auto_increment,
	lib_type_ligneF varchar(100) not null,
	constraint pk_type_ligneF PRIMARY KEY (id_type_ligneF)
	);
	
	create table marque (
	id_marque int not null auto_increment,
	lib_marque varchar(70) not null,
	constraint pk_marque PRIMARY key (id_marque)
	);
	
	create table modele (
	id_modele int not null auto_increment,
	lib_modele varchar(100) not null,
	constraint pk_modele PRIMARY key (id_modele)
	);

	alter table applique
	ADD CONSTRAINT fk_applique_contrat_loc FOREIGN KEY (id_applique_contrat_loc) references contrat_loc (num_contrat_loc),
	ADD constraint fk_applique_penalite FOREIGN KEY (id_applique_penalite) references penalite (id_penalite);
	
	alter table choisit
	ADD CONSTRAINT fk_choisit_contrat_loc FOREIGN KEY (id_choisit_contrat_loc) references contrat_loc (num_contrat_loc),
	ADD constraint fk_choisit_accessoire FOREIGN KEY (id_choisit_accessoire) references accessoire (id_accessoire);

	alter table intervient
	ADD CONSTRAINT fk_intervient_entretien FOREIGN KEY (id_intervient_entretien) references entretien (id_entretien),
	ADD constraint fk_intervient_pers foreign key (id_intervient_pers) references personnel (id_pers);
	
	alter table concerne 
	ADD constraint fk_concerne_veh foreign key (id_concerne_veh) references vehicule (id_veh),
	ADD CONSTRAINT fk_concerne_entretien FOREIGN KEY (id_concerne_entretien) references entretien (id_entretien);

	ALTER TABLE piece
	ADD CONSTRAINT Fk_piece_tva FOREIGN KEY (piece_tva) REFERENCES tva (code_tva);
	
	alter table villecp
	add CONSTRAINT Fk_villecp FOREIGN KEY(id_villecp_pays) REFERENCES pays(id_pays);
	
	alter table client
	add CONSTRAINT Fk_client_civ FOREIGN key (id_client_civ) REFERENCES civilite (id_civ),
	add CONSTRAINT Fk_client_type_permis FOREIGN KEY (id_client_type_permis) REFERENCES type_permis(id_type_permis),
	add CONSTRAINT Fk_client_villecp FOREIGN KEY (id_client_villecp) REFERENCES villecp(id_villecp);
	
	alter table possesion
	add CONSTRAINT Fk_possesion_client FOREIGN KEY (id_possesion_client) REFERENCES client (id_client),
	add CONSTRAINT Fk_possesion_type_permis FOREIGN KEY (id_possesion_type_permis) REFERENCES type_permis (id_type_permis);
	
	alter table contrat_loc
	add	CONSTRAINT fk_id_client FOREIGN KEY(id_contrat_loc_client) REFERENCES client (id_client),
	add CONSTRAINT fk_id_vehicule FOREIGN KEY(id_contrat_loc_vehicule) REFERENCES vehicule (id_veh),
	add CONSTRAINT fk_id_agence FOREIGN KEY(id_contrat_loc_agence) REFERENCES agence (id_agence),
	add CONSTRAINT fk_id_accessoire FOREIGN KEY(id_contrat_loc_accessoire) REFERENCES accessoire (id_accessoire),
	add CONSTRAINT fk_id_penalite FOREIGN KEY(id_contrat_loc_penalite) REFERENCES penalite (id_penalite);
		
	alter table agence
	add CONSTRAINT fk_id_agence_vehicule FOREIGN KEY(id_agence_vehicule) REFERENCES vehicule (id_veh),
	add constraint fk_id_agence_villecp foreign key(id_agence_villecp) references villecp (id_villecp);
	
	alter table etat_lieux
	add CONSTRAINT fk_num_contrat_etat_lieux FOREIGN KEY(num_contrat_etat_lieux) REFERENCES contrat_loc (num_contrat_loc),
	add CONSTRAINT fk_code_type_etat_lieux FOREIGN KEY(code_type_etat_lieux_etat_lieux) REFERENCES type_etat_lieux (code_type_etat_lieux);
	
	alter table ligne_facture
	add constraint Fk_ligne_facture_num_fact foreign key (ligne_facture_num_fact) references facture (num_fact),
	add constraint Fk_ligne_facture_type_ligneF foreign key (ligne_facture_type_ligneF) references type_ligneF (id_type_ligneF),
	add constraint Fk_ligne_facture_tva foreign key (ligne_facture_tva) references tva (code_tva);
		
	alter table facture
	add constraint Fk_num_contrat_loc_facture foreign key (num_contrat_loc_facture) references contrat_loc (num_contrat_loc);
	
	alter table changer
	add constraint Fk_changer_id_entretien foreign key (id_changer_entretien) references entretien (id_entretien),
	add constraint Fk_changer_id_piece foreign key (id_changer_piece) references piece (id_piece);
	
	alter table repertorie

	add constraint Fk_repertorie_etat_lieux foreign key (id_repertorie_etat_lieux) references etat_lieux (id_etat_lieux),
	add constraint Fk_repertorie_id_entretien foreign key (id_repertorie_entretien) references entretien (id_entretien);
	
	alter table vehicule
    add constraint Fk_id_type_veh_vehicule foreign key (id_type_veh_vehicule) references type_veh (id_type_veh),
    add constraint Fk_id_cat_veh_vehicule foreign key (id_cat_veh_vehicule) references cat_veh (id_cat_veh),
    add constraint Fk_id_nb_bag_vehicule foreign key (id_nb_bag_vehicule) references nb_bagage (id_nbBagage),
    add constraint Fk_id_type_carb_vehicule foreign key (id_type_carb_vehicule) references type_carb (id_type_carb),
    add constraint Fk_id_boiteV_vehicule foreign key (id_boiteV_vehicule) references boiteV (id_boiteV),
    add constraint Fk_id_nb_porte_vehicule foreign key (id_nb_porte_vehicule) references nb_porte (id_nbPorte),
    add constraint Fk_id_options_vehicule foreign key (id_options_vehicule) references options_veh (id_options),
    add constraint Fk_id_emission_vehicule foreign key (id_emission_vehicule) references emission (id_emission),
    add constraint Fk_id_nb_place_vehicule foreign key (id_nb_place_vehicule) references nb_place (id_nbPlace),
    add constraint Fk_id_marque_vehicule foreign key (id_marque_vehicule) references marque (id_marque),
    add constraint Fk_id_modele_vehicule foreign key (id_modele_vehicule) references modele (id_modele);
    
    alter table personnel
    add constraint Fk_pers_type_pers foreign key (id_pers_type_pers) references type_pers (id_type_pers);
    
    alter table travaille
    add constraint Fk_travaille_agence foreign key (id_travaille_agence) references agence (id_agence),
    add constraint Fk_travaille_pers foreign key (id_travaille_pers) references personnel (id_pers);