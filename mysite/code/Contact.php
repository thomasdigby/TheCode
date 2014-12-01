<?php
class Contact extends Page {

	public static $db = array(
        'CSS_Class' => 'Text'
	);

	public static $has_one = array(
	);

	public function getSettingsFields() {
        $fields = parent::getSettingsFields();
        $fields->addFieldToTab('Root.Settings', new TextField('CSS_Class'));

        return $fields;
    }

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main","Metadata");
		return $fields;
	}

}
class Contact_Controller extends Page_Controller {

}
