<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609095529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `option` ADD points DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE task ADD result DOUBLE PRECISION NOT NULL');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=1');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=2');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=3');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=4');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=5');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=6');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=7');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=8');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=9');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=10');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=11');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=12');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=13');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=14');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=15');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=16');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=17');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=18');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=19');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=20');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=21');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=22');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=23');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=24');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=25');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=26');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=27');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=28');
        $this->addSql('UPDATE `option` SET points = 1  WHERE id=29');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `option` DROP points');
        $this->addSql('ALTER TABLE task DROP result');
    }
}
