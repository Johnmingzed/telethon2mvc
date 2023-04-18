CREATE DATABASE IF NOT EXISTS telethon2;

CREATE TABLE IF NOT EXISTS `users`(
    `id_user` int PRIMARY KEY,
    `firstname` VARCHAR(63) NOT NULL,
    `lastname` VARCHAR(63) NOT NULL,
    `mail` VARCHAR(320) NOT NULL UNIQUE,
    `passwords` VARCHAR(25) NOT NULL,
    `token` VARCHAR(128),
    `is_admin` int NOT NULL,
    `notes` VARCHAR(1024),
    `picture` VARCHAR(1000)
);

CREATE TABLE IF NOT EXISTS `stands`(
    `id_stand` int PRIMARY KEY,
    `name` VARCHAR(63) NOT NULL,
    `place` VARCHAR(128) NOT NULL,
    `notes` VARCHAR(1024)
);

CREATE TABLE IF NOT EXISTS `collects`(
    `id_collect` int PRIMARY KEY,
    `collect` VARCHAR(63) NOT NULL,
    `date` DATETIME NOT NULL,
    `partner_id` int,
    `stand_id` int,
    FOREIGN KEY (stand_id) REFERENCES `stands`(id_stand),
    FOREIGN KEY (partner_id) REFERENCES `partners`(id_partner)
);

CREATE TABLE IF NOT EXISTS `partners`(
    `id_partner` int PRIMARY KEY,
    `firstname` VARCHAR(63) NOT NULL,
    `lastname` VARCHAR(63) NOT NULL,
    `mail` VARCHAR(320) NOT NULL UNIQUE,
    `phone` VARCHAR(25) NOT NULL UNIQUE,
    `name` VARCHAR(63) NOT NULL UNIQUE,
    `logo` VARCHAR(1000),
    `sponsoring_id` int,
    FOREIGN KEY (sponsoring_id) REFERENCES `sponsoring`(id_sponsoring)
);

CREATE TABLE IF NOT EXISTS `sponsoring`(
    `id_sponsoring` int PRIMARY KEY,
    `sponsor_type` VARCHAR(63) NOT NULL
);