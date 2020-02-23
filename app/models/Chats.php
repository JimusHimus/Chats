<?php

	class Chats extends _MainModel {

		public function getChatsList() {
			$page = $this->checkedInt('page', 1);
			$records = $this->checkedInt('records', 10);
			$result = self::table('chats')->get()->pagination($page, $records)->send();
			self::viewJSON($result);
		}

		public function getChatsByUser() {
			$this->requireParams(['userId']);
			$result = self::table('chat_members')->get(['chat_id', 'user_role']);
			$result = $result->filter(array('user_id' => $this->checkedInt('userId', -1)));
			$page = $this->checkedInt('page', 1);
			$records = $this->checkedInt('records', 10);
			$result = $result->pagination($page, $records)->send();
			self::viewJSON($result);
		}

/*		public function findChatsByMessage() {
			$this->requireParams(['userId']);
			$result = self::table('chat_members')->get(['chat_id', 'user_role']);
			$result = $result->filter(array('user_id' => $this->checkedInt('userId', -1)));
			$page = $this->checkedInt('page', 1);
			$records = $this->checkedInt('records', 10);
			$result = $result->pagination($page, $records)->send();
			self::viewJSON($result);
		}*/

		public function createChat() {
			$this->requireParams(['name', 'users']);
			//todo
		}

	}