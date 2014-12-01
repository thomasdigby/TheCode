<?php
class VideoHolder extends Page {
    static $allowed_children = array('MusicPage');

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","Content");
        $fields->removeFieldFromTab("Root.Main","Metadata");

        return $fields;
    }
}
class VideoHolder_Controller extends Page_Controller {

    // protected $currentNumber = 0;

    public function videos(){

        // $queryNum = $this->request->param('ID');
        // $start = 0;
        // $num = 2;

        // // Debug::Show($queryNum);

        // if ($queryNum != null){
        //  $start = $queryNum;
        // }

        $ds = new ArrayList();
        $ds->merge(DataObject::get($obj="Video"));
        //$ds->limit(2);

        //$this->currentNumber = $queryNum + 2;

        // Debug::Show($ds);

        $sorted = $ds->sort('Created', 'DESC');
        return $sorted;

    }

    // public function getNext(){
    //  return $this->currentNumber;
    // }
}
