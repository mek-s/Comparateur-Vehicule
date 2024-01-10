CREATE TABLE IF NOT EXISTS users(
   user_id INT PRIMARY KEY AUTO_INCREMENT,
   user_nom VARCHAR(50) NOT NULL,
   user_prenom VARCHAR(50) NOT NULL,
   email VARCHAR(100) UNIQUE,
   sexe ENUM('masculin','feminin'),
   date_naissance DATE,
   status ENUM('bloque','confirme','attente'),
   mdp VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS admins(
  username VARCHAR(60),
  pwd VARCHAR(20) NOT NULL,
   PRIMARY KEY(username)
);

CREATE TABLE IF NOT EXISTS marques(
   marque_id INT PRIMARY KEY AUTO_INCREMENT,
   marque_nom VARCHAR(50) NOT NULL,
   pays_origine VARCHAR(50),
   siege_social VARCHAR(50),
   annee_creation YEAR,
   supp BOOLEAN,
   principale BOOLEAN,
   guide_id INT ,
   image_id INT,
   FOREIGN KEY(image_id) REFERENCES images(image_id),
   FOREIGN KEY(guide_id) REFERENCES guides(guide_id)
);

CREATE TABLE IF NOT EXISTS modeles(
 modele_id INT PRIMARY KEY AUTO_INCREMENT,
 modele_nom VARCHAR(100),
 marque_id INT NOT NULL,
 supp BOOLEAN ,
 FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE IF NOT EXISTS versions(
 version_id INT AUTO_INCREMENT,
 version_nom VARCHAR(100),
 modele_id INT NOT NULL,
 date_debut YEAR,
 date_fin YEAR,
 supp BOOLEAN ,
 guide_id INT ,
 PRIMARY KEY(version_id,version_nom),
 FOREIGN KEY(guide_id) REFERENCES guides(guide_id),
 FOREIGN KEY(modele_id) REFERENCES modeles(modele_id)
);

CREATE TABLE IF NOT EXISTS vehicules(
  vehicule_id INT PRIMARY KEY AUTO_INCREMENT,
  vehicule_nom VARCHAR(100) NOT NULL,
  type ENUM('voiture','moto','camion'),
  version_id INT NOT NULL,
  annee YEAR,
  principal BOOLEAN,
  supp BOOLEAN ,
  image_id INT,
  guide_id INT,
  FOREIGN KEY(image_id) REFERENCES images(image_id),
  FOREIGN KEY(version_id) REFERENCES version(version_id)
);

CREATE TABLE IF NOT EXISTS caracteristiques(
 carac_id INT PRIMARY KEY AUTO_INCREMENT,
 carac_nom VARCHAR(40),
 unite_mesure VARCHAR(10),
 categ_id INT,
 image_id INT ,
 FOREIGN KEY(image_id) REFERENCES images(image_id),
 FOREIGN KEY(categ_id) REFERENCES categories(categ_id)
);

CREATE TABLE IF NOT EXISTS categories(
categ_id INT PRIMARY KEY AUTO_INCREMENT,
categ_nom VARCHAR(40)
);

CREATE TABLE IF NOT EXISTS carac_vehicule(
 carac_id INT,
 vehicule_id INT,
 value VARCHAR(60),
 PRIMARY KEY(carac_id,vehicule_id),
 FOREIGN KEY(carac_id) REFERENCES caracteristiques(carac_id),
 FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id)
);

CREATE TABLE IF NOT EXISTS comparaisons(
 vehicule_1 INT,
 vehicule_2 INT,
 vehicule_3 INT,
 vehicule_4 INT,
 rech INT ,
 supp BOOLEAN ,
 PRIMARY KEY(vehicule_1,vehicule_2),
 FOREIGN KEY(vehicule_1,vehicule_2,vehicule_3,vehicule_4) REFERENCES vehicules(vehicule_id,vehicule_id,vehicule_id,vehicule_id)
);

CREATE TABLE IF NOT EXISTS favoris_vehicules(
  user_id INT,
  vehicule_id INT,
  PRIMARY KEY(user_id,vehicule_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id)
);

CREATE TABLE IF NOT EXISTS favoris_marques(
  user_id INT,
  marque_id INT,
  PRIMARY KEY(user_id,marque_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE IF NOT EXISTS note_vehicules(
  user_id INT,
  vehicule_id INT,
  note FLOAT,
  PRIMARY KEY(user_id,vehicule_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id)
);

CREATE TABLE IF NOT EXISTS note_marques(
  user_id INT,
  marque_id INT,
  note FLOAT,
  PRIMARY KEY(user_id,marque_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE IF NOT EXISTS avis(
  avis_id INT PRIMARY KEY  AUTO_INCREMENT,
  user_id INT NOT NULL,
  vehicule_id INT,
  marque_id INT,
  status ENUM('ettente','valide'),
  commentaire CHAR,
  supp BOOLEAN ,
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id),
  FOREIGN KEY(marque_id) REFERENCES marques(marque_id)
);

CREATE TABLE IF NOT EXISTS guides(
 guide_id INT PRIMARY KEY AUTO_INCREMENT,
 conseils CHAR,
 supp BOOLEAN
);

CREATE TABLE IF NOT EXISTS images(
 image_id INT PRIMARY KEY AUTO_INCREMENT,
 chemin VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS news(
 news_id INT PRIMARY KEY AUTO_INCREMENT,
 title VARCHAR(100),
 descprition CHAR,
 supp BOOLEAN
);

CREATE TABLE IF NOT EXISTS pubs(
 pub_id INT PRIMARY KEY AUTO_INCREMENT,
 pub_link INT NOT NULL,
 supp BOOLEAN
);

CREATE TABLE IF NOT EXISTS diaporama(
  diapo_id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE IF NOT EXISTS style(
 style_id INT PRIMARY KEY AUTO_INCREMENT,
 primary_color VARCHAR(50),
 secondary_color VARCHAR(50),
 teritiary_color VARCHAR(50),
 supp BOOLEAN
);

CREATE TABLE IF NOT EXISTS contacts(
  contact_id int PRIMARY KEY AUTO_INCREMENT,
  contact_nom varchar(100),
  value varchar(100),
  image_id INT,
  FOREIGN KEY(image_id) REFERENCES images(image_id)
);