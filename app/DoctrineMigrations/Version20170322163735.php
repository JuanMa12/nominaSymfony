<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170322163735 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL,
                        cc INT(10) DEFAULT NULL, phone INT(10) DEFAULT NULL, salary INT(9) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET
                        utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE editorials (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL,
                        PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, date VARCHAR(255) DEFAULT NULL,
                        editorial INT(10) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL,
                         FOREIGN KEY (editorial)REFERENCES editorials(id)ON DELETE CASCADE,
                         PRIMARY KEY(id)) DEFAULT CHARACTER SET
                        utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
