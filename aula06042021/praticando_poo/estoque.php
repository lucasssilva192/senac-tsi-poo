<?php

require('classes/Usuario.class.php');
require('classes/Fabricante.class.php');
require('classes/Estoque.class.php');
require('classes/Movimentacao.class.php');

class Main{
    public function __construct()
    {
        $objUsuario = new Usuario;
        $obFabricante = new Fabricante;
        $obEstoque = new Estoque;
        $objMovimentacao = new Movimentacao;
    }

    public function __destruct()
    {
        echo "FIM DO PROGRAMA";
    }
}

new Main;

/* 
Tabelas:
itens
estoque
itens_no_estoque
movimentacoes
usuarios
fabricantes
*/