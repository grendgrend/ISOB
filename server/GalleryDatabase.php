<?php

class galleryDatabase extends absDatabase{
    function __construct($host, $user, $pas, $DB) {
        parent::__construct($host, $user, $pas, $DB);
    }
    private function getGalleryItems (){//Отправляет базе запрос на получение всех картин галереи
        $this->resultItems = $this->mysqli->query("SELECT * FROM Items");
    }
    private function getGalleryTags (){// Отправляет запрос на получение всех поисковых тегов галереи
        $this->resultTags = $this->mysqli->query("SELECT * FROM tags");
    }
    public function returnGalleryItems (){// Метод формирует массив значений для дальнейшей отрисовки. Он сам обращается к методу, который посылает запрос к БД. Возващает массив картин и их свойств
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
    public function returnGalleryTags () {// Метод формирует и отдает массив тегоы для отрисовки. Он сам обращается к методу, который посылает запрос к БД.
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