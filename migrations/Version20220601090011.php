<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601090011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=1');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=4');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=6');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=8');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=10');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=11');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=13');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=14');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=17');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=18');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=19');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=20');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=21');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=22');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=23');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=27');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id=28');
        $this->addSql('UPDATE `option` SET solution = 1  WHERE id= 29');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
