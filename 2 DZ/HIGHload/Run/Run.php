<?php

namespace MMMOWWW\Run;
/*Трайт для мини работы*/
trait Runner {
	public $pathsClases =
		[
		"IUser" => "interface/IUser.php",
		"IUserRelations" => "interface/IUserRelations.php",
	];
	public $pathsIterfaces =
		[
		"IUser" => "interface/IUser.php",
		"IUserRelations" => "interface/IUserRelations.php",

	];
	public function Connection() {
		foreach ($pathsIterfaces as $key => $value) {
			require_once $value;
		};
		foreach ($pathsClases as $key => $value) {
			require_once $value;
		};
	}
};
function Connection($Dir) {
	//TODO : scandir(); сделать скан дериктории и запустить файлы
}
