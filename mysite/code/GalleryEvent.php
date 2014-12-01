<?php
class GalleryEvent extends Page {

    static $description = "Gellery Listing page";

    public static $db = array(
        "Description" => "Text",
        "Location" => "Text",
        "Date" => "Date"
    );

    public static $has_one = array(
    );

    public static $has_many = array(
        'GalleryImages' => 'GalleryImage'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $gridFieldConfig = GridFieldConfig::create()->addComponents(
            new GridFieldToolbarHeader(),
            new GridFieldAddNewButton('toolbar-header-right'),
            new GridFieldSortableHeader(),
            new GridFieldDataColumns(true),
            new GridFieldPaginator(15),
            new GridFieldEditButton(),
            new GridFieldDeleteAction(),
            new GridFieldDetailForm(),
            new GridFieldSortableRows('SortOrder')
        );

        $fields->addFieldToTab("Root.Main", new TextField('Description', 'Description'), 'Content');
        $fields->addFieldToTab("Root.Main", new TextField('Location', 'Location'), 'Content');
        $datefield = new DateField('Date', 'Date (01/01/2014)');
        $datefield->setConfig('showcalendar', true);
        $datefield->setConfig('dateformat', 'dd/MM/yyyy');

        $fields->addFieldToTab("Root.Main", $datefield, 'Content');

        $fields->addFieldToTab("Root.Images", new GridField("GalleryImages", "Images", $this->GalleryImages(), $gridFieldConfig));
        $fields->removeFieldFromTab("Root.Main","Metadata");
        $fields->removeFieldFromTab("Root.Main","Content");


        return $fields;
    }

}
class GalleryEvent_Controller extends Page_Controller {

}