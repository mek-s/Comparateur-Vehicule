INSERT INTO `users`(`user_nom`, `user_prenom`, `email`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES ('Mekki','Soumeya','email1@gmail.com','feminin',2001-12-10,'ettente','12345678');
INSERT INTO `users`(`user_nom`, `user_prenom`, `email`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES ('Mekki','Mohamed','email2@gmail.com','masculin',1991-02-23,'ettente','abc123');
INSERT INTO `users`(`user_nom`, `user_prenom`, `email`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES ('Mekki','Ali','email3@gmail.com','masculin',1981-08-18,'ettente','123abc');
INSERT INTO `admins` (`username`,`pwd`) VALUES ('admin','admin');
/*contact's images*/
INSERT INTO `images`(`chemin`) VALUES ('facebook.png');
INSERT INTO `images`(`chemin`) VALUES ('email.png');
INSERT INTO `images`(`chemin`) VALUES ('instagram.png');
/*marques's images*/
INSERT INTO `images`(`chemin`) VALUES ('ford.png');
INSERT INTO `images`(`chemin`) VALUES ('hyundai.png');
INSERT INTO `images`(`chemin`) VALUES ('skoda.jpg');
INSERT INTO `images`(`chemin`) VALUES ('suzuki.png');
INSERT INTO `images`(`chemin`) VALUES ('toyota.jpg');
/*vehicules's images*/
INSERT INTO `images`(`chemin`) VALUES ('suzuki.png');
INSERT INTO `images`(`chemin`) VALUES ('toyota.png');
INSERT INTO `images`(`chemin`) VALUES ('ford.jpg');
INSERT INTO `images`(`chemin`) VALUES ('hyundai.png');
/*caracteristiques's images*/
INSERT INTO `images` (`chemin`) VALUES ('Price.png'); 
INSERT INTO `images` (`chemin`) VALUES ('Fuel.png'); 
INSERT INTO `images` (`chemin`) VALUES ('Engine.png'); 
INSERT INTO `images` (`chemin`) VALUES ('Transmission.png'); 
INSERT INTO `images` (`chemin`) VALUES ('Conso.png'); 

INSERT INTO `contacts` (`contact_nom`,`value`,`image_id`) VALUES ('facebook','http://www.facebook.com',1);
INSERT INTO `contacts` (`contact_nom`,`value`,`image_id`) VALUES ('email','http://www.gmail.com',2);
INSERT INTO `contacts` (`contact_nom`,`value`,`image_id`) VALUES ('instagram','http://www.intagram.com',3);
/*les marques*/
INSERT INTO `marques` (`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `supp`, `principale`, `guide_id`, `image_id`) VALUES ('Skoda', 'Tchequie', 'Boleslav', '1895', '0', '1', NULL, '11');
INSERT INTO `marques` (`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `supp`, `principale`, `guide_id`, `image_id`) VALUES ('Hyundai', 'États-Unis', 'Californie', '1986', '0', '1', NULL, '10');
INSERT INTO `marques` (`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `supp`, `principale`, `guide_id`, `image_id`) VALUES ('Ford', 'États-Unis', 'Michigan', '1903', '0', '1', NULL, '9');
INSERT INTO `marques` (`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `supp`, `principale`, `guide_id`, `image_id`) VALUES ('Suzuki', 'Japon', 'Hamamatsu', '1909', '0', '1', NULL, '12');
INSERT INTO `marques` (`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `supp`, `principale`, `guide_id`, `image_id`) VALUES ('Toyota', 'Japon', 'Aichi', '1926', '0', '1', NULL, '13'); 
/*Ford*/ 
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Focus', 5, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Escape', 5, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Ranger', 5, 0);
/*Suzuki*/
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Swift', 6, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Vitara', 6, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Jimny', 6, 0);
/*Toyota*/
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Corolla', 7, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('RAV4', 7, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Hilux', 7, 0);
/*Hyundai*/
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('i30', 4, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Kona', 4, 0);
INSERT INTO `modeles` (`modele_nom`, `marque_id`, `supp`) VALUES ('Santa Fe', 4, 0);
/*Skoda*/


/*Focus*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Trend 1.0 EcoBoost', 1, '2020', '2023', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Titanium 1.5 EcoBoost', 1, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('ST 2.3 EcoBoost', 1, '2021', '2023', 0, NULL);
/*Escape*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('S 2.5 Duratec', 2, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SE 1.5 EcoBoost', 2, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Titanium 2.0 EcoBoost', 2, '2021', '2023', 0, NULL);
/*Ranger*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('XL 2.3 EcoBoost', 3, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('XLT 2.0 EcoBlue', 3, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Wildtrak 3.0 Power Stroke', 3, '2021', '2023', 0, NULL);

/*Swift*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('GL 1.2 Dualjet', 4, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('GLX 1.4 Boosterjet', 4, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Sport 1.4 Boosterjet', 4, '2021', '2023', 0, NULL);
/*Vitara*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('GL 1.6 VVT', 5, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SZ-T 1.4 Boosterjet', 5, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SZ5 1.4 Boosterjet', 5, '2021', '2023', 0, NULL);
/*Jimny*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SZ4 1.5', 6, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SZ5 1.5 AllGrip', 6, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Sierra 1.5 AllGrip', 6, '2021', '2023', 0, NULL);

/*Corolla*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('L 1.8L', 7, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('LE 1.8L Hybrid', 7, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('XSE 2.0L', 7, '2021', '2023', 0, NULL);
/*RAV4*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('LE 2.5L', 8, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('XLE 2.5L Hybrid', 8, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Limited 2.5L', 8, '2021', '2023', 0, NULL);
/*Hilux*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SR5 2.8L Diesel', 9, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Invincible X 2.8L Diesel', 9, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Rogue 3.0L Diesel', 9, '2021', '2023', 0, NULL);

/*i30*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SE 1.0 T-GDI', 10, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('N Line 1.5 T-GDI', 10, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Fastback N 2.0 T-GDI', 10, '2021', '2023', 0, NULL);
/*Kona*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SE 2.0L', 11, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SEL 1.6T', 11, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Ultimate 1.6T', 11, '2021', '2023', 0, NULL);
/*Santa Fe*/
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SE 2.4L', 12, '2020', '2022', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('SEL 2.0T', 12, '2019', '2021', 0, NULL);
INSERT INTO `versions` (`version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES ('Limited 2.2 CRDi', 12, '2021', '2023', 0, NULL);

/*Focus*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Trend 1.0 EcoBoost', 'voiture', 1, '2020', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Trend 1.0 EcoBoost', 'voiture', 1, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Trend 1.0 EcoBoost', 'voiture', 1, '2022', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Titanium 1.5 EcoBoost', 'voiture', 2, '2019', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Titanium 1.5 EcoBoost', 'voiture', 2, '2020', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Titanium 1.5 EcoBoost', 'voiture', 2, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus ST 2.3 EcoBoost', 'voiture', 3, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus ST 2.3 EcoBoost', 'voiture', 3, '2022', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus ST 2.3 EcoBoost', 'voiture', 3, '2023', 1, 0, 16, NULL);
/*Escape*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape S 2.5 Duratec', 'voiture', 4, '2020', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape S 2.5 Duratec', 'voiture', 4, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape S 2.5 Duratec', 'voiture', 4, '2022', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape SE 1.5 EcoBoost', 'voiture', 5, '2019', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape SE 1.5 EcoBoost', 'voiture', 5, '2020', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape SE 1.5 EcoBoost', 'voiture', 5, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape Titanium 2.0 EcoBoost', 'voiture', 6, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape Titanium 2.0 EcoBoost', 'voiture', 6, '2022', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape Titanium 2.0 EcoBoost', 'voiture', 6, '2023', 1, 0, 16, NULL);
/*Ranger*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XL 2.3 EcoBoost', 'voiture', 7, '2020', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XL 2.3 EcoBoost', 'voiture', 7, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XL 2.3 EcoBoost', 'voiture', 7, '2022', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XLT 2.0 EcoBlue', 'voiture', 8, '2019', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XLT 2.0 EcoBlue', 'voiture', 8, '2020', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XLT 2.0 EcoBlue', 'voiture', 8, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, '2021', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, '2022', 1, 0, 16, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, '2023', 1, 0, 16, NULL);

/*Swift*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift GL 1.2 Dualjet', 'voiture', 10, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift GL 1.2 Dualjet', 'voiture', 10, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift GL 1.2 Dualjet', 'voiture', 10, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift GLX 1.4 Boosterjet', 'voiture', 11, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift GLX 1.4 Boosterjet', 'voiture', 11, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift GLX 1.4 Boosterjet', 'voiture', 11, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift Sport 1.4 Boosterjet', 'voiture', 12, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift Sport 1.4 Boosterjet', 'voiture', 12, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Swift Sport 1.4 Boosterjet', 'voiture', 12, '2023', 1, 0, NULL, NULL);
/*Vitara*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara GL 1.6 VVT', 'voiture', 13, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara GL 1.6 VVT', 'voiture', 13, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara GL 1.6 VVT', 'voiture', 13, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara SZ-T 1.4 Boosterjet', 'voiture', 14, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara SZ-T 1.4 Boosterjet', 'voiture', 14, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara SZ-T 1.4 Boosterjet', 'voiture', 14, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara SZ5 1.4 Boosterjet', 'voiture', 15, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara SZ5 1.4 Boosterjet', 'voiture', 15, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Vitara SZ5 1.4 Boosterjet', 'voiture', 15, '2023', 1, 0, NULL, NULL);
/*Jimny*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny SZ4 1.5', 'voiture', 16, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny SZ4 1.5', 'voiture', 16, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny SZ4 1.5', 'voiture', 16, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny SZ5 1.5 AllGrip', 'voiture', 17, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny SZ5 1.5 AllGrip', 'voiture', 17, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny SZ5 1.5 AllGrip', 'voiture', 17, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny Sierra 1.5 AllGrip', 'voiture', 18, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny Sierra 1.5 AllGrip', 'voiture', 18, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Jimny Sierra 1.5 AllGrip', 'voiture', 18, '2023', 1, 0, NULL, NULL);

/*i10*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 SE 1.0 T-GDI', 'voiture', 19, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 SE 1.0 T-GDI', 'voiture', 19, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 SE 1.0 T-GDI', 'voiture', 19, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 N Line 1.5 T-GDI', 'voiture', 20, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 N Line 1.5 T-GDI', 'voiture', 20, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 N Line 1.5 T-GDI', 'voiture', 20, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 Fastback N 2.0 T-GDI', 'voiture', 21, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 Fastback N 2.0 T-GDI', 'voiture', 21, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('i10 Fastback N 2.0 T-GDI', 'voiture', 21, '2023', 1, 0, NULL, NULL);
/*Kona*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona SE 2.0L', 'voiture', 22, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona SE 2.0L', 'voiture', 22, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona SE 2.0L', 'voiture', 22, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona SEL 1.6T', 'voiture', 23, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona SEL 1.6T', 'voiture', 23, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona SEL 1.6T', 'voiture', 23, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona Ultimate 1.6T', 'voiture', 24, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona Ultimate 1.6T', 'voiture', 24, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Kona Ultimate 1.6T', 'voiture', 24, '2023', 1, 0, NULL, NULL);
/*Santa Fe*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe SE 2.4L', 'voiture', 25, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe SE 2.4L', 'voiture', 25, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe SE 2.4L', 'voiture', 25, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe SEL 2.0T', 'voiture', 26, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe SEL 2.0T', 'voiture', 26, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe SEL 2.0T', 'voiture', 26, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe Limited 2.2 CRDi', 'voiture', 27, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe Limited 2.2 CRDi', 'voiture', 27, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Santa Fe Limited 2.2 CRDi', 'voiture', 27, '2023', 1, 0, NULL, NULL);

/*Notes marques*/
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('1', '3', '3.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('2', '3', '2.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('3', '3', '4');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('1', '4', '2.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('2', '4', '3');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('3', '4', '3.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('1', '5', '5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('2', '5', '4');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('3', '5', '4.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('1', '6', '1.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('2', '6', '2.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('3', '6', '3.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('1', '7', '3');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('2', '7', '3.5');
INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES ('3', '7', '5');




/*Notes vehicules*/
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 1, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 4, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 7, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 10, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 13, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 16, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 19, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 21, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 24, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 27, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 30, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 33, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 36, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 39, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 41, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 44, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 47, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 50, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 53, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 56, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 59, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 61, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 64, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 67, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 70, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 73, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 76, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 79, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 81, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (3, 20, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (1, 40, 4);
INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES (2, 55, 4);

INSERT INTO `caracteristiques` (`carac_nom`, `unite_mesure`, `image_id`) VALUES ('Type Moteur', '', 20);
INSERT INTO `caracteristiques` (`carac_nom`, `unite_mesure`, `image_id`) VALUES ('Consommation', 'kpl', 22);
INSERT INTO `caracteristiques` (`carac_nom`, `unite_mesure`, `image_id`) VALUES ('Transmission', '', 21);
INSERT INTO `caracteristiques` (`carac_nom`, `unite_mesure`, `image_id`) VALUES ('Type Essance', '', 19);
INSERT INTO `caracteristiques` (`carac_nom`, `unite_mesure`, `image_id`) VALUES ('Prix', 'dzd', 18);

INSERT INTO `categories` (`categ_nom`) VALUES ('Motor'), ('Dimensions') , ('Autre'); 

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 1, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 1, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 1, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 1, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 1, '150 000 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 7, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 7, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 7, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 7, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 7, '900 500 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 13, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 13, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 13, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 13, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 13, '879 560 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 19, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 19, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 19, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 19, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 19, '675 990 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 5, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 5, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 5, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 5, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 5, '289 350 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 20, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 20, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 20, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 20, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 20, '379 560 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 25, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 25, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 25, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 25, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 25, '479 560 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 37, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 37, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 37, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 37, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 37, '579 960 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 43, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 43, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 43, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 43, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 43, '679 860 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 49, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 49, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 49, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 49, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 49, '829 760 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 3, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 3, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 3, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 3, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 3, '839 660 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 61, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 61, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 61, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 61, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 61, '849 560 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 10, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 10, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 10, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 10, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 10, '859 460 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 40, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 40, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 40, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 40, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 40, '869 360 000');

INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (1, 9, 'Electric');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (2, 9, '10.13');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (3, 9, 'Automatic');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (4, 9, 'Diesel');
INSERT INTO `carac_vehicule`  (`carac_id`, `vehicule_id`, `value`) VALUES (7, 9, '889 260 000');


INSERT INTO `news` (`title`, `descprition`, `subtitle`, `supp`) VALUES ('Hyundai Creta facelift officially revealed ahead of January 16 launch', 'Ahead of its launch on January 16, Hyundai has revealed the exterior of the Creta facelift. The Korean brand has been drip-feeding information about the Creta facelift, which will debut in India first and then be introduced in other international markets. Deliveries for the updated Creta are expected to start by the end of this month.\r\n\r\n Creta facelift gets India-specific design tweaks\r\n Gets more tech including ADAS bundle\r\n New 160hp, 1.5-litre turbo-petrol added to line-up.\r\n\r\nUp front, the Creta facelift’s styling is unique for a Hyundai SUV in India, but it does get a few familiar design cues seen on Hyundai models internationally. The nose is even more upright than before and gets a decent mix of chrome, brushed aluminium, a piano-black finish and LED lighting. Speaking of LED lights, it gets four inverted L-shaped daytime running lamps on the corners, along with an LED light bar that’s placed above the wide grille.\r\n\r\nAt the rear, the LED light bar setup and tail-lamp design resemble the ones upfront, which helps to keep design elements uniform. The rear bumper is new as well and so is the tailgate design – all this combined gives quite a fresh look to Hyundai’s popular SUV. There aren’t many changes seen on the sides save for all-new alloy wheel designs with 17- or 18-inch wheel options, depending on the variant.', 'Creta facelift gets fresh exterior and interior looks, a new turbo-petrol engine and more tech.', '0') 