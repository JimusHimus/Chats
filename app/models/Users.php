<?php

	class Users extends _MainModel {

		private function requireParams($arr) {
			if (!is_array($arr))
				throw new InvalidArgumentException('array required');
			$keys = array_keys(self::$params_url);
			$diff = array_diff($arr, $keys);
			if (!empty($diff)) {
				self::viewJSON(array('error' => implode(', ', $diff) . ' required'));
				die();
			}
		}

		private function checkedInt($key, $default = 0, $arr = null) {
			if (is_null($arr))
				$arr = self::$params_url;
			if (isset($arr[$key])) {
				$val = $arr[$key];
				if (filter_var($val, FILTER_VALIDATE_INT) === false) {
					self::viewJSON(['error' => "invalid $key parameter type; must be int"]);
					die();
				}
				return intval($val);
			}
			return $default;
		}

		public function getUsersList() {
			$page = $this->checkedInt('page');
			$records = $this->checkedInt('records', 10);
			$result = self::table('users')->get()->pagination($page, $records)->send();
			self::viewJSON($result);
		}

		public function getUserInfo() {
			$this->requireParams(['id']);
			$id = $this->checkedInt('id');
			$result = self::table('users')->get()->filter(array('id' => $id))->send();
			self::viewJSON($result);
		}

		public function searchUser() {
			$this->requireParams(['login']);
			$login = self::$params_url['login'];
			$result = self::table('users')->get()->search(array('login' => $login))->send();
			self::viewJSON($result);
		}

	}

?>