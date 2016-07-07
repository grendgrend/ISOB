<?php

include 'server/DatabaseConfig.php';
include 'server/AbsDatabase.php';
include 'server/GalleryDatabase.php';

$GalleryDatabase = new galleryDatabase($host, $userName, $password, $database);

/*Twig modules*/
require_once './vendor/autoload.php';
$loader = new Twig_Loader_Filesystem(array('./templates/pagesTemplates','./templates/blocksTemplates'));
$twig = new Twig_Environment($loader);
echo $twig->render('index.tmpl',array(
    'showGallery'=>false,
    'showLK'=>true,
    'basketItem'=>'5',
    'gallery'=>$GalleryDatabase->returnGalleryItems(),
    'filter'=>$GalleryDatabase->returnGalleryTags()
));
?>