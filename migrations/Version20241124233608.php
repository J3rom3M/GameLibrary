<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241124233608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, utilisateur_id_id INT NOT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_67F068BCB981C689 (utilisateur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE developpeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pays VARCHAR(255) DEFAULT NULL, annee_de_creation INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pays VARCHAR(255) DEFAULT NULL, annee_de_creation DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fabricant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pays VARCHAR(255) DEFAULT NULL, annee_de_creation DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu_video (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_de_sortie DATE DEFAULT NULL, description LONGTEXT DEFAULT NULL, evaluation DOUBLE PRECISION DEFAULT NULL, mode_multijoueur TINYINT(1) DEFAULT NULL, versions VARCHAR(255) DEFAULT NULL, cover_image_url VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_genres (jeu_video_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_E7076130695B6720 (jeu_video_id), INDEX IDX_E70761304296D31F (genre_id), PRIMARY KEY(jeu_video_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_platforms (jeu_video_id INT NOT NULL, plateforme_id INT NOT NULL, INDEX IDX_DD124FE2695B6720 (jeu_video_id), INDEX IDX_DD124FE2391E226B (plateforme_id), PRIMARY KEY(jeu_video_id, plateforme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, fabricant_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, date_de_sortie DATE DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, generation INT DEFAULT NULL, INDEX IDX_3C020C11C3B29B27 (fabricant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_d_utilisateur VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, avatar_url VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCB981C689 FOREIGN KEY (utilisateur_id_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE jeux_genres ADD CONSTRAINT FK_E7076130695B6720 FOREIGN KEY (jeu_video_id) REFERENCES jeu_video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_genres ADD CONSTRAINT FK_E70761304296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_platforms ADD CONSTRAINT FK_DD124FE2695B6720 FOREIGN KEY (jeu_video_id) REFERENCES jeu_video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_platforms ADD CONSTRAINT FK_DD124FE2391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateforme ADD CONSTRAINT FK_3C020C11C3B29B27 FOREIGN KEY (fabricant_id_id) REFERENCES fabricant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB981C689');
        $this->addSql('ALTER TABLE jeux_genres DROP FOREIGN KEY FK_E7076130695B6720');
        $this->addSql('ALTER TABLE jeux_genres DROP FOREIGN KEY FK_E70761304296D31F');
        $this->addSql('ALTER TABLE jeux_platforms DROP FOREIGN KEY FK_DD124FE2695B6720');
        $this->addSql('ALTER TABLE jeux_platforms DROP FOREIGN KEY FK_DD124FE2391E226B');
        $this->addSql('ALTER TABLE plateforme DROP FOREIGN KEY FK_3C020C11C3B29B27');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE developpeur');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE fabricant');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE jeu_video');
        $this->addSql('DROP TABLE jeux_genres');
        $this->addSql('DROP TABLE jeux_platforms');
        $this->addSql('DROP TABLE plateforme');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
