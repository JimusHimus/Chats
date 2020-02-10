<?php

	class TestPresenter extends MainPresenter {

		public static $isSecurity = false;

		public function example() {
			(new TestModel())->example();
		}

	}