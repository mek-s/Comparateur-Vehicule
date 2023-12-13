CREATE TABLE users(
   user_id INT PRIMARY KEY AUTO_INCREMENT,
   user_nom VARCHAR(50) NOT NULL,
   user_prenom VARCHAR(50) NOT NULL,
   email VARCHAR(100),
   user_role ENUM('admin','user'),
   sexe ENUM('homme','femme'),
   date_naissance DATE,
   status ENUM('bloque','confirme','attente'),
   mdp VARCHAR(50) NOT NULL
);

CREATE TABLE marques(
   marque_id INT PRIMARY KEY AUTO_INCREMENT,
   marque_nom VARCHAR(50) NOT NULL,
   pays_origine VARCHAR(50),
   siege_social VARCHAR(50),
   annee_creation YEAR,
   supp ENUM('0','1'),
   guide_id INT ,
   image_id INT,
   FOREIGN KEY(image_id) REFERENCES images(image_id),
   FOREIGN KEY(guide_id) REFERENCES guides(guide_id)
);

CREATE TABLE modeles(
 modele_id INT PRIMARY KEY AUTO_INCREMENT,
 modele_nom VARCHAR(100),
 marque_id INT NOT NULL,
 supp ENUM('0','1') ,
 FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE versions(
 version_id INT PRIMARY KEY AUTO_INCREMENT,
 version_nom VARCHAR(100),
 modele_id INT NOT NULL,
 date_debut YEAR,
 date_fin YEAR,
 supp ENUM('0','1') ,
 guide_id INT ,
 PRIMARY KEY(version_id,version_nom),
 FOREIGN KEY(guide_id) REFERENCES guides(guide_id),
 FOREIGN KEY(modele_id) REFERENCES modeles(modele_id)
);

CREATE TABLE vehicules(
  vehicule_id INT PRIMARY KEY AUTO_INCREMENT,
  vehicule_nom VARCHAR(100) NOT NULL,
  type ENUM('voiture','moto','camion'),
  version_id INT NOT NULL,
  annee YEAR,
  supp ENUM('0','1') ,
  image_id INT,
  guide_id INT ,
  FOREIGN KEY(image_id) REFERENCES images(image_id),
  FOREIGN KEY(version_id) REFERENCES version(version_id)
);

CREATE TABLE caracteristiques(
 carac_id INT PRIMARY KEY AUTO_INCREMENT,
 carac_nom VARCHAR(40),
);

CREATE TABLE carac_vehicule(
 carac_id INT,
 vehicule_id INT,
 value VARCHAR(60),
 PRIMARY KEY(carac_id,vehicule_id),
 FOREIGN KEY(carac_id) REFERENCES caracteristiques(carac_id),
 FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id)
);

CREATE TABLE comparaisons(
 vehicule_1 INT,
 vehicule_2 INT,
 vehicule_3 INT,
 vehicule_4 INT,
 rech INT ,
 supp ENUM('0','1') ,
 PRIMARY KEY(vehicule_1,vehicule_2)
 FOREIGN KEY(vehicule_1,vehicule_2,vehicule_3,vehicule_4) REFERENCES vehicules(vehicule_id,vehicule_id,vehicule_id,vehicule_id)
);

CREATE TABLE favoris_vehicules(
  user_id INT,
  vehicule_id INT,
  PRIMARY KEY(user_id,vehicule_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id)
);

CREATE TABLE favoris_marques(
  user_id INT,
  marque_id INT,
  PRIMARY KEY(user_id,marque_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE note_vehicules(
  user_id INT,
  vehicule_id INT,
  note FLOAT,
  PRIMARY KEY(user_id,vehicule_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id)
);

CREATE TABLE note_marques(
  user_id INT,
  marque_id INT,
  note FLOAT,
  PRIMARY KEY(user_id,marque_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE avis(
  avis_id INT PRIMARY KEY  AUTO_INCREMENT,
  user_id INT NOT NULL,
  vehicule_id INT,
  marque_id INT,
  status ENUM('ettente','valide'),
  commentaire CHAR,
  supp ENUM('0','1') ,
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id),
  FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE guides(
 guide_id INT PRIMARY KEY AUTO_INCREMENT,
 conseils CHAR,
 supp ENUM('0','1'),
);

CREATE TABLE images(
 image_id INT PRIMARY KEY AUTO_INCREMENT,
 chemin VARCHAR(100),
);

CREATE TABLE news(
 news_id INT PRIMARY KEY AUTO_INCREMENT,
 title VARCHAR(100),
 descprition CHAR,
 supp ENUM('0','1') ,
);

CREATE TABLE pubs(
 pub_id INT PRIMARY KEY AUTO_INCREMENT,
 pub_link INT NOT NULL,
 supp ENUM('0','1') ,
);

CREATE TABLE diaporama(
  diapo_id INT PRIMARY KEY AUTO_INCREMENT,
);

CREATE TABLE style(
 style_id INT PRIMARY KEY AUTO_INCREMENT,
 primary_color VARCHAR(50),
 secondary_color VARCHAR(50),
 teritiary_color VARCHAR(50),
 supp ENUM('0','1') ,
);

CREATE TABLE contacts(
  contact_id int PRIMARY KEY AUTO_INCREMENT,
  contact_nom varchar(100),
  value varchar(100)
);