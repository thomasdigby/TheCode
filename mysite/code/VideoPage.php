<?php
class Video extends Page {

    static $db = array(
        'Link' => 'HTMLText',
        'Title' => 'HTMLText',
        'Subtitle' => 'HTMLText'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","Content");

        $fields->addFieldToTab('Root.Main', new TextField('Link'));
        $fields->addFieldToTab('Root.Main', new TextField('Title'));
        $fields->addFieldToTab('Root.Main', new TextField('Subtitle'));
        $fields->removeFieldFromTab("Root.Main","Metadata");

        return $fields;
    }

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

}

class Video_Controller extends Page_Controller {
    public function GetParentClass() {
        $parent = $this->Parent->RecordClassName;
        return $parent;
    }
}
