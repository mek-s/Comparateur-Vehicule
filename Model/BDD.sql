CREATE TABLE users(
   user_id INT PRIMARY KEY AUTO_INCREMENT,
   user_nom VARCHAR(50) NOT NULL,
   user_prenom VARCHAR(50) NOT NULL,
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
   image_id INT,
   guide_id INT,
   FOREIGN KEY(image_id) REFERENCES images(image_id),
   FOREIGN KEY(guide_id) REFERENCES guides(guide_id)
);

CREATE TABLE vehicules(
  vehicule_id INT PRIMARY KEY AUTO_INCREMENT,
  vehicule_nom VARCHAR(100) NOT NULL,
  type ENUM('voiture','moto','camion'),
  marque_id INT NOT NULL,
  modele VARCHAR(50),
  version VARCHAR(50),
  annee YEAR,
  longueur FLOAT,
  largeur FLOAT,
  hauteur FLOAT,
  moteur VARCHAR(50),
  consomation VARCHAR(100),
  performance VARCHAR(100),
  image_id INT,
  guide_id INT ,
  FOREIGN KEY(image_id) REFERENCES images(image_id),
  FOREIGN KEY(marque_id) REFERENCES marques(marque_id),
  FOREIGN KEY(guide_id) REFERENCES guides(guide_id)
);

CREATE TABLE comparaisons(
 vehicule_1 INT,
 vehicule_2 INT,
 vehicule_3 INT,
 vehicule_4 INT,
 rech INT ,
 PRIMARY KEY(vehicule_1,vehicule_2)
 FOREIGN KEY(vehicule_1,vehicule_2,vehicule_3,vehicule_4) REFERENCES vehicules(vehicule_id,vehicule_id,vehicule_id,vehicule_id)
);

CREATE TABLE favoris(
  user_id INT,
  vehicule_id INT,
  PRIMARY KEY(user_id,vehicule_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(vehicule_id) REFERENCES vehicules(vehicule_id)
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

CREATE TABLE guides(
 guide_id INT PRIMARY KEY AUTO_INCREMENT,
 conseils CHAR
);

CREATE TABLE images(
 image_id INT PRIMARY KEY AUTO_INCREMENT,
 chemin VARCHAR(100)
);

CREATE TABLE news(
 news_id INT PRIMARY KEY AUTO_INCREMENT,
 title VARCHAR(100),
 descprition CHAR,
);

CREATE TABLE pubs(
 pub_id INT PRIMARY KEY AUTO_INCREMENT,
 pub_link INT NOT NULL,
);

CREATE TABLE style(
 style_id INT PRIMARY KEY AUTO_INCREMENT,
 primary_color VARCHAR(50),
 secondary_color VARCHAR(50),
 teritiary_color VARCHAR(50)
);