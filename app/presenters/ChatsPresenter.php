<?php

	class ChatsPresenter extends MainPresenter {

		public static $isSecurity = false;

		public function getChatsList() {
			(new Chats())->getChatsList();
		}

		public function getChatsByUser() {
			(new Chats())->getChatsByUser();
		}

		public function createChat() {
			(new Chats())->createChat();
		}

	}