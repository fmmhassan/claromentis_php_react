
# SET App configuration variables
claromentis-backend/config.php
    $servername -> define the db host
    $username -> define the db username
    $password -> define the db pw
    $database -> define the db
    $front_end_url -> define the frontend app url to allow access

claromentis-frontend/.env
    REACT_APP_API_BASE_URL->specify-the-backend-location-to-access

# SET DB configuration/queries
Database configuration
    Create a database of any name you prefer
    Run the below script within the database:
        CREATE TABLE `expenses` (
        `id` int NOT NULL AUTO_INCREMENT,
        `category` varchar(255) DEFAULT NULL,
        `unit_price` double DEFAULT NULL,
        `qty` double DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

Configurations details that were used within development is already available

# To Run the frontend project
    Run the below commands within frontend project(claromentis-frontend)
    npm install
    npm start
