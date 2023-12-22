INSERT INTO `users`(`user_nom`, `user_prenom`, `email`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES ('Mekki','Soumeya','email1@gmail.com','feminin',2001-12-10,'ettente','12345678');
INSERT INTO `users`(`user_nom`, `user_prenom`, `email`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES ('Mekki','Mohamed','email2@gmail.com','masculin',1991-02-23,'ettente','abc123');
INSERT INTO `users`(`user_nom`, `user_prenom`, `email`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES ('Mekki','Ali','email3@gmail.com','masculin',1981-08-18,'ettente','123abc');
INSERT INTO `admins` (`username`,`pwd`) VALUES ('admin','admin');
INSERT INTO `images`(`chemin`) VALUES ('facebook.png');
INSERT INTO `images`(`chemin`) VALUES ('email.png');
INSERT INTO `images`(`chemin`) VALUES ('instagram.png');
INSERT INTO `images`(`chemin`) VALUES ('ford.png');
INSERT INTO `images`(`chemin`) VALUES ('hyundai.png');
INSERT INTO `images`(`chemin`) VALUES ('skoda.jpg');
INSERT INTO `images`(`chemin`) VALUES ('suzuki.png');
INSERT INTO `images`(`chemin`) VALUES ('toyota.jpg');
INSERT INTO `contacts` (`contact_nom`,`value`,`image_id`) VALUES ('facebook','facebook.com',1);
INSERT INTO `contacts` (`contact_nom`,`value`,`image_id`) VALUES ('email','gmail.com',2);
INSERT INTO `contacts` (`contact_nom`,`value`,`image_id`) VALUES ('instagram','intagram.com',3);
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
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Trend 1.0 EcoBoost', 'voiture', 1, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Trend 1.0 EcoBoost', 'voiture', 1, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Trend 1.0 EcoBoost', 'voiture', 1, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Titanium 1.5 EcoBoost', 'voiture', 2, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Titanium 1.5 EcoBoost', 'voiture', 2, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus Titanium 1.5 EcoBoost', 'voiture', 2, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus ST 2.3 EcoBoost', 'voiture', 3, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus ST 2.3 EcoBoost', 'voiture', 3, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Focus ST 2.3 EcoBoost', 'voiture', 3, '2023', 1, 0, NULL, NULL);
/*Escape*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape S 2.5 Duratec', 'voiture', 4, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape S 2.5 Duratec', 'voiture', 4, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape S 2.5 Duratec', 'voiture', 4, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape SE 1.5 EcoBoost', 'voiture', 5, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape SE 1.5 EcoBoost', 'voiture', 5, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape SE 1.5 EcoBoost', 'voiture', 5, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape Titanium 2.0 EcoBoost', 'voiture', 6, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape Titanium 2.0 EcoBoost', 'voiture', 6, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Escape Titanium 2.0 EcoBoost', 'voiture', 6, '2023', 1, 0, NULL, NULL);
/*Ranger*/
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XL 2.3 EcoBoost', 'voiture', 7, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XL 2.3 EcoBoost', 'voiture', 7, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XL 2.3 EcoBoost', 'voiture', 7, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XLT 2.0 EcoBlue', 'voiture', 8, '2019', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XLT 2.0 EcoBlue', 'voiture', 8, '2020', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger XLT 2.0 EcoBlue', 'voiture', 8, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, '2021', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, '2022', 1, 0, NULL, NULL);
INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES ('Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, '2023', 1, 0, NULL, NULL);

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