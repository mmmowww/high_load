<?php
/*
Я себе сломал голову. Я долго думал Как сделать адекватную свзяь в таблицах
Решил разделить на большие фракции. А под фракции сделать JSON.
Согласен не разумно. Но с другой стороны как хранить список друзей или врагов размером 1000 единиц в одной колонке я не знаю.. По сему и был выбран JSON

 */
namespace MMMOWWW;
class Migration {
	private $UserBD;
	private $PassBD;
	private $SQL;
	public function SetComandSQL($SQL) {
		$this->SQL = $SQL;
		return $this;
	}
	public function GetComandSQL() {
		return $this->SQL;
	}
	public function Connection($User, $Pass) {
		$this->UserBD = $User;
		$this->PassBD = $Pass;
		return $this;
	}
	public function CreateTable() {
		$CreateTableGeneral = "
                   CREATE TABLE `friends`.`user`
                   ( `id` INT(250) NOT NULL AUTO_INCREMENT ,
                     `NameUser` INT NOT NULL ,
                     `Friens` INT NOT NULL ,
                     `IndirectFriends` INT NOT NULL ,
                     `Enemys` INT NOT NULL ,
                      `IndirectEnemys` INT NOT NULL ,
                      PRIMARY KEY (`id`))
                      ENGINE = InnoDB;";
		$CreateTableUserName = "CREATE TABLE `friends`.`nameuser`
                    ( `id` INT NOT NULL AUTO_INCREMENT ,
                      `NameUser` INT NOT NULL ,
                       INDEX (`id`),
                       UNIQUE (`NameUser`))
                       ENGINE = InnoDB; ";
		$CreateTableListFrends = "CREATE TABLE `friends`.`friends`
                    ( `id` INT NOT NULL  ,
                      `FriendsList` JSON NOT NULL ,
                       INDEX (`id`)) ENGINE = InnoDB;";
		$CreateTableListEnemy = "CREATE TABLE `friends`.`enemy`
		            ( `id` INT NOT NULL ,
		              `EnemyList` JSON NOT NULL ,
		               INDEX (`id`)) ENGINE = InnoDB;";
		$CreateTableListIndirectFrends = "CREATE TABLE `friends`.`inderectfrends`
		            ( `id` INT NOT NULL ,
		             `FriendsList` JSON NOT NULL ,
		             INDEX (`id`)) ENGINE = InnoDB;";
		$CreateTableListIndirectEnemys = "CREATE TABLE `friends`.`inderectenemys`
		            ( `id` INT NOT NULL , `EnemyList`
		            INT NOT NULL ,
		            INDEX (`id`)) ENGINE = InnoDB; ";
		$ConfigTables = "ALTER TABLE `user` ADD INDEX(`NameUser`),
						 ALTER TABLE `user` ADD INDEX(`IndirectFriends`),
                         ALTER TABLE `user` ADD INDEX(`Enemys`),
                         ALTER TABLE `user` ADD INDEX(`IndirectEnemys`)​,";
		$keys = "
		ALTER TABLE `enemy`
           ADD CONSTRAINT `enemy_ibfk_1`
           FOREIGN KEY (`id`)
           REFERENCES `user` (`Enemys`)
           ON DELETE CASCADE ON UPDATE CASCADE;

        ALTER TABLE `friends`
            ADD CONSTRAINT `friends_ibfk_1`
            FOREIGN KEY (`id`)
            REFERENCES `user` (`Friens`)
            ON DELETE CASCADE ON UPDATE CASCADE;

        ALTER TABLE `inderectfrends`
            ADD CONSTRAINT `inderectfrends_ibfk_1`
            FOREIGN KEY (`id`)
             REFERENCES `user` (`IndirectFriends`)
             ON DELETE CASCADE ON UPDATE CASCADE;

        ALTER TABLE `user`
            ADD CONSTRAINT `user_ibfk_1`
            FOREIGN KEY (`NameUser`)
            REFERENCES `nameuser` (`id`)
            ON DELETE CASCADE ON UPDATE CASCADE;

        ALTER TABLE `inderectenemys`
            ADD CONSTRAINT `user_ibfk_2`
            FOREIGN KEY (`IndirectEnemys`)
            REFERENCES `inderectenemys` (`id`)
            ON DELETE CASCADE ON UPDATE CASCADE;";
	}

}
?>