CREATE TABLE countries (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           name VARCHAR(100) NOT NULL
);

CREATE TABLE cities (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100) NOT NULL,
                        country_id INT NOT NULL,
                        FOREIGN KEY (country_id) REFERENCES countries(id)
);

CREATE TABLE trainers (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(100) NOT NULL,
                          type ENUM('présentiel', 'distanciel') NOT NULL
);

CREATE TABLE disciplines (
                             id INT AUTO_INCREMENT PRIMARY KEY,
                             name VARCHAR(100) NOT NULL
);

CREATE TABLE subjects (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(100) NOT NULL,
                          discipline_id INT NOT NULL,
                          FOREIGN KEY (discipline_id) REFERENCES disciplines(id)
);

CREATE TABLE courses (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(100) NOT NULL,
                         subject_id INT NOT NULL,
                         FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

CREATE TABLE formations (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            course_id INT NOT NULL,
                            city_id INT NOT NULL,
                            trainer_id INT NOT NULL,
                            date DATE NOT NULL,
                            price DECIMAL(10,2) NOT NULL,
                            FOREIGN KEY (course_id) REFERENCES courses(id),
                            FOREIGN KEY (city_id) REFERENCES cities(id),
                            FOREIGN KEY (trainer_id) REFERENCES trainers(id)
);

CREATE TABLE clients (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(100) NOT NULL,
                         email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE registrations (
                               id INT AUTO_INCREMENT PRIMARY KEY,
                               formation_id INT NOT NULL,
                               client_id INT NOT NULL,
                               registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                               FOREIGN KEY (formation_id) REFERENCES formations(id),
                               FOREIGN KEY (client_id) REFERENCES clients(id)
);
