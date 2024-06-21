# back_dsw
apenas o back :D sem firulinha

#mysql

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role ENUM('instrutor', 'aluno') NOT NULL
);
