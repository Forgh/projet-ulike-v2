CREATE TABLE membres (
id_membre int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
pseudo_membre varchar(25) CHARACTER SET UTF8 COLLATE utf8_general_ci NOT NULL UNIQUE,
passwd_membre varchar(100) NOT NULL,
email_membre varchar(50) NOT NULL,
confirmed_email TINYINT(1) NOT NULL DEFAULT 0,
nom_membre varchar (20),
prenom_membre varchar(20),
date_naissance_membre DATE,
sexe_membre varchar(1) NOT NULL,
CONSTRAINT pk_membres PRIMARY KEY (id_membre))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;


CREATE TABLE entreprises (
id_entreprise int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
nom_entreprise varchar(75) NOT NULL,
passwd_entreprise varchar(100) NOT NULL,
siren_entreprise integer(9) NOT NULL,
nom_gerant varchar(25) NOT NULL,
adresse_entreprise varchar(100) NOT NULL,
code_postal_entreprise int(5) NOT NULL,
pays_entreprise varchar(10) NOT NULL,
email_entreprise varchar(50) NOT NULL,
confirmed_email TINYINT(1) NOT NULL DEFAULT 0,
CONSTRAINT pk_entreprises PRIMARY KEY (id_entreprise))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;


CREATE TABLE categories (
id_cat int(3) UNSIGNED NOT NULL AUTO_INCREMENT,
nom_categorie varchar(25) NOT NULL UNIQUE,
CONSTRAINT pk_categories PRIMARY KEY (id_cat))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;


CREATE TABLE objets (
id_objet int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
nom_objet varchar(50) NOT NULL UNIQUE,
nom_proprietaire varchar(25) NOT NULL,
categorie_objet varchar(25) NOT NULL,
description_objet text(1000),
img_objet varchar(75) CHARACTER SET UTF8 COLLATE utf8_general_ci NOT NULL UNIQUE,
CONSTRAINT pk_objets PRIMARY KEY (id_objet),
INDEX (categorie_objet),
CONSTRAINT fk_categorie_objet FOREIGN KEY (categorie_objet) REFERENCES categories(nom_categorie))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;


CREATE TABLE notes (
id_note int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
nom_objet_source varchar(50) NOT NULL ,
commentaire text(1000),
pseudo_auteur varchar(25) CHARACTER SET UTF8 COLLATE utf8_general_ci,
CONSTRAINT pk_notes PRIMARY KEY (id_note),
INDEX (pseudo_auteur),
INDEX (nom_objet_source),
CONSTRAINT fk_notes_nomobjetsource FOREIGN KEY (nom_objet_source) REFERENCES objets(nom_objet) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_notes_auteur FOREIGN KEY (pseudo_auteur) REFERENCES membres(pseudo_membre))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;

CREATE TABLE likes (
id_like int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
contenu_like varchar(25) NOT NULL,
origine_like int(6) UNSIGNED NOT NULL,
type_like TINYINT(1),
CONSTRAINT pk_likes PRIMARY KEY (id_like),
INDEX (origine_like),
CONSTRAINT fk_likes_origine FOREIGN KEY (origine_like) REFERENCES notes(id_note) ON DELETE CASCADE ON UPDATE CASCADE)
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;

INSERT INTO categories (nom_categorie) VALUES ('Image/Son');
INSERT INTO categories (nom_categorie) VALUES ('Electroménager');
INSERT INTO categories (nom_categorie) VALUES ('Smartphones');
INSERT INTO categories (nom_categorie) VALUES ('Automobile');
INSERT INTO categories (nom_categorie) VALUES ('Equipement Informatique');