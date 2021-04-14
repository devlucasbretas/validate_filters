<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulários PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(isset($_POST["enviar-dados"])){
        // array para armazenar os erros
        $errors = array();

        // verificação do campo nome
        if(empty($_POST["nome"])) {
            $errors[] = "[Erro] Insira o seu nome!";
        }

        // verificação do campo email
        if(!$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)){
            $errors[] = "[Erro] Email Inválido!";
        }

        // verificação do campo idade
        if(!$idade = filter_input(INPUT_POST,"idade",FILTER_VALIDATE_INT)){
            $errors[] = "[Erro] Idade Inválida!";
        }

        // verificação do campo de cpf
        if(!$cpf = filter_input(INPUT_POST,"cpf",FILTER_VALIDATE_INT)){
            $errors[] = "[Erro] CPF Inválido!";
        }

        // verificação do campo de cidade
        if(empty($_POST["cidade"])) {
            $errors[] = "[Erro] Insira a sua cidade!";
        }

        // verificação do campo de estado
        if(empty($_POST["estado"])){
            $errors[] = "[Erro] Insira o seu estado!";
        }

        // Exibindo erros ao usuário
        if(!empty($errors)){
            foreach ($errors as $erro) {
                echo "<li>$erro</li>";
            }
        } else {
            echo "<p>Todos os dados foram enviados com sucesso!</p>";
        }

    }
    
    ?>
    <div class="form-container">
        <h3>Nosso Formulário de Cadastro</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Nome: <input type="text" placeholder="digite o seu nome" name="nome" id=""><br>
            Email: <input type="email" placeholder="digite o seu email" name="email" id=""><br>
            Idade: <input type="text" placeholder="digite sua idade" name="idade" id=""><br>
            CPF: <input type="text" placeholder="digite o seu CPF" name="cpf" id=""><br>
            Cidade: <input type="text" placeholder="digite a sua cidade" name="cidade" id=""><br>
            Estado: <input type="text" placeholder="digite o estado" name="estado" id=""><br>
            <button name="enviar-dados"type="submit">Enviar dados</button>
        </form>
    </div>
</body>
</html>