<?php
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Controller\InputValidator.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Persistence\PersistenceEventRegistration.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\Event.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\Participant.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\Registration.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\RegistrationManager.php';


class Controller {
	public function __construct() {
	}
	
	public function createParticipant($participant_name) {
		// 1. Validate input
		$name = InputValidator::validate_input($participant_name);
			if ($name == null || strlen($name) == 0) {
				throw new Exception("Participant name cannot be empty!");
			} else {
				//2. Load all of the data
				$pm = new PersistenceEventRegistration();
				$rm = $pm->loadDataFromStore();
				
				// 3. Add the new participant
				$participant = new Participant($name);
				$rm->addParticipant($participant);
				
				// 4. Write all of the data
				$pm->writeDataToStore($rm);
			}
	}
	
	public function createEvent($event_name, $event_date, $starttime, $endtime) {
		
	}
	
	public function register($aParticipant, $aEvent) {
		// 1. Load all of the data
		$pm = new PersistenceEventRegistration();
		$rm = $pm->loadDataFromStore();
		
		// 2. Find the participant
		$myparticipant == NULL; 
		foreach ($rm->getParticipants() as $participant) {
			if (strcmp($participant->getName(), $aParticipant) == 0) {
				$myparticipant = $participant;
				break;
			}
		}
		
		// 3. Find the event
		$myEvent = NULL;
		foreach ($rm->getEvents() as $event) {
			if (strcmp($event->getName(), $aEvent) == 0) {
				$myevent = $event;
				break;
			}
		}
		
		// 4. Register for the event
		$error = "";
		if ($myparticipant != NULL && $myevent != NULL) {
			$myregistration = new Registration($myparticipant, $myevent);
			$rm->addRegistration($myregistration);
			$pm->writeDataToStore($rm);
		} else {
			if ($myparticipant == NULL) {
				$error .= "@1Participant ";
				if ($aParticipant != NULL) {
					$error .= $aParticipant;
				}
				$error .= " not found! ";
			}
			if ($myEvent == NULL) {
				$error .= "@2Event ";
				if ($aEvent != NULL) {
					$error .= $aEvent;
				}
				$error .= " not found! ";
			}
			throw new Exception(trim($error));
		}
	}
}
?>