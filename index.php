<!DOCTYPE html>
    <head>
        <title>Página inicial | Projeto para Web com PHP</title> 
        <link rel="stylesheet" 
              href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css"> 
    
    </head>
    <body>
        <div class="container"> 
            <div class ="row">
                <div class="col-md-12">
                    <!--Topo //--> 
                    <?php 
                        include 'includes/topo.php';
                    ?>
                </div> 
            </div> 
            <div class="row" style="min-height: 500px;"> 
                <div class="col-md-12"> 
                    <!-- Menu //--> 
                    <?php 
                        include 'includes/menu.php';
                    ?> 
                </div> 
                <div class="col-md-10" style="padding-top: 50px;"> 
                <!-- Conteúdo //--> 
                <h2>Página Inicial</h2> 
                <?php
                    include 'includes/busca.php'; 
                ?> 

                <?php 
                    require_once 'includes/funcoes.php'; 
                    require_once 'core/conexao_mysql.php';
                    require_once 'core/sql.php'; 
                    require_once 'core/mysql.php'; 

            foreach($_GET as $indice => $dado) {
                $$indice= limparDados($dado); 
            }

            $data_atual = date('Y-m-d H:i:s') ;

            $criterio = [
                ['data_postagem', '<=', $data_atual]
            ]; 

            if(!empty($busca)) {
                $criterio[] = [
                    'AND',
                    'texto',
                    'like',
                    "%{%busca}%" 
                ];
            } 

            $post = buscar(
                'post', 
                [
                    'titulo',
                    'data_postagem',
                    'id', 
                    '(select nome 
                        from usuario
                        where usuario.id = post.usuario_id) as nome'
                
                ],
                $criterio,
                'data_postagem DESC' 

            );

    ?>





    </body>