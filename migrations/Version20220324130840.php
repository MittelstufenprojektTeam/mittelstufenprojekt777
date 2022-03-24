<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324130840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B04FAF8F53');
        $this->addSql('DROP INDEX IDX_5A8600B04FAF8F53 ON `option`');
        $this->addSql('ALTER TABLE `option` CHANGE question_id_id question_id INT NOT NULL');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B01E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_5A8600B01E27F6BF ON `option` (question_id)');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F246C4773235');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F2469D86650F');
        $this->addSql('DROP INDEX IDX_2201F2469D86650F ON progress');
        $this->addSql('DROP INDEX IDX_2201F246C4773235 ON progress');
        $this->addSql('ALTER TABLE progress ADD user_id INT NOT NULL, ADD topic_id INT NOT NULL, DROP user_id_id, DROP topic_id_id');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F2461F55203D FOREIGN KEY (topic_id) REFERENCES topic (id)');
        $this->addSql('CREATE INDEX IDX_2201F246A76ED395 ON progress (user_id)');
        $this->addSql('CREATE INDEX IDX_2201F2461F55203D ON progress (topic_id)');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EDCF32001');
        $this->addSql('DROP INDEX IDX_B6F7494EDCF32001 ON question');
        $this->addSql('ALTER TABLE question CHANGE display_type_id_id display_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EF2A36E08 FOREIGN KEY (display_type_id) REFERENCES display_type (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EF2A36E08 ON question (display_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B01E27F6BF');
        $this->addSql('DROP INDEX IDX_5A8600B01E27F6BF ON `option`');
        $this->addSql('ALTER TABLE `option` CHANGE question_id question_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B04FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_5A8600B04FAF8F53 ON `option` (question_id_id)');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F246A76ED395');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F2461F55203D');
        $this->addSql('DROP INDEX IDX_2201F246A76ED395 ON progress');
        $this->addSql('DROP INDEX IDX_2201F2461F55203D ON progress');
        $this->addSql('ALTER TABLE progress ADD user_id_id INT NOT NULL, ADD topic_id_id INT NOT NULL, DROP user_id, DROP topic_id');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246C4773235 FOREIGN KEY (topic_id_id) REFERENCES topic (id)');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F2469D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2201F2469D86650F ON progress (user_id_id)');
        $this->addSql('CREATE INDEX IDX_2201F246C4773235 ON progress (topic_id_id)');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EF2A36E08');
        $this->addSql('DROP INDEX IDX_B6F7494EF2A36E08 ON question');
        $this->addSql('ALTER TABLE question CHANGE display_type_id display_type_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EDCF32001 FOREIGN KEY (display_type_id_id) REFERENCES display_type (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EDCF32001 ON question (display_type_id_id)');
    }
}
