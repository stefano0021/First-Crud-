<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Editar Noticias');
    
    
    use \App\Entity\Noticias;

    // //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    //Validacao ID  
    if (!isset($_GET['id']) ||!is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

        //consulta Noticias
        $obVaga = Noticias::getNoticias($_GET['id']);
        
        //Validacao das Noticias
        if(!$obNoticias instanceof Noticias) {
            header('location: index.php?status=error');
            exit;
        }   

        //Validacao do post 
        if(isset($_POST['titulo'], $_POST['descricao'], $_POST['autor'], $_POST['data'], $_POST['status'])){
            $obNoticias->titulo = $_POST['titulo'];
            $obNoticias->descricao = $_POST['descricao'];
            $obNoticias->autor = $_POST['autor'];
            $obNoticias->data = $_POST['data'];
            $obNoticias->status = $_POST['status'];
        
            $obNoticias->atualizar();
            // echo "<pre>"; print_r($this); echo "</pre>"; exit;
        
       
        
        header('location: index.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/formulario.php';
    require __DIR__.'/includes/footer.php';
    ?>