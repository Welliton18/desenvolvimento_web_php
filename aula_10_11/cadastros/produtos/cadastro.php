<?php
    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare(
                'INSERT INTO produto (nome, valor, marca, quantidade_estoque) 
                        values (:nome, :valor, :marca, :quantidade)');
            $stmt->execute(array('nome' => $_POST['nome'],
                                 'valor' => $_POST['valor'],
                                 'marca' => $_POST['marca'],
                                 'quantidade' => $_POST['quantidade_estoque']));
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
        <label for="nome">Marca</label>
        <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca">
        <label for="nome">Valor</label>
        <input type="number" class="form-control" name="valor" id="valor" placeholder="Valor">
        <label for="nome">Quantidade em Estoque</label>
        <input type="number" class="form-control" name="quantidade_estoque" id="quantidade_estoque" placeholder="Quantidade em Estoque">
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>
