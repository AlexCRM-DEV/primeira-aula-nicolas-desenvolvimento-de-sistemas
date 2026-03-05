<?php

class SerVivo {
    public $nome;
    protected $idade;

    public function __construct(string $nome, int $idade)
    {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function andar()
    {
        echo "{$this->nome} está andando<br>";
    }
}

class Pessoa extends SerVivo {
    public $altura;
    protected $peso;
    private $cpf;

    public function __construct(string $nome, int $idade, float $altura, float $peso, string $cpf)
    {
        parent::__construct($nome, $idade);
        $this->altura = $altura;
        $this->peso = $peso;
        $this->cpf = $cpf;
    }

    public function comer()
    {
        echo "{$this->nome} está comendo<br>";
    }

    public function correr()
    {
        echo "{$this->nome} está correndo<br>";
    }
}

class Animal extends SerVivo {
    public $especie;
    public $tipo;

    public function __construct(string $nome, int $idade, string $especie, string $tipo)
    {
        parent::__construct($nome, $idade);
        $this->especie = $especie;
        $this->tipo = $tipo;
    }

    public function comer()
    {
        echo "{$this->nome} está comendo<br>";
    }

    public function correr()
    {
        echo "{$this->nome} está correndo<br>";
    }
}

class Veiculo {
    public $marca;
    protected $ano;

    public function __construct(string $marca, int $ano)
    {
        $this->marca = $marca;
        $this->ano = $ano;
    }

    public function andar()
    {
        echo "Veículo da marca {$this->marca} está andando<br>";
    }
}

class Automovel extends Veiculo {
    public $tipo;

    public function __construct(string $tipo, string $marca, int $ano)
    {
        parent::__construct($marca, $ano);
        $this->tipo = $tipo;
    }

    public function acelerar()
    {
        echo "{$this->tipo} {$this->marca} está acelerando<br>";
    }

    public function frear()
    {
        echo "{$this->tipo} {$this->marca} está freando<br>";
    }
}

$pessoa1 = new Pessoa("João", 30, 1.75, 70, "11111111111");
$pessoa2 = new Pessoa("Maria", 25, 1.65, 60, "22222222222");
$pessoa3 = new Pessoa("Carlos", 40, 1.80, 85, "33333333333");

$pessoa1->andar();
$pessoa1->comer();
$pessoa1->correr();

echo "<br>";

$pessoa2->andar();
$pessoa2->comer();
$pessoa2->correr();

echo "<br>";

$pessoa3->andar();
$pessoa3->comer();
$pessoa3->correr();

echo "<br>";

$animal1 = new Animal("Rex", 5, "Cachorro", "Mamífero");
$animal2 = new Animal("Mimi", 3, "Gato", "Mamífero");
$animal3 = new Animal("Zeca", 2, "Papagaio", "Ave");

$animal1->andar();
$animal1->comer();
$animal1->correr();

echo "<br>";

$animal2->andar();
$animal2->comer();
$animal2->correr();

echo "<br>";

$animal3->andar();
$animal3->comer();
$animal3->correr();

echo "<br>";

$carro1 = new Automovel("Carro", "Toyota", 2020);
$carro2 = new Automovel("Carro", "Honda", 2019);
$carro3 = new Automovel("Carro", "Ford", 2021);

$carro1->andar();
$carro1->acelerar();
$carro1->frear();

echo "<br>";

$carro2->andar();
$carro2->acelerar();
$carro2->frear();

echo "<br>";

$carro3->andar();
$carro3->acelerar();
$carro3->frear();

?>
