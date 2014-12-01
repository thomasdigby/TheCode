<?php
class GalleryHub extends Page {

    static $description = "Gallery Listing page";
    private static $allowed_children = array('GalleryEvent');

    public static $db = array(
    );

    public static $has_one = array(
    );

    public static $has_many = array(
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","Metadata");

        return $fields;
    }

}
class GalleryHub_Controller extends Page_Controller {

}