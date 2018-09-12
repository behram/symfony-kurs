<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180912152551 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kategori (id INT AUTO_INCREMENT NOT NULL, isim VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE urun ADD kategori_id INT NOT NULL');
        $this->addSql('ALTER TABLE urun ADD CONSTRAINT FK_D292F260F89C2B38 FOREIGN KEY (kategori_id) REFERENCES kategori (id)');
        $this->addSql('CREATE INDEX IDX_D292F260F89C2B38 ON urun (kategori_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE urun DROP FOREIGN KEY FK_D292F260F89C2B38');
        $this->addSql('DROP TABLE kategori');
        $this->addSql('DROP INDEX IDX_D292F260F89C2B38 ON urun');
        $this->addSql('ALTER TABLE urun DROP kategori_id');
    }
}
