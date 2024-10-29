<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017214515 extends AbstractMigration
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
        $this->addSql('CREATE TABLE jeu_video (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_de_sortie DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, genres VARCHAR(255) NOT NULL, evaluation DOUBLE PRECISION DEFAULT NULL, mode_multijoueur TINYINT(1) DEFAULT NULL, plateformes VARCHAR(255) DEFAULT NULL, versions VARCHAR(255) DEFAULT NULL, cover_image_url VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu_video_genre (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, fabricant_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, date_de_sortie DATE DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, generation INT DEFAULT NULL, INDEX IDX_3C020C11C3B29B27 (fabricant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_d_utilisateur VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, avatar_url VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCB981C689 FOREIGN KEY (utilisateur_id_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE plateforme ADD CONSTRAINT FK_3C020C11C3B29B27 FOREIGN KEY (fabricant_id_id) REFERENCES fabricant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB981C689');
        $this->addSql('ALTER TABLE plateforme DROP FOREIGN KEY FK_3C020C11C3B29B27');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE developpeur');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE fabricant');
        $this->addSql('DROP TABLE jeu_video');
        $this->addSql('DROP TABLE jeu_video_genre');
        $this->addSql('DROP TABLE plateforme');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
