<?php
    require_once './vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem(array('./templates/pagesTemplates','./templates/blocksTemplates'));
    $twig = new Twig_Environment($loader);
    echo $twig->render('index.tmpl',array(
        'showGallery'=>false,
        'showLK'=>true,
        'basketItem'=>'2',
        'gallery'=>array(
           array(
                'SRC'=>'1.jpg',
                'name'=>'совушкин',
                'price'=>500
            ),
            array(
                'SRC'=>'2.jpg',
                'name'=>'котик в сосновом бору',
                'price'=>300
            )
        )
    ));
?>