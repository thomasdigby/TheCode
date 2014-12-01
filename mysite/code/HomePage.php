<?php
class Home extends Page {

    public static $db = array(
        "LinkImage" => "HTMLText",
        "FacebookLink" => "HTMLVarchar(255)",
        "InstagramLink" => "HTMLVarchar(255)",
        "VimeoLink" => "HTMLVarchar(255)",
        "SoundcloudLink" => "HTMLVarchar(255)",
    );

    private static $has_one = array(
        'Image' => 'Image',
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.Main", new UploadField('Image', 'Add Image'));
        $fields->addFieldToTab("Root.Main", new TextField('LinkImage', 'Add link to image'));

        $fields->removeFieldFromTab("Root.Main","Metadata");

        $fields->addFieldToTab("Root.SocialLinks", new TextField('FacebookLink', 'Link to Facebook'));
        $fields->addFieldToTab("Root.SocialLinks", new TextField('InstagramLink', 'Link to Instagram'));
        $fields->addFieldToTab("Root.SocialLinks", new TextField('VimeoLink', 'Link to Vimeo'));
        $fields->addFieldToTab("Root.SocialLinks", new TextField('SoundcloudLink', 'Link to Soundcloud'));

        return $fields;
    }

}
class Home_Controller extends Page_Controller {

}