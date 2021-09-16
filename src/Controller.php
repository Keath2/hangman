<?php
	namespace Keath2\hangman\Controller;
	use function Keath2\hangman\View\showGame;
	
	function startGame() {
		showGame();
		echo "Start";
	}
?>