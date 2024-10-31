<?php

return new class extends MigrationBase
{
    public function up()
    {
        $this->db->exec("CREATE TABLE books (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title VARCHAR(255),
            author VARCHAR(255),
            genre VARCHAR(255),
            rating DECIMAL(2, 1),
            image VARCHAR(255),
            description TEXT,
            user_id INTEGER,
            
            FOREIGN KEY (user_id) REFERENCES users(id)
        )");
    }

    public function down()
    {
        $this->db->exec("DROP TABLE IF EXISTS books");
    }
};
