<?php

class galleryDatabase extends absDatabase{
    function __construct($host, $user, $pas, $DB) {
        parent::__construct($host, $user, $pas, $DB);
    }
    private function getGalleryItems (){
        $this->resultItems = $this->mysqli->query("SELECT * FROM Items");
    }
    private function getGalleryTags (){
        $this->resultTags = $this->mysqli->query("SELECT * FROM tags");
    }
    public function returnGalleryItems (){
        $this->getGalleryItems();
        $items=array();
        foreach ($this->resultItems as $value){
            $items[]=array(
                'URL'=>$value['url'],
                'name'=>$value['name'],
                'price'=>$value['price'].'p.'
            );
        }
        shuffle($items);
        return $items;
    }
    public function returnGalleryTags () {
        $this->getGalleryTags();
        $tags=array();
        foreach ($this->resultTags as $value){
            $tags[]=array(
                'name'=>$value['tag']
            );
        }
        return $tags;
    }
}

?>