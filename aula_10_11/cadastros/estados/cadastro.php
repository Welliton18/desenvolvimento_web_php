<?php
    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare(
                'INSERT INTO estados (nome, sigla) values (:nome, :sigla)');
            $stmt->execute(['nome' => $_POST['nome'], 'sigla' => $_POST['sigla']]);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Sigla</label>
        <input type="text" maxlength="2" class="form-control" name="sigla" id="sigla" placeholder="Sigla">
        <label for="nome">Nome</label>
        <input type="text" maxlength="80" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>
