
<?php
// Include the library
require __DIR__ . '/alexa-endpoint/autoload.php';
/**
 * Import classes
 * Note, if there is already a class named 'User' in your scripts, use this:
 * use MayBeTall\Alexa\Endpoint\User as AlexaUser;
 * Then use 'AlexaUser' instead of 'User'.
 */
use MayBeTall\Alexa\Endpoint\Alexa;
use MayBeTall\Alexa\Endpoint\User;
// Sets everything up.
Alexa::init();
// User launched the skill.
Alexa::enters(function() {
	// Say something, wait for an answer, ask again if no reply is given
	Alexa::ask('Wilkommen bei Bufimu.', "Starte ene Suche, nach einer Kategorie, Interpreten, Genre oder Album. Oder starte unser Quiz.");
});

	// User triggered the 'DummyIntend' intent from the Skill Builder
	User::triggered('NameDummy', function() {
		// Get the slot named 'dummy' sent by the Skill Builder
		$dummy = User::stated('dummy');
		// Get remembered values
		$rememberedDummy = Alexa::recall('rememberedDummy');
		// If user stated an utterance, continue
		if ($dummy) {
			// Remember the user's input
			Alexa::remember('dummy', $dummy);
			// Ask something
			Alexa::ask("Ich starte doe Suche nach $dummy"	);
					}	 else {
					// If the user didn't say dummy, say something then end the skill.
					Alexa::say("Starte Bufimu neu wenn du etwas Suchen willst.");
					}		

	Alexa::exits(function() {
		/**
		 * Alexa will not say anything you send in reply, but it is important
		 * to have this here because she will give an error message if we
		 * don't acknowledge the skill's exit.
		 */
	});
	
});
		


