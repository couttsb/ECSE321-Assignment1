<?php
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Controller\InputValidator.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Persistence\PersistenceEventRegistration.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\Event.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\Participant.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\Registration.php';
require_once 'C:\Users\Brent\ECSE-Assignment1\Online\EventRegistration\Model\RegistrationManager.php';

class Controller {
	private $filename;
	public function __construct($filename = 'data.txt') {
		chmod('data.txt', 0644);
		$this->filename = $filename;
	}
	
	public function createParticipant($participant_name) {
		// 1. Validate input
		$name = InputValidator::validate_input($participant_name);
			if ($name == null || strlen($name) == 0) {
				throw new Exception("Participant name cannot be empty!");
			} else {
				// 2. Load all of the data
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
		// 1. Validate input
		$name = InputValidator::validate_input($event_name, $event_date, $starttime, $endtime);
		$error = "";
			if ($name == null || strlen($name) == 0) {
				$error .= "@1Event name cannot be empty! ";
			} if (strtotime($event_date) == false || trim($event_date) == "") {
				$error .= "@2Event date must be specified correctly (YYYY-MM-DD)! ";
			} if (strtotime($starttime) == false || trim($starttime) == "") {
				$error .= "@3Event start time must be specified correctly (HH:MM)! ";
			} if (strtotime($endtime) == false || trim($endtime) == "") {
				$error .= "@4Event end time must be specified correctly (HH:MM)! ";
			} if ($endtime != null && $starttime != null && date('H:i', strtotime($starttime)) > date('H:i', strtotime($endtime))) {
				$error .= "@5Event end time cannot be before event start time!";
			} if (trim($error) > 0) {
				throw new Exception(trim($error));
			} else {
				// 2. Load all of the data including event name, event date, starttime, and endtime
				$pm = new PersistenceEventRegistration();
				$rm = $pm->loadDataFromStore();
				
				$aName = NULL;
				foreach ($rm->getEvents() as $event) {
					if (strcmp($event->getName(), $aName) == 0) {
						$aName = $event;
						break;
					}
				}
				$aEventDate = NULL;
				foreach ($rm->getEvents() as $event) {
					if (strcmp($event->getEventDate(), $aEventDate) == 0) {
						$aEventDate = $event;
						break;
					}
				}
				$aStartTime = NULL;
				foreach ($rm->getEvents() as $event) {
					if (strcmp($event->getStartTime(), $aStartTime) == 0) {
						$aStartTime = $event;
						break;
					}
				}
				$aEndTime = NULL;
				foreach ($rm->getEvents() as $event) {
					if (strcmp($event->getEndTime(), $aEndTime) == 0) {
						$aEndTime = $event;
						break;
					}
				}
				
				// 3. Add the new event 
				$aEvent = new Event($aName, $aEventDate, $aStartTime, $aEndTime);
				$rm->addEvent($aEvent);
				
				// 4. Write all of the data
				$pm->writeDataToStore($rm);
			}
	}
	
	public function register($aParticipant, $aEvent) {
		// 1. Load all of the data
		$pm = new PersistenceEventRegistration();
		$rm = $pm->loadDataFromStore();
		
		// 2. Find the participant
		$myparticipant = NULL; 
		foreach ($rm->getParticipants() as $participant) {
			if (strcmp($participant->getName(), $aParticipant) == 0) {
				$myparticipant = $participant;
				break;
			}
		}
		
		// 3. Find the event
		$myevent = NULL;
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
			if ($myevent == NULL) {
				$error .= "@2Event ";
				if ($aEvent != NULL) {
					$error .= $aEvent;
				}
				$error .= " not found!";
			}
			throw new Exception(trim($error));
		}
	}
}
?>