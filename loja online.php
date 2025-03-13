<?php
class Produto {
    private $nome;
    private $preco;
    private $quantidade;

    public function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function exibirInfo() {
        return "Produto: {$this->nome} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . " | Quantidade: {$this->quantidade} <br>";
    }

    public function aplicarDesconto($percentual) {
        $desconto = $this->preco * ($percentual / 100);
        $this->preco -= $desconto;
    }

    public function atualizarQuantidade($novaQuantidade) {
        if ($novaQuantidade >= 0) {
            $this->quantidade = $novaQuantidade;
        } else {
            echo "Quantidade inválida!<br>";
        }
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }
}
class Estoque {
    private $produtos = [];

    public function adicionarProduto(Produto $produto) {
        $this->produtos[] = $produto;
    }

 
    public function listarProdutos() {
        if (empty($this->produtos)) {
            return "Nenhum produto no estoque.<br>";
        }

        foreach ($this->produtos as $produto) {
            echo $produto->exibirInfo();
        }
    }

 
    public function calcularValorTotal() {
        $total = 0;
        foreach ($this->produtos as $produto) {
            $total += $produto->getPreco() * $produto->getQuantidade();
        }
        return "Valor total do estoque: R$ " . number_format($total, 2, ',', '.') . "<br>";
    }
}

$produto1 = new Produto("Notebook", 3500.00, 10);
$produto2 = new Produto("Smartphone", 2500.00, 5);
$produto3 = new Produto("Fone de Ouvido", 150.00, 20);

$estoque = new Estoque();
$estoque->adicionarProduto($produto1);
$estoque->adicionarProduto($produto2);
$estoque->adicionarProduto($produto3);

$produto1->aplicarDesconto(10);
$produto2->atualizarQuantidade(8);
echo "<h3>=== Produtos no Estoque ===</h3>";
$estoque->listarProdutos();
echo "<br>" . $estoque->calcularValorTotal();
?>
