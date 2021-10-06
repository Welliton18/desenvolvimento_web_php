<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="variaveis.php" method="post">
        <table>
            <tr>
                <td>
                <span>Quantas Colunas terá a matriz?</span>
                <input type="number" name="colunas" id="numero" min="5" max="10">
                </td>
            </tr>
            <tr>
                <td>
                <span>Quantas Registros terá a matriz?</span>
                <input type="number" name="registro" id="numero" min="50">
                </td>
            </tr>
            <tr>
                <td>
                <span>Quantas Registros mostrar por pagina?</span>
                <input type="number" name="registroPagina" id="numero" min="5" max="20">    
                </td>
            </tr>        
        </table>
        <button type="submit">Gerar</button>
    </form>
</body>
</html>