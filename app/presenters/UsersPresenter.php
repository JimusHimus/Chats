<?php

	class UsersPresenter extends MainPresenter {

		public static $isSecurity = false;

		public function getUsersList() {
			(new Users())->getUsersList();
		}

		public function getUserInfo() {
			(new Users())->getUserInfo();
		}

	}