
CREATE DATABASE IF NOT EXISTS `school`;

use `school`;

DROP TABLE IF EXISTS `students`;
DROP TABLE IF EXISTS `professors`;

CREATE TABLE `professors` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  `education` varchar(100) NULL DEFAULT NULL,
  `description` text  NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ref` char(10)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `professors` (`id`, `name`, `description`, `status`, `ref`, `created_at`) VALUES
(1, 'Andres Beatty V', 'Velit molestiae dolor est labore amet. Soluta animi maiores culpa.', 0, 'sargl26527', '1995-09-21 04:54:55'),
(2, 'Lavina O''Keefe', 'Iure placeat dolorum deserunt sapiente.',  1,  'ovcst02343', '1996-02-01 07:11:44'),
(3, 'Reagan Satterfield', 'Iure placeat dolorum deserunt sapiente.', 0, NULL, '2004-12-01 07:31:41'),
(4, 'Ezequiel Deckow', 'Aut beatae maxime et. Quo doloremque quas corporis molestiae aut deleniti qui.', 0, 'adkmz62395', '2002-07-06 07:35:31'),
(5, 'Pierce Predovic', 'Sequi aut quo vel ea omnis iste enim.', 0, 'zuuua08944', '1985-05-21 02:13:26'),
(6, 'Bulah Lehner', 'A dolorem corporis quia consectetur aperiam.',1, NULL, '2004-07-26 00:55:32');

CREATE TABLE `students` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `professor_id` INT UNSIGNED NULL DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `note` int(10) UNSIGNED NOT NULL,
  `city` char(3) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `students_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `students` (`id`, `name`, `note`, `city`) VALUES
(1, 'Ali', 10, 'PAR'),
(2, 'Harry', 16, 'PAR'),
(3, 'Fanny', 12, 'LYO'),
(4, 'Austin', 11, 'MAR'),
(5, 'Forest', 11, 'MAR'),
(6, 'Achille', 18, 'MAR');

UPDATE `professors` SET `education` = 'php' WHERE `id` = 1;
UPDATE `professors` SET `education` = 'mysql' WHERE `id` = 2;
UPDATE `professors` SET `education` = 'javascript' WHERE `id` = 3;
UPDATE `professors` SET `education` = 'laravel' WHERE `id` = 4;
UPDATE `professors` SET `education` = 'python' WHERE `id` = 5;
UPDATE `professors` SET `education` = 'vueJS' WHERE `id` = 6;

UPDATE `students` 
SET `professor_id` = 1
WHERE `id` = 1;

UPDATE `students` 
SET `professor_id` = 1
WHERE `id` = 2;

UPDATE `students` 
SET `professor_id` = 3
WHERE `id` = 3;

UPDATE `students` 
SET `professor_id` = 4
WHERE `id` = 4;

UPDATE `students` 
SET `professor_id` = NULL
WHERE `id` = 5;

UPDATE `students` 
SET `professor_id` = 4
WHERE `id` = 6;