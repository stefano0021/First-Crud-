<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Noticias;
    //Validacao ID  
    if (!isset($_GET['id']) ||!is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

        //consulta Noticias
        $obNoticias = Noticias::getNoticia($_GET['id']);
        
        //Validacao das Noticias
        if(!$obNoticias instanceof Noticias) {
            header('location: index.php?status=error');
            exit;
        }   

        //Validacao das Noticias 
        if(isset($_POST['excluir'])) {
            $obNoticias->excluir();
            header('location: index.php?status=success');
            exit;
        }
   
    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarexclusao.php';
    require __DIR__.'/includes/footer.php';
    
    ?>