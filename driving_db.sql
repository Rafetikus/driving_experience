DROP TABLE IF EXISTS driving_experience;

CREATE TABLE driving_experience (
    id INT AUTO_INCREMENT PRIMARY KEY,

    firstname VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(30) NOT NULL,

    date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    distance_km INT NOT NULL,

    weather ENUM('Sunny','Cloudy','Rainy','Snowy','Windy') NOT NULL,
    road_material ENUM('Asphalt','Gravel','Concrete','Dirt') NOT NULL,
    traffic ENUM('Light','Moderate','Heavy') NOT NULL,
    road_type ENUM('City','Highway','Rural') NOT NULL,
    experience_level ENUM('Beginner','Intermediate','Advanced') NOT NULL
);