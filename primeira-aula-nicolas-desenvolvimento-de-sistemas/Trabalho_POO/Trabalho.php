<div class="cabecalho">
    <h1>NextOrder - Gerenciamento de Pedidos</h1>
    <p>Curso Técnico em Desenvolvimento de Sistemas</p>
    <p>Aluno: <strong>Alex</strong></p>
</div>

<div class="conteudo">

<?php

// Classe do produto
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


// Classe pai do cliente
abstract class Cliente {
    protected $nome;
    protected $desconto;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->definirDesconto();
    }

    abstract protected function definirDesconto();

    public function aplicarDesconto($valor) {
        return $valor - ($valor * $this->desconto);
    }
}


// Cliente comum tem desconto menor
class ClienteComum extends Cliente {

    protected function definirDesconto() {
        $this->desconto = 0.05;
    }
}


// Cliente premium tem desconto maior
class ClientePremium extends Cliente {

    protected function definirDesconto() {
        $this->desconto = 0.10;
    }
}


// Classe do pedido
class Pedido {
    private $produtos;
    private $cliente;
    private $status = "aberto";

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function adicionarProduto(Produto $produto, $quantidade) {
        if ($produto->getQuantidade() >= $quantidade) {
            $produto->setQuantidade(
                $produto->getQuantidade() - $quantidade
            );

            $this->produtos[] = [
                "produto" => $produto,
                "quantidade" => $quantidade
            ];
        } else {
            echo "Não tem estoque suficiente de {$produto->getNome()} <br>";
        }
    }

    public function calcularTotal() {
        $total = 0;

        foreach ($this->produtos as $item) {
            $total += $item["produto"]->getPreco() * $item["quantidade"];
        }

        return $this->cliente->aplicarDesconto($total);
    }

    public function finalizarPedido() {
        $this->status = "pago";
        echo "Total do pedido: R$ " .
             number_format($this->calcularTotal(), 2, ",", ".") .
             "<br>";
    }

    public function cancelarPedido() {
        $this->status = "cancelado";
    }

    public function enviarPedido() {
        $this->status = "enviado";
    }

    public function getStatus() {
        return $this->status;
    }
}


// Produtos cadastrados
$produto1 = new Produto("Camiseta", 50, 20);
$produto2 = new Produto("Tênis", 180, 10);
$produto3 = new Produto("Boné", 35, 30);
$produto4 = new Produto("Calça Jeans", 120, 15);
$produto5 = new Produto("Jaqueta", 250, 8);
$produto6 = new Produto("Mochila", 90, 12);


// Clientes
$nicolas   = new ClienteComum("Nicolas");
$fernando  = new ClientePremium("Fernando");
$lucas     = new ClienteComum("Lucas");
$marcio    = new ClientePremium("Marcio");


// Pedidos
$pedidoNicolas  = new Pedido($nicolas);
$pedidoFernando = new Pedido($fernando);
$pedidoLucas    = new Pedido($lucas);
$pedidoMarcio   = new Pedido($marcio);


// Adicionando produtos
$pedidoNicolas->adicionarProduto($produto1, 2);
$pedidoNicolas->adicionarProduto($produto3, 1);

$pedidoFernando->adicionarProduto($produto2, 1);
$pedidoFernando->adicionarProduto($produto6, 1);

$pedidoLucas->adicionarProduto($produto4, 1);
$pedidoLucas->adicionarProduto($produto3, 2);

$pedidoMarcio->adicionarProduto($produto5, 1);
$pedidoMarcio->adicionarProduto($produto1, 1);


// Finalizando pedidos
echo "<h3>Pedido do Nicolas</h3>";
$pedidoNicolas->finalizarPedido();

echo "<h3>Pedido do Fernando</h3>";
$pedidoFernando->finalizarPedido();

echo "<h3>Pedido do Lucas</h3>";
$pedidoLucas->finalizarPedido();

echo "<h3>Pedido do Marcio</h3>";
$pedidoMarcio->finalizarPedido();


// Mudança de status
$pedidoNicolas->cancelarPedido();
$pedidoFernando->enviarPedido();
$pedidoMarcio->enviarPedido();

echo "<h3>Status final</h3>";
echo "Nicolas: {$pedidoNicolas->getStatus()} <br>";
echo "Fernando: {$pedidoFernando->getStatus()} <br>";
echo "Lucas: {$pedidoLucas->getStatus()} <br>";
echo "Marcio: {$pedidoMarcio->getStatus()} <br>";

?>

</div>
</body>
</html>
