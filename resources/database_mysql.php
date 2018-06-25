<?php

/*
 * SETTINGS!
 */
$databaseName = 'e_log';
$databaseUser = 'root';
$databasePassword = 'root';

/*
 * CREATE THE DATABASE
 */
$pdoDatabase = new PDO('mysql:host=localhost', $databaseUser, $databasePassword);
$pdoDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdoDatabase->exec('CREATE DATABASE IF NOT EXISTS e_log');

/*
 * CREATE THE TABLE
 */
$pdo = new PDO('mysql:host=localhost;dbname='.$databaseName, $databaseUser, $databasePassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// initialize person table
$pdo->exec('DROP TABLE IF EXISTS person_tbl;');

$pdo->exec('CREATE TABLE `person_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci,
  `person_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_supervisor_id` int(4) NOT NULL,
  `s_supervisor_id` int(4) NOT NULL,
  `gender` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(10) COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

// create log table
$pdo->exec('DROP TABLE IF EXISTS log_tbl;');

$pdo->exec('CREATE TABLE `log_tbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `person_id` int(11) NOT NULL,
 `log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `log_attachement` int(4),
 `log_date` datetime NOT NULL,
 `log_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
 `approval_date` datetime,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');