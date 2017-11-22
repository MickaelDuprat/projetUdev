DROP database projetudev;
create database projetudev;
use projetudev;
set names 'utf8';

create table contrat_loc (
	num_contrat_loc int NOT NULL AUTO_INCREMENT,
	date_contrat date not null,
	date_debut date NOT NULL,
	date_fin date NOT NULL,
	caution double(6,2) NOT NULL,
	statut_facturation boolean NOT NULL,
	id_contrat_loc_client int NOT NULL,
	id_contrat_loc_vehicule int NOT NULL,
	id_contrat_loc_agence int NOT NULL,
	id_contrat_loc_accessoire int NOT NULL,
	CONSTRAINT pk_num_contrat Primary key (num_contrat_loc)
);

create table service (
	id_service int not null auto_increment,
	lib_service varchar(50) default null,
	CONSTRAINT pk_id_service Primary key (id_service)
);

create table fonction_pers (
	id_fonction_pers int not null auto_increment,
	lib_fonction_pers varchar(50) default null,
	id_service_fonction_pers int not null,
	CONSTRAINT pk_id_fonction_pers Primary key (id_fonction_pers)
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
	date_entree_etat_lieux date not null,
	km_depart int(6) default null,
	km_arrive int(6) default null,
	date_sortie_etat_lieux date default null,
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
	qte_piece int not null,
	pk_id_entretien int NOT NULL,
	pk_id_piece int NOT NULL,
	id_changer_entretien int NOT NULL,
	id_changer_piece int NOT NULL,
	CONSTRAINT pk_changer PRIMARY KEY (pk_id_entretien, pk_id_piece)
);

CREATE TABLE repertorie (
	qtite_piece int default null,
	pk_id_etat_lieux int NOT NULL,
	pk_id_entretien int NOT NULL,
	id_repertorie_etat_lieux int NOT NULL,
	id_repertorie_entretien int NOT NULL,
	CONSTRAINT pk_repertorie PRIMARY KEY (pk_id_etat_lieux, pk_id_entretien)
);

CREATE TABLE accessoire (
	id_accessoire int NOT NULL AUTO_INCREMENT,
	lib_accessoire varchar(50) not null,
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
	id_agence_villecp int not null,
	CONSTRAINT pk_id_agence PRIMARY KEY (id_agence)
);

CREATE TABLE pays (
	id_pays int NOT NULL AUTO_INCREMENT,
	nom_pays VARCHAR(60),
	
	CONSTRAINT Pk_pays PRIMARY KEY (id_pays)
);

CREATE TABLE villecp (
	id_villecp int NOT NULL AUTO_INCREMENT,
	ville_villecp varchar(50),
	cp_villecp char (5),
	id_villecp_pays INT NOT NULL,
	
	CONSTRAINT Pk_villecp PRIMARY KEY (id_villecp)
);

CREATE table civilite (
	id_civ int NOT NULL AUTO_INCREMENT,
	lib_civ char(15),
	abb_civ char(4),
	
	CONSTRAINT Pk_civilite PRIMARY KEY (id_civ)
);
	
CREATE TABLE client (
	id_client int NOT NULL AUTO_INCREMENT,
	nom_client varchar(50) NOT null,
	prenom_client varchar(30) NOT null,
	dateN_client date,
	email_client varchar(70),
	tel_client char(15),
	taux_remise double (5,2),
	add_facturation varchar (250) not null,
	add1_client varchar(250) DEFAULT null,
	add2_client varchar(250) DEFAULT null,
	raisonS_societe varchar (50) DEFAULT NULL,
	siret_societe char(18) DEFAULT NULL,
	nomC_societe varchar(50) DEFAULT NULL,
	id_client_civ int NOT NULL,
	id_client_villecp int NOT NULL,
	CONSTRAINT Pk_client PRIMARY KEY (id_client)
);

create table statut_membre(
	id_statut_membre int not null auto_increment,
	lib_statut_membre varchar(50) not null,
	CONSTRAINT Pk_statut_membre PRIMARY KEY (id_statut_membre)
);

CREATE TABLE membre(
    id_membre int NOT NULL AUTO_INCREMENT,
    login_membre VARCHAR(60) NOT null,
    password_membre VARCHAR(60) NOT null,
    id_membre_client int NOT NULL,
    id_membre_statut_membre int not null,
    constraint Pk_id_membre primary key (id_membre)
);

