<?php

	class Users extends _MainModel {

		public function getUsersList() {
			$page = $this->checkedInt('page', 1);
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
			$result = self::table('users')->get();
			if (self::is_var('login'))
				$result = $result->search(array('login' => self::$params_url['login']));
			$page = $this->checkedInt('page', 1);
			$records = $this->checkedInt('records', 10);
			$result = $result->pagination($page, $records)->send();
			self::viewJSON($result);
		}

	}

?>