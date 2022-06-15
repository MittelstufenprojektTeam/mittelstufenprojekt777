<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609102913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('alter table question change topics_id topic_id int null;');

        $this->addSql('UPDATE `question` SET topic_id = 1  WHERE id=1');
        $this->addSql('UPDATE `question` SET topic_id = 1  WHERE id=2');
        $this->addSql('UPDATE `question` SET topic_id = 2  WHERE id=3');
        $this->addSql('UPDATE `question` SET topic_id = 2  WHERE id=4');
        $this->addSql('UPDATE `question` SET topic_id = 3  WHERE id=5');
        $this->addSql('UPDATE `question` SET topic_id = 3  WHERE id=6');
        $this->addSql('UPDATE `question` SET topic_id = 3  WHERE id=7');
        $this->addSql('UPDATE `question` SET topic_id = 4  WHERE id=8');
        $this->addSql('UPDATE `question` SET topic_id = 4  WHERE id=9');
        $this->addSql('UPDATE `question` SET topic_id = 5  WHERE id=10');
        $this->addSql('UPDATE `question` SET topic_id = 5  WHERE id=11');
        $this->addSql('UPDATE `question` SET topic_id = 6  WHERE id=12');
        $this->addSql('UPDATE `question` SET topic_id = 6  WHERE id=13');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('alter table question change topic_id topics_id int null;');
    }
}
