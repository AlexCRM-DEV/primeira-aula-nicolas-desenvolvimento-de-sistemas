<?php

    /*class Pessoa {
        public $nome;
        public $altura;
        public $peso;
        public $cpf;

        function __construct(string $nome, float $altura, float $peso, float $cpf)
        {
            $this->$nome = $nome;
            $this->$altura = $altura;
            $this->$peso = $peso;
            $this->$cpf = $cpf;
        }

        function andar()
        {
            echo "{$this->nome} . ta andando /n";
        }
    }

    $joao = new Pessoa("joâo", 1.76, 70, "12345678900");

    $joao->andar();

    $japa = new Pessoa("japa", 1.76, 65, "12345678990");

    $japa->andar();*/

    class Automovel {
        public $tipo;
        public $marca;
        public $ano;
    
        function __construct(string $tipo, string $marca, int $ano)
        {
            $this->tipo = $tipo;
            $this->marca = $marca;
            $this->ano = $ano;
        }
    
        function andar()
        {
            echo "{$this->tipo} da marca {$this->marca} está andando<br>";
        }
    }
    
    
    $carro = new Automovel("Carro", "Toyota", 2020);
    $moto = new Automovel("Moto", "Honda", 2022);
    $onibus = new Automovel("Ônibus", "Mercedes", 2018);
    
    $carro->andar();
    $moto->andar();
    $onibus->andar();
    
    echo "<br>";
    
    class Animal {
        public $nome;
        public $especie;
        public $idade;
    
        function __construct(string $nome, string $especie, int $idade)
        {
            $this->nome = $nome;
            $this->especie = $especie;
            $this->idade = $idade;
        }
    
        function emitirSom()
        {
            echo "{$this->nome} é um {$this->especie} e está fazendo barulho<br>";
        }
    }
    
    
    $cachorro = new Animal("Rex", "Cachorro", 5);
    $hiena = new Animal("Zuzu", "Hiena", 7);
    $taturana = new Animal("Verme", "Taturana", 1);
    
    $cachorro->emitirSom();
    $hiena->emitirSom();
    $taturana->emitirSom();
    
    echo "<br>";
    
    class Filme {
        public $titulo;
        public $genero;
        public $ano;
    
        function __construct(string $titulo, string $genero, int $ano)
        {
            $this->titulo = $titulo;
            $this->genero = $genero;
            $this->ano = $ano;
        }
    
        function assistir()
        {
            echo "Assistindo ao filme {$this->titulo}, do gênero {$this->genero}<br>";
        }
    }
    
    
    $filme1 = new Filme("Interestelar", "Ficção Científica", 2014);
    $filme2 = new Filme("O Rei Leão", "Animação", 1994);
    $filme3 = new Filme("Matrix", "Ação", 1999);
    
    $filme1->assistir();
    $filme2->assistir();
    $filme3->assistir();
