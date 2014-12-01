<?php

class Calendar extends Page {
	static $description = 'The Calendar Page';
    static $allowed_children = array('CalendarEvent');

	static $db = array(
	);
	static $has_one = array(
	);

	public static $has_many = array(
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main","Metadata");
		return $fields;
	}
}

class Calendar_Controller extends Page_Controller {

	public static $allowed_actions = array (
		'date'
	);

	protected $properDate = false;
	protected $nextLink = false;
	protected $prevLink = false;
	protected $year = false;
	protected $month = false;

	public function date(){
		// setup months and days
		$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		$days = array(
				'01' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
				'02' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28'),
				'03' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
				'04' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'),
				'05' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
				'06' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'),
				'07' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
				'08' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
				'09' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'),
				'10' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
				'11' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'),
				'12' => array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
			);
		$year = $this->request->param('ID');
		$month = $this->request->param('OtherID');
		// get and cache the CalendarEvents
		$holder = CalendarEvent::get()->First();
		$ds = new ArrayList();
		$ds->merge(DataObject::get($obj='CalendarEvent')->filter('Year', $year)->filter('Month', $month));
		// Set this year
		$this->year = $year;
		// create an object to hold the array to send to the front end
		$values = new ArrayList();
		// check if input matches a pattern, otherwise issue an error
		if(!preg_match('/^\d+$/', $year))
		return $this->httpError(404, 'Not a valid year');
		// If we only have the year then return array of months + year + prev and next
		if(!empty($year) && empty($month) && $month == ''){
			// Set nextLink and prevLink
			$this->nextLink = $year + 1;
			$this->prevLink = $year - 1;
			// set counter for creating links
			$number = 1;
			foreach ($months as $month) {
				$values->push(new ArrayData(array(
					'Date' => $month,
					'Year' => $year,
					'Number' => sprintf('%02s', $number)
				)));
				$number++;
			}
		} else if(!empty($year) && !empty($month) && $month != ''){
			// Set month
			$monthName = $months[intval($month)-1];
			// $this->month = sprintf('%02s', $month);
			$this->month = $monthName;
			// Set nextLink and prevLink
			$this->nextLink = sprintf('%02s', $month + 1);
			$this->prevLink = sprintf('%02s', $month - 1);
			$number = 1;
			foreach ($days[$month] as $date) {
				$currentEventLink = '';
				// Does the current number have an event?
				if($ds){
					foreach ($ds as $event) {
						if($event->Day == $date){
							// Debug::Show($event);
							$currentEventLink = $event->URLSegment;
						}
					}
				}
				$values->push(new ArrayData(array(
					'Date' => $date,
					'Year' => $year,
					'Number' => sprintf('%02s', $number),
					'EventLink' => $currentEventLink
				)));
				$number++;
				$currentEventLink = '';
			}
		}
		$this->properDate = $values;// assign the DataObjectSet to $this->properDate
		// template engine needs that to render RosterPage_alts.ss
		return array();
	}

	// getter for the memberdata, to be used in the template
	public function getDate(){
		return $this->properDate;
	}
	public function getNextLink(){
		return $this->nextLink;
	}
	public function getPrevLink(){
		return $this->prevLink;
	}
	public function getYear(){
		return $this->year;
	}
	public function getMonth(){
		return $this->month;
	}
	public function showPrevYear() {
		if($this->year == 2013){
			return false;
		} else if ($this->month == 'Jan'){
			return false;
		} else {
			return true;
		}
	}
	public function showNextYear() {
		if($this->year == 2015){
			return false;
		} else if ($this->month == 'Dec'){
			return false;
		} else {
			return true;
		}
	}
	public function showPrevMonth() {
		if($this->month == 'Jan' || $this->month == false){
			return false;
		} else {
			return true;
		}
	}
	public function showNextMonth() {
		if($this->month == 'Dec' || $this->month == false){
			return false;
		} else {
			return true;
		}
	}

}
