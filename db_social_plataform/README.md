<!-- 
Vogliamo creare uno spazio virtuale in stile social network dove gli utenti possano condividere le proprie esperienze. 
Ogni utente può creare dei post, al quale può aggiungere uno o più media come foto e video. 
Ogni post può avere uno o più tags che servono per categorizzare i contenuti. 
Gli altri utenti possono interagire con il post esprimendo il loro gradimento attraverso un semplice like.


Individuate prima le entità su cui si basa la piattaforma e poi osservate come sono relazionate. Inoltre, specificate i campi e i diversi vincoli disponibili per ciascun campo, come ad esempio l'utilizzo di UNIQUE per garantire l'unicità dei valori e NOT NULL per indicare l’obbligo di fornire un valore per quel campo. Attenzione alle chiavi primarie. BONUS: espandete il diagramma per integrare anche l’entità Tags e Commenti.
Utilizzare https://www.diagrams.net/  per la creazione dello schema. Esportare quindi il diagramma in png e caricarlo nella repo
 -->


### 1 Users
- id PRIMARY KEY AUTO_INCREMENT NOT NULL,
- name VARCHAR(255),
- surname VARCHAR(255),
- email VARCHAR(255),
- username VARCHAR(255),
- password VARCHAR(255),
- birthdate DATE,
- phone VARCHAR(255) UNIQUE DEFAULT NULL,
- date_of_registration DATETIME CURRENT_TIMESTAMP

### 2 Posts
- id PRIMARY KEY AUTO_INCREMENT NOT NULL,
- user_id INT NOT NULL,
- title VARCHAR(255),
- date_of_load DATETIME DEFAULT CURRENT_TIMESTAMP,
- comment TEXT,
- tags JSON,


### 3 Averages
- id INT AUTO_INCREMENT NOT NULL
- user_id INT,
- type ENUM(photo, video),
- path VARCHAR(255),
- created DATATIME DEFAULT CURRENT_TIMESTAMP

### 4 Posts_Averages
- post_id INT NOT NULL,
- average_id INT NOT NULL,
- created DATETIME DEFAULT CURRENT_TIMESTAM,

### 5 Likes
- id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
- post_id  INT NOT NULL,
- user_id INT NOT NULL,
- date DATATIME
- created DATATIEM DEFAULT CURRENT_TIMESTAMP,