CREATE TABLE type_carb(
    id_type_carb int NOT NULL AUTO_INCREMENT,
    lib_type_carb VARCHAR(30) NOT null,
    constraint Pk_id_type_carb primary key (id_type_carb)
);

CREATE TABLE boiteV(
    id_boiteV int NOT NULL AUTO_INCREMENT,
    lib_boiteV VARCHAR(30) NOT null,
    constraint Pk_id_boiteV primary key (id_boiteV)
);

create table cat_veh(
	id_cat_veh int NOT NULL AUTO_INCREMENT,
	lib_cat_veh varchar(50) not null,
	constraint Pk_cat_veh primary key (id_cat_veh)
);
	
CREATE TABLE clim_veh(
    id_clim_veh int NOT NULL AUTO_INCREMENT,
    lib_clim_veh VARCHAR(30) NOT null,
    constraint Pk_id_clim_veh primary key (id_clim_veh)
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
    id_penalite_facture int NOT NULL,
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
    immat_veh VARCHAR(20) not null,
    dateachat_veh DATE NOT null,
    date_circulation_veh DATE not null,
    puisfisc_veh INT(2) default NULL,
    puismoteur_veh INT(3) default NULL,
    conso_veh DOUBLE(3,1) DEFAULT null,
    volume_coffre_veh double(3,1) DEFAULT null,
    nbre_bagage_veh int(2) default null,
    nbre_passager_veh int(2) default null,
    nbre_portes_veh int(2) default null,
    emissionCO2_veh int(3) default null,
    cylindree_moto_veh int(4) default null,
    prix_journalier_veh DOUBLE(5,2) NOT null,
    id_cat_veh_vehicule INT NOT NULL,
    id_type_carb_vehicule INT NOT NULL,
    id_boiteV_vehicule INT NOT NULL,
    id_clim_veh_vehicule INT NOT NULL,    
    id_modele_vehicule int not null,
    id_agence_vehicule int NOT NULL,
    constraint Pk_id_vehicule primary key (id_veh)  
);

	create table personnel (
	id_pers int NOT NULL AUTO_INCREMENT,
	nom_pers varchar(50) not null,
	prenom_pers varchar(30) not null,
	dateN_pers date not null,
	add1_pers varchar(250) not null,
	add2_pers varchar(250) default null,
	tel1_pers varchar(15) not null,
	tel2_pers varchar(15) default null,
	id_fonction_pers_personnel int not null,
	id_villecp_personnel int not null,
	constraint Pk_personnel primary key(id_pers)
 );

	create table travaille (
	pk_id_agence int not null,
	pk_id_pers int not null,
	id_travaille_agence int NOT NULL,
	id_travaille_pers int not null,
	constraint Pk_travaille primary key(pk_id_agence, pk_id_pers)
	);
	
	create table intervient (
	statut_entretien boolean not null,
	pk_id_entretien int not null,
	pk_id_pers int not null,
	id_intervient_entretien int not null,
	id_intervient_pers int not null,
	constraint pk_intervient PRIMARY KEY (pk_id_entretien, pk_id_pers)
	);
	
	create table concerne (
	pk_id_veh int not null,
	pk_id_entretien int not null,
	id_concerne_veh int not null,
	id_concerne_entretien int not null,
	constraint pk_intervient PRIMARY KEY (pk_id_veh, pk_id_entretien)
	);
	
	create table choisit (
	qtite int default null,
	pk_id_contrat_loc int not null,
	pk_id_accessoire int not null,
	id_choisit_contrat_loc int not null,
	id_choisit_accessoire int not null,
	constraint pk_choisit PRIMARY KEY (pk_id_contrat_loc, pk_id_accessoire)
	);
	
	create table applique (
	pk_num_fact int not null,
	pk_id_penalite int not null,
	id_applique_facture int not null,
	id_applique_penalite int not null,
	constraint pk_applique PRIMARY KEY (pk_num_fact, pk_id_penalite)
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
	id_marque_modele int not null,
	path_img varchar(60) default null,
	constraint pk_modele PRIMARY key (id_modele)
	);

	alter table applique
	ADD CONSTRAINT fk_applique_facture FOREIGN KEY (id_applique_facture) references facture (num_fact),
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
	add CONSTRAINT Fk_client_villecp FOREIGN KEY (id_client_villecp) REFERENCES villecp(id_villecp);
	
	alter table contrat_loc
	add	CONSTRAINT fk_id_client FOREIGN KEY(id_contrat_loc_client) REFERENCES client (id_client),
	add CONSTRAINT fk_id_vehicule FOREIGN KEY(id_contrat_loc_vehicule) REFERENCES vehicule (id_veh),
	add CONSTRAINT fk_id_agence FOREIGN KEY(id_contrat_loc_agence) REFERENCES agence (id_agence),
	add CONSTRAINT fk_id_accessoire FOREIGN KEY(id_contrat_loc_accessoire) REFERENCES accessoire (id_accessoire);
		
	alter table agence
	add constraint fk_id_agence_villecp foreign key(id_agence_villecp) references villecp (id_villecp);
	
	alter table etat_lieux
	add CONSTRAINT fk_num_contrat_etat_lieux FOREIGN KEY(num_contrat_etat_lieux) REFERENCES contrat_loc (num_contrat_loc),
	add CONSTRAINT fk_code_type_etat_lieux FOREIGN KEY(code_type_etat_lieux_etat_lieux) REFERENCES type_etat_lieux (code_type_etat_lieux);
	
	alter table ligne_facture
	add constraint Fk_ligne_facture_num_fact foreign key (ligne_facture_num_fact) references facture (num_fact),
	add constraint Fk_ligne_facture_type_ligneF foreign key (ligne_facture_type_ligneF) references type_ligneF (id_type_ligneF),
	add constraint Fk_ligne_facture_tva foreign key (ligne_facture_tva) references tva (code_tva);
		
	alter table facture
	add constraint Fk_num_contrat_loc_facture foreign key (num_contrat_loc_facture) references contrat_loc (num_contrat_loc),
	add constraint Fk_id_penalite_facture foreign key (id_penalite_facture) references penalite (id_penalite);
	
	alter table changer
	add constraint Fk_changer_id_entretien foreign key (id_changer_entretien) references entretien (id_entretien),
	add constraint Fk_changer_id_piece foreign key (id_changer_piece) references piece (id_piece);
	
	alter table repertorie
	add constraint Fk_repertorie_etat_lieux foreign key (id_repertorie_etat_lieux) references etat_lieux (id_etat_lieux),
	add constraint Fk_repertorie_id_entretien foreign key (id_repertorie_entretien) references entretien (id_entretien);
	
	alter table vehicule
    add constraint Fk_id_cat_veh_vehicule foreign key (id_cat_veh_vehicule) references cat_veh (id_cat_veh),
    add constraint Fk_id_type_carb_vehicule foreign key (id_type_carb_vehicule) references type_carb (id_type_carb),
    add constraint Fk_id_boiteV_vehicule foreign key (id_boiteV_vehicule) references boiteV (id_boiteV),
    add constraint Fk_id_clim_vehicule foreign key (id_clim_veh_vehicule) references clim_veh (id_clim_veh),
    add constraint Fk_id_modele_vehicule foreign key (id_modele_vehicule) references modele (id_modele),
    add CONSTRAINT fk_id_agence_vehicule FOREIGN KEY(id_agence_vehicule) REFERENCES agence (id_agence);
    
    alter table modele
	add constraint Fk_marque_modele foreign key (id_marque_modele) references marque (id_marque);
	
    alter table personnel
    add constraint Fk_id_fonction_pers_personnel foreign key (id_fonction_pers_personnel) references fonction_pers (id_fonction_pers),
	add constraint Fk_id_villecp_personnel foreign key (id_villecp_personnel) references villecp (id_villecp);
   
    alter table travaille
    add constraint Fk_travaille_agence foreign key (id_travaille_agence) references agence (id_agence),
    add constraint Fk_travaille_pers foreign key (id_travaille_pers) references personnel (id_pers);
    
    alter table fonction_pers
    add constraint Fk_id_service_fonction_pers foreign key (id_service_fonction_pers) references service (id_service);
    
    alter table membre
	add CONSTRAINT Fk_id_membre_client FOREIGN key (id_membre_client) REFERENCES client (id_client),
	add CONSTRAINT Fk_id_membre_statut_membre FOREIGN key (id_membre_statut_membre) REFERENCES statut_membre (id_statut_membre);
    