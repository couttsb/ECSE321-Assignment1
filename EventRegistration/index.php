<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Event Registration</title>
		<style>
			.error {color: #FF0000;} 
		</style>
	</head>
	<body>		
		<?php 
		require_once "Model/Event.php";
		require_once "Model/Participant.php";
		require_once "Model/RegistrationManager.php";
		require_once "Persistence/PersistenceEventRegistration.php";
		
		session_start();
		
		// Retreive the data from the model
		$pm = new PersistenceEventRegistration();
		$rm = $pm->loadDataFromStore();
		
		echo "<form action='register.php' method='post'>";
		
		echo "<p>Name? <select name='participantspinner'>";
		foreach ($rm->getParticipants() as $participant) {
			echo "<option>" . $participant->getName() . "</option>";
		}
		echo "</select><span class='error'>";
		if (isset($_SESSION['errorRegisterParticipant']) && !empty($_SESSION['errorRegisterParticipant'])) {
			echo " * " . $_SESSION["errorRegisterParticipant"];
		}
		echo "</span></p>";
		
		echo "<p>Event? <select name='eventspinner'>";
		foreach ($rm->getEvents() as $event) {
			echo "<option>" . $event->getName() . "</option>";
		}
		echo "</select><span class='error'>";
		if (isset($_SESSION['errorRegisterEvent']) && !empty($_SESSION['errorRegisterEvent'])) {
			echo " * " . $_SESSION["errorRegisterEvent"];
		}
		echo "</span></p>";
		
		
		echo "<p><input type='submit' value='Register' /></p>";
		echo "</form>";
		?>
		
		<form action="addparticipant.php" method="post">
			<p>Name? <input type="text" name="participant_name" /><span class="error">
			<?php  
			if (isset($_SESSION['errorParticipantName']) && !empty($_SESSION['errorParticipantName'])) {
				echo " * " . $_SESSION["errorParticipantName"];
			}
			?>
			</span></p>
			<p><input type="submit" value="Add Participant"/></p>
		</form>
		
		<form action="addevent.php" method="post">
		<p>Event Name? <input type="text" name="event_name" /><span class="error">
			<?php echo "</select><span class='error'>";
					if (isset($_SESSION['errorEventName']) && !empty($_SESSION['errorEventName'])) {
						echo " * " . $_SESSION["errorEventName"];
					}
				echo "</span></p>";?></span></p>
				
		<p>Date? <input type="date" name="event_date"
				value="<?php echo date('Y-m-d'); ?>" /><span class="error">
				<?php echo "</select><span class='error'>";
						if (isset($_SESSION['errorEventDate']) && !empty($_SESSION['errorEventDate'])) {
							echo " * " . $_SESSION["errorEventDate"];
						}
					echo "</span></p>";?></span></p>
			
		<p>Start time? <input type="time" name="starttime"
				value="<?php echo date('H:i'); ?>" /><span class="error">
				<?php echo "</select><span class='error'>";
						if (isset($_SESSION['errorStartTime']) && !empty($_SESSION['errorStartTime'])) {
								echo " * " . $_SESSION["errorStartTime"];
						}
					echo "</span></p>";?></span></p>
				
		<p>End time? <input type="time" name="endtime"
				value="<?php echo date('H:i');?>" /><span class="error">
				<?php echo "</select><span class='error'>";
						if (isset($_SESSION['errorEndTime']) && !empty($_SESSION['errorEndTime'])) {
							echo " * " . $_SESSION["errorEndTime"];
						}
					echo "</span></p>";?>	
					
		<?php echo "</select><span class='error'>";
				if (isset($_SESSION['errorStartTimeBeforeEndTime']) && !empty($_SESSION['errorStartTimeBeforeEndTime'])) {
					echo " * " . $_SESSION["errorStartTimeBeforeEndTime"];
				}
			echo "</span></p>";?></span></p>
		<p><input type="submit" value="Add Event" /></p>
		</form>
	</body>
</html>