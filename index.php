<?php
/*Database config*/
$host="localhost";
$userName="root";
$password="1";
$database="Sovushkin";

/*Mysql connect*/
$mysqli = new mysqli($host, $userName, $password, $database);
$mysqli->set_charset("utf8");
$resultItems = $mysqli->query("SELECT * FROM Items");//Убрать
$resultTags = $mysqli->query("SELECT * FROM tags");//Убрать
$items=array();
foreach ($resultItems as $value){
    $items[]=array(
        'URL'=>$value['url'],
        'name'=>$value['name'],
        'price'=>$value['price'].'p.'
    );
}
$tags=array();
foreach ($resultTags as $value){
    $tags[]=array(
        'name'=>$value['tag']
    );
}
shuffle($items);
/*Twig modules*/
    require_once './vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem(array('./templates/pagesTemplates','./templates/blocksTemplates'));
    $twig = new Twig_Environment($loader);
    echo $twig->render('index.tmpl',array(
        'showGallery'=>false,
        'showLK'=>true,
        'basketItem'=>'5',
        'gallery'=>$items,
        'filter'=>$tags
    ));
?>