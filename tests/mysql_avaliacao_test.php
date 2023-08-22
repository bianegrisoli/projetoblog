<?php

require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

insert_teste('10', 'bom', '123', '1', '15/08');
buscar_teste();
update_teste(38, 'murilo','silva@gmail.com');
buscar_teste();

//Teste inserção banco de dados
function insert_teste($nota, $comentario, $usuario, $post, $data) : void
{
    $dados = ['nota'=> $nota, 'comentario' => $comentario, 'usuario' => $usuario, 'post' => $post, 'data' => $data];
    insere('usuario',$dados);
}

//Teste select banco de dados
function buscar_teste() : void
{
    $usuarios = buscar('usuario', [ 'id','nota','comentario'],[],'');
    print_r($usuarios);
}

//Teste update banco de dados
function update_teste($id, $nota, $comentario) : void
{
    $dados = ['nota' => $nota, 'comentario' => $comentario];
    $criterio = [['id', '-', $id]];
    atualiza('usuario',$dados,$criterio);
}