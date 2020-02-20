<?php

	class Users {

		private function requireParams($arr) {
			if (!is_array($arr))
				throw new InvalidArgumentException('array required');
			$keys = array_keys(_MainModel::$params_url);
			$diff = array_diff($arr, $keys);
			if (!empty($diff)) {
				_MainModel::viewJSON(array('error' => implode(', ', $diff) . ' required'));
				die();
			}
		}

		private function checkedInt($key, $default = 0, $arr = null) {
			if (is_null($arr))
				$arr = _MainModel::$params_url;
			if (isset($arr[$key])) {
				$val = $arr[$key];
				if (filter_var($val, FILTER_VALIDATE_INT) === false) {
					_MainModel::viewJSON(['error' => "invalid $key parameter type; must be int"]);
					die();
				}
				return intval($val);
			}
			return $default;
		}

		public function getUsersList() {
			$page = $this->checkedInt('page');
			$records = $this->checkedInt('records', 10);
			$result = _MainModel::table('users')->get()->pagination($page, $records)->send();
			_MainModel::viewJSON($result);
		}

		public function getUserInfo() {
			$this->requireParams(['id']);
			$id = $this->checkedInt('id');
			$result = _MainModel::table('users')->get()->filter(array('id' => $id))->send();
			_MainModel::viewJSON($result);
		}

		public function searchUser() {
			$this->requireParams(['login']);
			$login = _MainModel::$params_url['login'];
			$result = _MainModel::table('users')->get()->search(array('login' => $login))->send();
			_MainModel::viewJSON($result);
		}

	}

?>