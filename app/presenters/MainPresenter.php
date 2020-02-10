<?php

	/*
	 * Every class derriving from Model has access to $this->db
	 * $this->db is a PDO object
	 * Has a config in /core/config/database.php
	 * branch b1
	 */

	class MainPresenter {

		function __construct() {
			try {
				$r = new ReflectionClass($this);
			} catch (ReflectionException $e) {
			}
			$name_class = $r->name;

			if ($name_class::$isSecurity) {
				echo (new UsersTokens())->isSecurity();
			}
		}

		public function renderLabel($folder, $file) {

			if (!empty($folder) && !empty($file)) {

				$path = ROOT . "/app/labels/" . $folder . "/" . $file . ".json";

				if (file_exists($path)) {
					require_once($path);
				} else {
					echo "ERROR! Not found labels " . $path;
				}

			} else {
				echo "Ошибка!";
			}
		}


	}

?>