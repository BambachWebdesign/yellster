CREATE DATABASE `GLOBAL` ;

CREATE TABLE `GLOBAL`.`users` (
`user_id` VARCHAR( 50)NOT NULL PRIMARY KEY,
`user_name` VARCHAR( 50)NOT NULL ,
`user_pw` VARCHAR( 130)NOT NULL ,
`user_firstname` VARCHAR( 50) NOT NULL ,
`user_familyname` VARCHAR ( 50) NOT NULL ,
`user_entrydate` INT( 11)UNSIGNED NULL DEFAULT NULL ,
`user_birthday` INT( 11)UNSIGNED NULL DEFAULT NULL , 
`user_gender` TINYINT UNSIGNED NULL DEFAULT NULL ,          
`user_status` TINYINT UNSIGNED NULL DEFAULT NULL ,
`user_status_with` VARCHAR( 50) NULL DEFAULT NULL, 
`user_lookingfor` TINYINT UNSIGNED NULL DEFAULT NULL ,
`user_language` TINYINT UNSIGNED NULL DEFAULT NULL ,
`user_email` VARCHAR( 50)NOT NULL,
`user_phone` VARCHAR( 30)NULL DEFAULT NULL ,
`user_mobilphone` VARCHAR( 30)NULL DEFAULT NULL ,
`user_adress` VARCHAR( 50)NULL DEFAULT NULL ,
`user_city` VARCHAR( 50)NULL DEFAULT NULL ,
`user_country` VARCHAR( 50)NULL DEFAULT NULL ,
`user_picture_40` LONGTEXT NULL DEFAULT NULL ,
`user_picture_100` LONGTEXT NULL DEFAULT NULL ,
`user_picture_200` LONGTEXT NULL DEFAULT NULL
 ) ENGINE=MYISAM ;
 
CREATE TABLE `GLOBAL`.`options` (
`options_user_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`options_colors` VARCHAR( 10)NULL DEFAULT NULL ,
`options_friendlist_active` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_friendlist_x` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_friendlist_y` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_messageboard_active` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_messageboard_x` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_messageboard_y` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_messages_menu_active` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_messages_menu_x` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_messages_menu_y` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_messages_main_active` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_messages_main_x` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_messages_main_y` SMALLINT UNSIGNED NULL DEFAULT NULL ,
`options_public_fullname` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_birthday` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_gender` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_status` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_lookingfor` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_language` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_email` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_phone` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_mobilphone` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_adress` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_city` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_country` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_interests` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_groups` TINYINT UNSIGNED NULL DEFAULT NULL ,
`options_public_friendlist` TINYINT UNSIGNED NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE DATABASE `HISTORY` ;
CREATE DATABASE `MYYELLS` ;
CREATE DATABASE `COMMENTS` ;
CREATE DATABASE `INBOX` ;
CREATE DATABASE `OUTBOX` ;
CREATE DATABASE `FRIENDLIST` ;
CREATE DATABASE `FRIENDLISTGROUPS` ;
CREATE DATABASE `USERGROUPS` ;
CREATE DATABASE `USERINTERESTS` ;
CREATE DATABASE `PHOTOS` ;




CREATE TABLE `global`.`group_list`(
`group_list_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`group_list_name` VARCHAR( 50) NULL DEFAULT NULL ,
`group_list_description` LONGTEXT NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE TABLE `global`.`interest_list`(
`interest_list_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`interest_list_name` VARCHAR( 50) NULL DEFAULT NULL ,
`interest_list_description` LONGTEXT NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE TABLE `global`.`citys`(
`citys_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`citys_name` VARCHAR( 50) NULL DEFAULT NULL ,
`citys_code` VARCHAR( 30) NULL DEFAULT NULL ,
`citys_description` LONGTEXT NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE TABLE `global`.`schools`(
`schools_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`schools_name` VARCHAR( 50) NULL DEFAULT NULL ,
`schools_country` VARCHAR( 50) NULL DEFAULT NULL ,
`schools_city` VARCHAR( 50) NULL DEFAULT NULL ,
`schools_street` VARCHAR( 50) NULL DEFAULT NULL ,
`schools_description` LONGTEXT NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE TABLE `global`.`works`(
`works_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`works_name` VARCHAR( 50) NULL DEFAULT NULL ,
`works_country` VARCHAR( 50) NULL DEFAULT NULL ,
`works_city` VARCHAR( 50) NULL DEFAULT NULL ,
`works_street` VARCHAR( 50) NULL DEFAULT NULL ,
`works_description` LONGTEXT NULL DEFAULT NULL
) ENGINE=MYISAM ;


CREATE TABLE `global`.`events`(
`events_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`event_name` VARCHAR( 50) NULL DEFAULT NULL ,
`event_start` INT( 11) NULL DEFAULT NULL ,
`event_end` INT( 11) NULL DEFAULT NULL ,
`event_country` VARCHAR( 50) NULL DEFAULT NULL ,
`event_city` VARCHAR( 50) NULL DEFAULT NULL ,
`event_street` VARCHAR( 50) NULL DEFAULT NULL ,
`works_description` LONGTEXT NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE TABLE `global`.`online`(
`online_user_sid` VARCHAR( 50) NOT NULL PRIMARY KEY ,
`online_user_id` VARCHAR( 50) NULL DEFAULT NULL ,
`online_user_ip` VARCHAR( 20) NULL DEFAULT NULL ,
`online_user_lastupdate` INT( 11) NULL DEFAULT NULL ,
`online_user_start` INT( 11) NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE TABLE `global`.`anti_spam`(
`anti_spam_ip` VARCHAR( 20) NOT NULL PRIMARY KEY ,
`anti_spam_count` TINYINT NULL DEFAULT NULL ,
`anti_spam_time` INT( 11) NULL DEFAULT NULL
) ENGINE=MYISAM ;

CREATE TABLE `global`.`ban_log`(
`ban_log_ip` VARCHAR( 20) NOT NULL PRIMARY KEY ,
`ban_log_time` INT( 11) NULL DEFAULT NULL
) ENGINE=MYISAM ;
