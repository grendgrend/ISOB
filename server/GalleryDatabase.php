<?php

class galleryDatabase extends absDatabase{
    function __construct($host, $user, $pas, $DB) {
        parent::__construct($host, $user, $pas, $DB);
    }
    private function select ($item, $table){// Отправляет запрос на получение $item из $table
        $this->result = $this->mysqli->query("SELECT $item FROM $table");
    }
    public function returnGalleryItems (){// Метод формирует массив значений для дальнейшей отрисовки. Он сам обращается к методу, который посылает запрос к БД. Возващает массив картин и их свойств
        $this->select('*','Items');
        $items=array();
        foreach ($this->result as $value){
            $items[]=array(
                'URL'=>$value['url'],
                'name'=>$value['name'],
                'price'=>$value['price'].'p.'
            );
        }
        shuffle($items);
        return $items;
    }
    public function returnGalleryTags () {// Метод формирует и отдает массив тегов для отрисовки. Он сам обращается к методу, который посылает запрос к БД.
        $this->select('*','tags');
        $tags=array();
        foreach ($this->result as $value){
            $tags[]=array(
                'name'=>$value['tag']
            );
        }
        return $tags;
    }
}

?>