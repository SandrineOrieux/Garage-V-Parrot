<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240205105707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, is_contacted TINYINT(1) NOT NULL, INDEX IDX_4C62E6388C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE energy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiscal_power (id INT AUTO_INCREMENT NOT NULL, number SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_vehicle (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT NOT NULL, INDEX IDX_84FDFAE4545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_of_doors (id INT AUTO_INCREMENT NOT NULL, number SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_of_seats (id INT AUTO_INCREMENT NOT NULL, number SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_hour (id INT AUTO_INCREMENT NOT NULL, am_id INT DEFAULT NULL, pm_id INT DEFAULT NULL, created_by_id INT NOT NULL, day VARCHAR(10) NOT NULL, INDEX IDX_969BD765323C9A1C (am_id), INDEX IDX_969BD7656FBC242E (pm_id), INDEX IDX_969BD765B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, number SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_service (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_7F26CF41B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, comment LONGTEXT NOT NULL, rate SMALLINT NOT NULL, isvalidated TINYINT(1) NOT NULL, INDEX IDX_794381C68C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_slot (id INT AUTO_INCREMENT NOT NULL, start VARCHAR(5) NOT NULL, end VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_of_vehicles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, type_id INT NOT NULL, brand_id INT NOT NULL, model_id INT NOT NULL, energy_id INT NOT NULL, transmission_id INT NOT NULL, number_of_doors_id INT NOT NULL, number_of_seats_id INT NOT NULL, power_id INT NOT NULL, fiscal_power_id INT NOT NULL, title VARCHAR(255) NOT NULL, year DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', kilometer INT NOT NULL, price INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_1B80E486B03A8386 (created_by_id), INDEX IDX_1B80E486C54C8C93 (type_id), INDEX IDX_1B80E48644F5D008 (brand_id), INDEX IDX_1B80E4867975B7E7 (model_id), INDEX IDX_1B80E486EDDF52D (energy_id), INDEX IDX_1B80E48678D28519 (transmission_id), INDEX IDX_1B80E4864E36F662 (number_of_doors_id), INDEX IDX_1B80E486297205CE (number_of_seats_id), INDEX IDX_1B80E486AB4FC384 (power_id), INDEX IDX_1B80E486F4697361 (fiscal_power_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_option (vehicle_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_F3580163545317D1 (vehicle_id), INDEX IDX_F3580163A7C41D6F (option_id), PRIMARY KEY(vehicle_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6388C03F15C FOREIGN KEY (employee_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE images_vehicle ADD CONSTRAINT FK_84FDFAE4545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE opening_hour ADD CONSTRAINT FK_969BD765323C9A1C FOREIGN KEY (am_id) REFERENCES time_slot (id)');
        $this->addSql('ALTER TABLE opening_hour ADD CONSTRAINT FK_969BD7656FBC242E FOREIGN KEY (pm_id) REFERENCES time_slot (id)');
        $this->addSql('ALTER TABLE opening_hour ADD CONSTRAINT FK_969BD765B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_service ADD CONSTRAINT FK_7F26CF41B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C68C03F15C FOREIGN KEY (employee_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486C54C8C93 FOREIGN KEY (type_id) REFERENCES type_of_vehicles (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48644F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4867975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486EDDF52D FOREIGN KEY (energy_id) REFERENCES energy (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48678D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4864E36F662 FOREIGN KEY (number_of_doors_id) REFERENCES number_of_doors (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486297205CE FOREIGN KEY (number_of_seats_id) REFERENCES number_of_seats (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486AB4FC384 FOREIGN KEY (power_id) REFERENCES power (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486F4697361 FOREIGN KEY (fiscal_power_id) REFERENCES fiscal_power (id)');
        $this->addSql('ALTER TABLE vehicle_option ADD CONSTRAINT FK_F3580163545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicle_option ADD CONSTRAINT FK_F3580163A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6388C03F15C');
        $this->addSql('ALTER TABLE images_vehicle DROP FOREIGN KEY FK_84FDFAE4545317D1');
        $this->addSql('ALTER TABLE opening_hour DROP FOREIGN KEY FK_969BD765323C9A1C');
        $this->addSql('ALTER TABLE opening_hour DROP FOREIGN KEY FK_969BD7656FBC242E');
        $this->addSql('ALTER TABLE opening_hour DROP FOREIGN KEY FK_969BD765B03A8386');
        $this->addSql('ALTER TABLE repair_service DROP FOREIGN KEY FK_7F26CF41B03A8386');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C68C03F15C');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486B03A8386');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486C54C8C93');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48644F5D008');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4867975B7E7');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486EDDF52D');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48678D28519');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4864E36F662');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486297205CE');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486AB4FC384');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486F4697361');
        $this->addSql('ALTER TABLE vehicle_option DROP FOREIGN KEY FK_F3580163545317D1');
        $this->addSql('ALTER TABLE vehicle_option DROP FOREIGN KEY FK_F3580163A7C41D6F');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE energy');
        $this->addSql('DROP TABLE fiscal_power');
        $this->addSql('DROP TABLE images_vehicle');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE number_of_doors');
        $this->addSql('DROP TABLE number_of_seats');
        $this->addSql('DROP TABLE opening_hour');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE repair_service');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE time_slot');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE type_of_vehicles');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE vehicle_option');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
