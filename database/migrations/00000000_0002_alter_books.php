<?php

return new class extends MigrationBase
{
    public function up()
    {
        $this->db->exec("ALTER TABLE books ADD COLUMN num_pages INTEGER");
        $this->db->exec("ALTER TABLE books ADD COLUMN published_year INTEGER");
        $this->db->exec("ALTER TABLE books ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
        $this->db->exec("ALTER TABLE books ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
    }

    public function down()
    {
        $this->db->exec("ALTER TABLE books DROP COLUMN num_pages");
        $this->db->exec("ALTER TABLE books DROP COLUMN published_year");
        $this->db->exec("ALTER TABLE books DROP COLUMN created_at");
        $this->db->exec("ALTER TABLE books DROP COLUMN updated_at");
    }
};
