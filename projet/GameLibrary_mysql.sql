CREATE TABLE `Jeu_Video` (
  `id` int PRIMARY KEY,
  `nom` varchar(255),
  `date_de_sortie` date,
  `description` text,
  `genres` varchar(255),
  `evaluation` float,
  `mode_multijoueur` boolean,
  `plateformes` varchar(255),
  `versions` varchar(255),
  `cover_image_url` varchar(255),
  `editeur_id` int,
  `developpeur_id` int,
  `type` varchar(255)
);

CREATE TABLE `Plateforme` (
  `id` int PRIMARY KEY,
  `nom` varchar(255),
  `fabricant_id` int,
  `date_de_sortie` date,
  `type` varchar(255),
  `generation` int
);

CREATE TABLE `Fabricant` (
  `id` int PRIMARY KEY,
  `nom` varchar(255),
  `pays` varchar(255),
  `annee_de_creation` int
);

CREATE TABLE `Editeur` (
  `id` int PRIMARY KEY,
  `nom` varchar(255),
  `pays` varchar(255),
  `annee_de_creation` int
);

CREATE TABLE `Developpeur` (
  `id` int PRIMARY KEY,
  `nom` varchar(255),
  `pays` varchar(255),
  `annee_de_creation` int
);

CREATE TABLE `Utilisateur` (
  `id` int PRIMARY KEY,
  `nom_d_utilisateur` varchar(255),
  `email` varchar(255),
  `mot_de_passe` varchar(255),
  `avatar_url` varchar(255),
  `date_inscription` date
);

CREATE TABLE `Commentaire` (
  `id` int PRIMARY KEY,
  `contenu` text,
  `date` date,
  `utilisateur_id` int,
  `jeu_id` int
);

CREATE TABLE `Utilisateur_Jeu_Favoris` (
  `utilisateur_id` int,
  `jeu_id` int,
  `primary` key(utilisateur_id,jeu_id)
);

CREATE TABLE `Utilisateur_Plateforme_Favoris` (
  `utilisateur_id` int,
  `plateforme_id` int,
  `primary` key(utilisateur_id,plateforme_id)
);

CREATE TABLE `Jeu_Video_Genre` (
  `jeu_id` int,
  `genre` varchar(255),
  `primary` key(jeu_id,genre)
);

CREATE TABLE `Jeu_Video_Plateforme` (
  `jeu_id` int,
  `plateforme_id` int,
  `primary` key(jeu_id,plateforme_id)
);

ALTER TABLE `Jeu_Video` ADD FOREIGN KEY (`editeur_id`) REFERENCES `Editeur` (`id`);

ALTER TABLE `Jeu_Video` ADD FOREIGN KEY (`developpeur_id`) REFERENCES `Developpeur` (`id`);

ALTER TABLE `Plateforme` ADD FOREIGN KEY (`fabricant_id`) REFERENCES `Fabricant` (`id`);

ALTER TABLE `Commentaire` ADD FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`id`);

ALTER TABLE `Commentaire` ADD FOREIGN KEY (`jeu_id`) REFERENCES `Jeu_Video` (`id`);

ALTER TABLE `Utilisateur_Jeu_Favoris` ADD FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`id`);

ALTER TABLE `Utilisateur_Jeu_Favoris` ADD FOREIGN KEY (`jeu_id`) REFERENCES `Jeu_Video` (`id`);

ALTER TABLE `Utilisateur_Plateforme_Favoris` ADD FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`id`);

ALTER TABLE `Utilisateur_Plateforme_Favoris` ADD FOREIGN KEY (`plateforme_id`) REFERENCES `Plateforme` (`id`);

ALTER TABLE `Jeu_Video_Genre` ADD FOREIGN KEY (`jeu_id`) REFERENCES `Jeu_Video` (`id`);

ALTER TABLE `Jeu_Video_Plateforme` ADD FOREIGN KEY (`jeu_id`) REFERENCES `Jeu_Video` (`id`);

ALTER TABLE `Jeu_Video_Plateforme` ADD FOREIGN KEY (`plateforme_id`) REFERENCES `Plateforme` (`id`);
