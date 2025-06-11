<?php
session_start();
require_once '../connection.php';

$erro = '';

// Verifica se o usuário já está logado
if (isset($_SESSION['usuario_id'])) {
    header('Location: panel.php');
    exit();
}

// Função para criar hash de senha compatível com PHP antigo
function criarHashSenha($senha)
{
    $salt = 'meu_salt_secreto_2024'; // Use um salt único para sua aplicação
    return sha1($salt . $senha . $salt);
}

// Função para verificar senha
function verificarSenha($senha, $hash_armazenado)
{
    $hash_calculado = criarHashSenha($senha);
    return $hash_calculado === $hash_armazenado;
}

// Processa o formulário de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['inputUsuario']);
    $senha = trim($_POST['inputSenha']);

    if (!empty($usuario) && !empty($senha)) {
        // Prepara a consulta para buscar o usuário
        $query = "SELECT ID_USUARIO, USUARIO, SENHA FROM USUARIO WHERE USUARIO = ?";

        // Verifica se mysqli_prepare está disponível (PHP 5.0+)
        if (function_exists('mysqli_prepare')) {
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        } else {
            // Fallback para versões muito antigas - escape manual
            $usuario_escaped = mysqli_real_escape_string($connection, $usuario);
            $query = "SELECT ID_USUARIO, USUARIO, SENHA FROM USUARIO WHERE USUARIO = '$usuario_escaped'";
            $result = mysqli_query($connection, $query);
        }

        if ($result && mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result);

            // Verifica a senha
            $senha_valida = false;

            // Primeiro tenta verificar se é um hash SHA1 (nossa implementação)
            if (strlen($user_data['SENHA']) == 40) {
                $senha_valida = verificarSenha($senha, $user_data['SENHA']);
            } else {
                // Se não é hash SHA1, assume que é texto plano (para migração)
                $senha_valida = ($senha === $user_data['SENHA']);

                // Se a senha está correta e em texto plano, atualiza para hash
                if ($senha_valida) {
                    $novo_hash = criarHashSenha($senha);
                    $update_query = "UPDATE USUARIO SET SENHA = ? WHERE ID_USUARIO = ?";

                    if (function_exists('mysqli_prepare')) {
                        $update_stmt = mysqli_prepare($connection, $update_query);
                        mysqli_stmt_bind_param($update_stmt, "si", $novo_hash, $user_data['ID_USUARIO']);
                        mysqli_stmt_execute($update_stmt);
                        mysqli_stmt_close($update_stmt);
                    } else {
                        $novo_hash_escaped = mysqli_real_escape_string($connection, $novo_hash);
                        $update_query = "UPDATE USUARIO SET SENHA = '$novo_hash_escaped' WHERE ID_USUARIO = " . intval($user_data['ID_USUARIO']);
                        mysqli_query($connection, $update_query);
                    }
                }
            }

            if ($senha_valida) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $user_data['ID_USUARIO'];
                $_SESSION['usuario_nome'] = $user_data['USUARIO'];

                header('Location: panel.php');
                exit();
            } else {
                $erro = 'Usuário ou senha incorretos.';
            }
        } else {
            $erro = 'Usuário ou senha incorretos.';
        }

        if (isset($stmt)) {
            mysqli_stmt_close($stmt);
        }
    } else {
        $erro = 'Por favor, preencha todos os campos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #DA6C6C;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            height: 100vh;
        }

        main {
            background-color: white;
            width: 691px;
            height: 452px;

            border: 3px solid #AF3E3E;
            border-radius: 15px;

            position: relative;
        }

        main form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        main form .material-symbols-outlined {
            font-size: 48px;
            color: #AF3E3E;
            margin-bottom: 20px;
        }

        main form input {
            width: 80%;

            background-color: #DA6C6CCC;

            border: 3px solid #AF3E3E;
            border-radius: 20px;

            font-size: 25px;
            font-weight: 400;
            color: white;

            padding: 15px;
            box-sizing: border-box;
        }

        main form input::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }

        main form input[type="text"],
        main form input[type="password"] {
            margin-bottom: 20px;
        }

        main form input[type="text"] {
            margin-top: 20px;
        }

        main form #submitButton {
            background-color: #AF3E3E;
            color: white;

            font-size: 36px;
            font-weight: 700;

            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        main form #submitButton:hover {
            background-color: #8B3131;
        }

        .erro {
            background-color: #ff4444;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            main {
                width: 90%;
                height: auto;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <main>
        <form action="" method="post">
            <span class="material-symbols-outlined">
                person
            </span>

            <?php if (!empty($erro)): ?>
                <div class="erro"><?php echo htmlspecialchars($erro); ?></div>
            <?php endif; ?>

            <input type="text" name="inputUsuario" placeholder="Usuário" required
                value="<?php echo isset($_POST['inputUsuario']) ? htmlspecialchars($_POST['inputUsuario']) : ''; ?>">
            <input type="password" name="inputSenha" placeholder="Senha" required>

            <input type="submit" value="Login" id="submitButton">
        </form>
    </main>
</body>

</html>