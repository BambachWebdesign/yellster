CREATE TABLE `server2go`.`pinnwand` (
 `id` INT( 11)NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `stamp` INT( 11)NULL DEFAULT NULL ,
 `name` VARCHAR( 20)NULL DEFAULT NULL ,
 `message` LONGTEXT NULL DEFAULT NULL 
) ENGINE=MYISAM ;


INSERT INTO `server2go`.`pinnwand` (
 `id` ,
 `stamp` ,
 `name` ,
 `message`
)
VALUES (
 '10', UNIX_TIMESTAMP() ,'Daniel','Daniel hat soeben einen neuen Account erstellt!'
);

// Suche:

SELECT * FROM suchmaschine WHERE words LIKE('%".$textfieldSecure."%')