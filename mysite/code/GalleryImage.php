<?php
class GalleryImage extends DataObject {
    public static $db = array(
        'SortOrder' => 'Int',
    );

    public static $has_one = array(
        'GalleryEvent' => 'GalleryEvent',
        'Image' => 'Image'
    );

    static $summary_fields = array(
        'Image.StripThumbnail' => 'Image'
    );

    public static $default_sort='SortOrder';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab("Root.Main","SortOrder");
        $fields->removeFieldFromTab("Root.Main","GalleryEventID");

        $fields->addFieldToTab("Root.Main", new UploadField('Image', 'Gallery Image'));
        $fields->removeFieldFromTab("Root.Main","Metadata");

        return $fields;
    }

}