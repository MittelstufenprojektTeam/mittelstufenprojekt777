<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220525095351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE topic_question');
        $this->addSql('ALTER TABLE question ADD topics_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EBF06A414 FOREIGN KEY (topics_id) REFERENCES topic (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EBF06A414 ON question (topics_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE topic_question (topic_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_40C6C4481F55203D (topic_id), INDEX IDX_40C6C4481E27F6BF (question_id), PRIMARY KEY(topic_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE topic_question ADD CONSTRAINT FK_40C6C4481F55203D FOREIGN KEY (topic_id) REFERENCES topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE topic_question ADD CONSTRAINT FK_40C6C4481E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EBF06A414');
        $this->addSql('DROP INDEX IDX_B6F7494EBF06A414 ON question');
        $this->addSql('ALTER TABLE question DROP topics_id');
    }
}
