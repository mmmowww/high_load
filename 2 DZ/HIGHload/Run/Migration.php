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
     ( `id` INT NOT NULL AUTO_INCREMENT ,
      `NameUser` TEXT NOT NULL , `frends`
      TEXT NOT NULL , `inderectFrends`
      TEXT NOT NULL , `Enemy`
      TEXT NOT NULL , `inderectfEnemy`
      TEXT NOT NULL ,
      PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	}

}
?>