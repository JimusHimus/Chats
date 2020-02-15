<?php

	class Users {

		public function getUsersList() {
			$start = intval(_MainModel::$params_url['start'] ?? 0);
			$limit = intval(_MainModel::$params_url['limit'] ?? 10);
			$result = _MainModel::table('users')->get()->pagination($start, $limit)->send();
			_MainModel::viewJSON($result);
		}

		public function getUserInfo() {
			if (!isset(_MainModel::$params_url['id'])) {
				_MainModel::viewJSON(['error' => 'id parameter required']);
				return;
			}
			$id = _MainModel::$params_url['id'];
			$result = _MainModel::table('users')->get()->filter(array('id'=> $id))->send();
			_MainModel::viewJSON($result);
		}

	}

?>