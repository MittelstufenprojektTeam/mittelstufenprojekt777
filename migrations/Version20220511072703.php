<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511072703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        /*--------------------------------topic-------------------------------------*/
        $this->addSql('INSERT INTO topic (title) VALUES ("LF1")');
        $this->addSql('INSERT INTO topic (title) VALUES ("LF2")');
        $this->addSql('INSERT INTO topic (title) VALUES ("LF3")');
        $this->addSql('INSERT INTO topic (title) VALUES ("LF4")');
        $this->addSql('INSERT INTO topic (title) VALUES ("LF5")');
        $this->addSql('INSERT INTO topic (title) VALUES ("POL")');
        /*--------------------------------display-------------------------------------*/
        $this->addSql('INSERT INTO display_type (title) VALUES ("checkbox")');
        $this->addSql('INSERT INTO display_type (title) VALUES ("string_comparison")');
        $this->addSql('INSERT INTO display_type (title) VALUES ("free_text")');
        $this->addSql('INSERT INTO display_type (title) VALUES ("radio")');
        /*--------------------------------question-------------------------------------*/
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Welche vier der folgenden Angaben müssen laut Berufsbildungsgesetz nicht in den Berufsausbildungsvertrag aufgenommen werden? ", 1)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Erklären Sie kurz den Begriff Webhosting", 3)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Wie hoch ist der Mehrwertsteuerbetrag bei 19% auf 500,00€? ", 2)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Welche Punkte sind für einen ergonomischen Arbeitsplatz Wichtig? ", 1)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Verkürzen Sie diese IPv6-Adresse: AF00:0000:0000:E255:0000:0001:332D:81FA", 2)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Für was steht die Abkürzung AP:", 2)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Wandeln Sie die Dualzahl 111110100001 in eine Hexadezimalzahl um.", 2)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Bei der Schutzbedarfsfeststellung für Clients werden die drei Grundwerte „Vertraulichkeit – /User Eingabe/ – Verfügbarkeit“ betrachtet", 2)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Was regelt die DSGVO und was regelt das BDSG?", 3)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("For ist eine", 4)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Geben Sie als Java Code die Summe x = 10 & y = 20 aus", 3)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Unterscheiden Sie zwischen Berufskrankheiten und allgemeinen Krankheiten.", 3)');
        $this->addSql('INSERT INTO question (phrase, display_type_id) VALUES ("Die Weisungen des /User Eingabe/ sind zu befolgen.", 2)');
        /*--------------------------------topic_question-------------------------------------*/
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (1, 1)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (1, 2)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (2, 3)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (2, 4)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (3, 5)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (3, 6)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (3, 7)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (4, 8)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (4, 9)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (5, 10)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (5, 11)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (6, 12)');
        $this->addSql('INSERT INTO topic_question (topic_id, question_id) VALUES (6, 13)');
        /*--------------------------------option-------------------------------------*/
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Die Berufsausbildung beginnt am 01.08.20..", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Die Dauer der Probezeit beträgt vier Monate", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Eine Bescheinigung über die ärztliche Erstuntersuchung liegt vor", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Die Ausbildungsvergütung beträgt im ersten Ausbildungsjahr monatlich 850,00€", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Die Berufsausbildung entspricht dem Berufsbildungsgesetz sowie der Ausbildungsordnung", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Der Urlaub beträgt jährlich 30 Tage", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Im Februar 20.. erfolgt ein einmonatige Ausbildungsmaßnahme bei der IT Meier GmbH", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Die regelmäßige tägliche Ausbildungszeit beträgt acht Stunden", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Die kalkulierten Kosten der Ausbildung betragen 65 000,00€", 1)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Bereitstellung von Webspace sowie die Unterbringung (Hosting) von Websites auf dem Webserver eines Internet Service Providers (ISP, Internetdienstanbieter)", 2)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("95,00€", 3)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("10cm Abstand zum Monitor ", 4)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Tageslicht", 4)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Mindestens 22“ große Monitore ", 4)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Ein Pacman-automat ", 4)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Fast-Food Automat ", 4)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Ergonomische Bürostühle ", 4)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("AF00::E255:0:1:332D:81FA", 5)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Access Point", 6)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("F A 1", 7)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Integrität", 8)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Der Datenschutz in Unternehmen und Organisationen wird durch die EU-Datenschutz-Grundverordnung (DSGVO) geregelt. Das neue Bundesdatenschutzgesetz regelt die Bereiche, in denen die DSGVO den Mitgliedsstaaten Gestaltungsmöglichkeiten einräumt.", 9)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Schleife", 10)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Methode", 10)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Verzweigung", 10)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Classen Variable ", 10)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("int x = 10; int y = 20; int summe = x + y; System.outprintln(„Summe: „ + summe", 11)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Allgemeine Krankheiten befallen alle Bevölkerungsschichten in gleicher Weise. Beispiele: Masern, Röteln, Grippe. Berufskrankheiten werden durch die Berufstätigkeit hervorgerufen. Beispiele: Mehlallergie des Bäckers, Staublunge des Bergmanns.", 12)');
        $this->addSql('INSERT INTO option (text, question_id) VALUES ("Ausbildenden", 13)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
