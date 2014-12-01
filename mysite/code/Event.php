<?php

class CalendarEvent extends Page {
	static $description = "The Event Page";

	static $db = array(
		'Year' => 'Int',
		'Month' => 'Int',
		'Day' => 'Int'
	);
	static $has_one = array(
		'Photo' => 'Image'
	);

	public static $has_many = array(
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab("Root.Main", new NumericField('Year', 'Year'), 'Content');
		$fields->addFieldToTab("Root.Main", new NumericField('Month', 'Month'), 'Content');
		$fields->addFieldToTab("Root.Main", new NumericField('Day', 'Day'), 'Content');
		$fields->addFieldToTab("Root.Main", new UploadField('Photo'));
		$fields->removeFieldFromTab("Root.Main","Metadata");

		return $fields;
	}
}

class CalendarEvent_Controller extends Page_Controller {
    public function PrevNextPage($Mode = 'next') {

        if($Mode == 'next'){
            $Where = "ParentID = ($this->ParentID) AND Sort > ($this->Sort)";
            $Sort = "Sort ASC";
        }
        elseif($Mode == 'prev'){
            $Where = "ParentID = ($this->ParentID) AND Sort < ($this->Sort)";
            $Sort = "Sort DESC";
        }
        else{
            return false;
        }
        return DataObject::get("SiteTree", $Where, $Sort, null, 1);
    }
	public function Test() {
		$parent = $this->Parent->RecordClassName;
		Debug::Show($parent);
		return $this->Parent->ID;
	}

	public function StringMonth(){
		// setup months and days
		$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		//$month = var from db;
		$monthName = $months[$this->Month-1];
		return $monthName;
	}

}
