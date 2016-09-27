&nbsp;
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-7aed471 modeling language!*/
&nbsp;
class Event
{
&nbsp;
&nbsp;&nbsp;//------------------------
&nbsp;&nbsp;// MEMBER VARIABLES
&nbsp;&nbsp;//------------------------
&nbsp;
&nbsp;&nbsp;//Event Attributes
&nbsp;&nbsp;private $name;
&nbsp;&nbsp;private $eventDate;
&nbsp;&nbsp;private $startTime;
&nbsp;&nbsp;private $endTime;
&nbsp;
&nbsp;&nbsp;//------------------------
&nbsp;&nbsp;// CONSTRUCTOR
&nbsp;&nbsp;//------------------------
&nbsp;
&nbsp;&nbsp;public function __construct($aName, $aEventDate, $aStartTime, $aEndTime)
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;$this->name = $aName;
&nbsp;&nbsp;&nbsp;&nbsp;$this->eventDate = $aEventDate;
&nbsp;&nbsp;&nbsp;&nbsp;$this->startTime = $aStartTime;
&nbsp;&nbsp;&nbsp;&nbsp;$this->endTime = $aEndTime;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;//------------------------
&nbsp;&nbsp;// INTERFACE
&nbsp;&nbsp;//------------------------
&nbsp;
&nbsp;&nbsp;public function setName($aName)
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = false;
&nbsp;&nbsp;&nbsp;&nbsp;$this->name = $aName;
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = true;
&nbsp;&nbsp;&nbsp;&nbsp;return $wasSet;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function setEventDate($aEventDate)
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = false;
&nbsp;&nbsp;&nbsp;&nbsp;$this->eventDate = $aEventDate;
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = true;
&nbsp;&nbsp;&nbsp;&nbsp;return $wasSet;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function setStartTime($aStartTime)
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = false;
&nbsp;&nbsp;&nbsp;&nbsp;$this->startTime = $aStartTime;
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = true;
&nbsp;&nbsp;&nbsp;&nbsp;return $wasSet;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function setEndTime($aEndTime)
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = false;
&nbsp;&nbsp;&nbsp;&nbsp;$this->endTime = $aEndTime;
&nbsp;&nbsp;&nbsp;&nbsp;$wasSet = true;
&nbsp;&nbsp;&nbsp;&nbsp;return $wasSet;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function getName()
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return $this->name;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function getEventDate()
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return $this->eventDate;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function getStartTime()
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return $this->startTime;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function getEndTime()
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return $this->endTime;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function equals($compareTo)
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return $this == $compareTo;
&nbsp;&nbsp;}
&nbsp;
&nbsp;&nbsp;public function delete()
&nbsp;&nbsp;{}
&nbsp;
}
<p></p>