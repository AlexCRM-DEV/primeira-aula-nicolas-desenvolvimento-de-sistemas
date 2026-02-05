<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>NextOrder - Sistema de Gerenciamento de Pedidos</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .cabecalho {
            background-color:rgb(31, 48, 73);
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }

        .cabecalho h1 {
            margin: 0;
            font-size: 26px;
        }

        .cabecalho p {
            margin: 6px 0 0;
            font-size: 14px;
            color: #d1d5db;
        }

        .conteudo {
            width: 90%;
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="cabecalho">
    <h1>Sistema de Gerenciamento de Pedidos – NextOrder</h1>
    <p>Curso Técnico em Informática</p>
    <p>Aluno: <strong>Alex</strong></p>
</div>

<div class="conteudo">



<?php

// Classe Produto
class Produto {
    private $nome;
    private $preco;
    private $quantidade;

    public function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
}

// Classe abstrata Cliente
abstract class Cliente {
    protected $nome;
    protected $tipoCliente;
    protected $desconto;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->setTipoCliente();
    }

    abstract protected function setTipoCliente();

    public function getNome() {
        return $this->nome;
    }

    public function getDesconto() {
        return $this->desconto;
    }

    public function aplicarDesconto($valor) {
        return $valor - ($valor * $this->desconto);
    }
}

// Classe Cliente Comum
class ClienteComum extends Cliente {
    
    protected function setTipoCliente() {
        $this->tipoCliente = "Comum";
        $this->desconto = 0.05; // 5% de desconto para clientes comuns
    }
}

// Classe Cliente Premium
class ClientePremium extends Cliente {

    protected function setTipoCliente() {
        $this->tipoCliente = "Premium";
        $this->desconto = 0.10; // 10% de desconto para clientes premium
    }
}

// Classe Pedido
class Pedido {
    private $produtos = [];
    private $cliente;
    private $status;
    
    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
        $this->status = 'aberto'; // Status inicial do pedido
    }

    public function adicionarProduto(Produto $produto, $quantidade) {// Verifica se a quantidade solicitada é menor ou igual ao estoque
        if ($produto->getQuantidade() >= $quantidade) {
            $produto->setQuantidade($produto->getQuantidade() - $quantidade);
            $this->produtos[] = ['produto' => $produto, 'quantidade' => $quantidade];
        } else {
            echo "Quantidade indisponível para o produto: " . $produto->getNome() . "<br>";
        }
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->produtos as $item) {
            $total += $item['produto']->getPreco() * $item['quantidade'];
        }
        return $this->cliente->aplicarDesconto($total);
    }

    public function finalizarPedido() {
        if ($this->status !== 'aberto') {
            echo "Pedido já foi finalizado ou cancelado.<br>";
            return;
        }
        $this->status = 'pago'; // Atualiza o status do pedido para 'pago'
        echo "Pedido finalizado. Total a pagar: R$" . number_format($this->calcularTotal(), 2, ',', '.') . "<br>";
    }

    public function cancelarPedido() {
        $this->status = 'cancelado';
        echo "Pedido cancelado.<br>";
    }

    public function enviarPedido() {
        $this->status = 'enviado';
        echo "Pedido enviado.<br>";
    }

    public function getStatus() {
        return $this->status;
    }
}


$produto1 = new Produto("Camiseta", 50.00, 20);
$produto2 = new Produto("Tênis", 180.00, 10);
$produto3 = new Produto("Boné", 35.00, 30);
$produto4 = new Produto("Calça Jeans", 120.00, 15);
$produto5 = new Produto("Jaqueta", 250.00, 8);
$produto6 = new Produto("Mochila", 90.00, 12);


$cliente1 = new ClienteComum("João");
$cliente2 = new ClientePremium("Maria");
$cliente3 = new ClienteComum("Carlos");
$cliente4 = new ClientePremium("Ana");
$cliente5 = new ClienteComum("Fernanda");


$pedidoJoao = new Pedido($cliente1);
$pedidoMaria = new Pedido($cliente2);
$pedidoCarlos = new Pedido($cliente3);
$pedidoAna = new Pedido($cliente4);
$pedidoFernanda = new Pedido($cliente5);

// Pedido do João
$pedidoJoao->adicionarProduto($produto1, 2); // 2 camisetas
$pedidoJoao->adicionarProduto($produto3, 1); // 1 boné

// Pedido da Maria
$pedidoMaria->adicionarProduto($produto2, 1); // 1 tênis
$pedidoMaria->adicionarProduto($produto6, 1); // 1 mochila

// Pedido do Carlos
$pedidoCarlos->adicionarProduto($produto4, 1); // 1 calça jeans
$pedidoCarlos->adicionarProduto($produto3, 2); // 2 bonés

// Pedido da Ana
$pedidoAna->adicionarProduto($produto5, 1); // 1 jaqueta
$pedidoAna->adicionarProduto($produto1, 1); // 1 camiseta

// Pedido da Fernanda
$pedidoFernanda->adicionarProduto($produto6, 2); // 2 mochilas

echo "<h3>--- Pedido de João ---</h3>";
$pedidoJoao->finalizarPedido();

echo "<h3>--- Pedido de Maria ---</h3>";
$pedidoMaria->finalizarPedido();

echo "<h3>--- Pedido de Carlos ---</h3>";
$pedidoCarlos->finalizarPedido();

echo "<h3>--- Pedido de Ana ---</h3>";
$pedidoAna->finalizarPedido();

echo "<h3>--- Pedido de Fernanda ---</h3>";
$pedidoFernanda->finalizarPedido();

echo "<h3>--- Atualização de Status ---</h3>";

$pedidoJoao->cancelarPedido();      // João cancelou
$pedidoMaria->enviarPedido();       // Maria recebeu envio
$pedidoAna->enviarPedido();         // Ana recebeu envio

echo "<h3>--- Status Final dos Pedidos ---</h3>";

echo "João: " . $pedidoJoao->getStatus() . "<br>";
echo "Maria: " . $pedidoMaria->getStatus() . "<br>";
echo "Carlos: " . $pedidoCarlos->getStatus() . "<br>";
echo "Ana: " . $pedidoAna->getStatus() . "<br>";
echo "Fernanda: " . $pedidoFernanda->getStatus() . "<br>";

?>


</div>
</body>
</html>