<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200309130952 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('
        
            CREATE TABLE users 
            (
                id INT AUTO_INCREMENT NOT NULL, 
                active   TINYINT(1)   NOT NULL, 
                name     VARCHAR(255) NOT NULL, 
                roles    JSON         NOT NULL, 
                password CHAR(40)   NOT NULL,
                rfid     VARCHAR(255) NOT NULL, 
                company  VARCHAR(255) NOT NULL, 
                address  VARCHAR(255) NOT NULL, 
                comment  VARCHAR(255) NOT NULL, 
                UNIQUE INDEX UNIQ_1483A5E95E237E06 (name), 
                UNIQUE INDEX UNIQ_1483A5E952C87536 (rfid),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB

        ');

        $this->addSql('

            CREATE TABLE data (
                id INT AUTO_INCREMENT NOT NULL, 
                rfid VARCHAR(255) NOT NULL, 
                time TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                direction VARCHAR(255) NOT NULL, 
                INDEX IDX_ADF3F36352C87536 (rfid), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'

        );

        $this->addSql('ALTER TABLE data ADD CONSTRAINT FK_ADF3F36352C87536 FOREIGN KEY (rfid) REFERENCES users (rfid)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE users');
    }
}
