
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

INSERT INTO users (id, username, email, password) VALUES 
(01011970, 'admin', 'admin@example.com', 'securinets{chte-tsob-wta9es-mte-mhamsa}');
