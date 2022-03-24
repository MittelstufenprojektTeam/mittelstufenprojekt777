<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324130330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE topic_question (topic_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_40C6C4481F55203D (topic_id), INDEX IDX_40C6C4481E27F6BF (question_id), PRIMARY KEY(topic_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE topic_question ADD CONSTRAINT FK_40C6C4481F55203D FOREIGN KEY (topic_id) REFERENCES topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE topic_question ADD CONSTRAINT FK_40C6C4481E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `option` ADD question_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B04FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_5A8600B04FAF8F53 ON `option` (question_id_id)');
        $this->addSql('ALTER TABLE progress ADD user_id_id INT NOT NULL, ADD topic_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F2469D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246C4773235 FOREIGN KEY (topic_id_id) REFERENCES topic (id)');
        $this->addSql('CREATE INDEX IDX_2201F2469D86650F ON progress (user_id_id)');
        $this->addSql('CREATE INDEX IDX_2201F246C4773235 ON progress (topic_id_id)');
        $this->addSql('ALTER TABLE question ADD display_type_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EDCF32001 FOREIGN KEY (display_type_id_id) REFERENCES display_type (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EDCF32001 ON question (display_type_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE topic_question');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B04FAF8F53');
        $this->addSql('DROP INDEX IDX_5A8600B04FAF8F53 ON `option`');
        $this->addSql('ALTER TABLE `option` DROP question_id_id');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F2469D86650F');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F246C4773235');
        $this->addSql('DROP INDEX IDX_2201F2469D86650F ON progress');
        $this->addSql('DROP INDEX IDX_2201F246C4773235 ON progress');
        $this->addSql('ALTER TABLE progress DROP user_id_id, DROP topic_id_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EDCF32001');
        $this->addSql('DROP INDEX IDX_B6F7494EDCF32001 ON question');
        $this->addSql('ALTER TABLE question DROP display_type_id_id');
    }
}
