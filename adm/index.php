<!DOCTYPE html>
<html lang="pt-BR">

<?php
session_start();
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuario = mysqli_real_escape_string($connection, $usuario);
    $senha = mysqli_real_escape_string($connection, $senha);

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $usuario_data = mysqli_fetch_assoc($result);

        if ($senha == $usuario_data['SENHA']) {
            $_SESSION['usuario'] = $usuario_data['USUARIO'];
            $_SESSION['id'] = $usuario_data['ID_USUARIO'];
            header("Location: ./panel.php");
            exit();
        } else {
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado!');</script>";
    }
}
?>


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
            width: 54%;

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
        }

        main form input::placeholder {
            color: white;
        }

        main form input[type="text"] {
            margin-bottom: 39px;
            margin-top: 100px;
        }

        main form input[type="submit"] {
            background-color: #AF3E3E;
            color: white;

            font-size: 36px;
            font-weight: 700;

            margin-top: 78px;
            text-transform: uppercase;
            width: 40%;
        }

        main form #submitButton:hover {
            background-color: #DA6C6CCC;
            cursor: pointer;
        }

        main #mainSVG {
            background-color: #AF3E3E;
            border-radius: 100%;
            position: absolute;
            top: -70px;
            left: 50%;
            transform: translateX(-50%);
        }

        @media (max-width: 768px) {
            main {
                width: 92%;
            }

            .menu {
                display: none;
            }
        }
    </style>
</head>

<body>
    <main>
        <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg" id="mainSVG">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M77.3334 43.5C77.3334 48.6275 75.2965 53.545 71.6708 57.1707C68.0451 60.7964 63.1276 62.8333 58.0001 62.8333C52.8726 62.8333 47.9551 60.7964 44.3293 57.1707C40.7036 53.545 38.6667 48.6275 38.6667 43.5C38.6667 38.3725 40.7036 33.455 44.3293 29.8293C47.9551 26.2036 52.8726 24.1667 58.0001 24.1667C63.1276 24.1667 68.0451 26.2036 71.6708 29.8293C75.2965 33.455 77.3334 38.3725 77.3334 43.5ZM67.6667 43.5C67.6667 46.0637 66.6483 48.5225 64.8354 50.3354C63.0226 52.1482 60.5638 53.1667 58.0001 53.1667C55.4363 53.1667 52.9776 52.1482 51.1647 50.3354C49.3519 48.5225 48.3334 46.0637 48.3334 43.5C48.3334 40.9362 49.3519 38.4775 51.1647 36.6646C52.9776 34.8518 55.4363 33.8333 58.0001 33.8333C60.5638 33.8333 63.0226 34.8518 64.8354 36.6646C66.6483 38.4775 67.6667 40.9362 67.6667 43.5Z" fill="#EAEBD0" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M58 4.83333C28.6375 4.83333 4.83337 28.6375 4.83337 58C4.83337 87.3625 28.6375 111.167 58 111.167C87.3625 111.167 111.167 87.3625 111.167 58C111.167 28.6375 87.3625 4.83333 58 4.83333ZM14.5 58C14.5 68.1017 17.9462 77.401 23.722 84.7863C27.7793 79.4606 33.0125 75.1445 39.013 72.1749C45.0135 69.2052 51.6191 67.6623 58.3142 67.6667C64.9232 67.659 71.4467 69.1606 77.3872 72.0571C83.3276 74.9537 88.5282 79.1685 92.5922 84.3803C96.78 78.8877 99.5998 72.4769 100.818 65.6782C102.036 58.8795 101.618 51.8884 99.5981 45.2834C97.5781 38.6784 94.0143 32.6494 89.2016 27.6952C84.3888 22.741 78.4656 19.004 71.9219 16.7935C65.3782 14.5829 58.4022 13.9624 51.571 14.9832C44.7399 16.004 38.25 18.6368 32.6384 22.6638C27.0268 26.6907 22.4548 31.996 19.3006 38.1408C16.1465 44.2855 14.5009 51.093 14.5 58ZM58 101.5C48.0139 101.516 38.3291 98.0807 30.5854 91.7753C33.702 87.3123 37.8508 83.6684 42.6787 81.1539C47.5067 78.6394 52.8707 77.3286 58.3142 77.3333C63.6897 77.3286 68.9888 78.6067 73.7711 81.0613C78.5535 83.516 82.6811 87.0764 85.811 91.4467C78.0075 97.9572 68.1628 101.516 58 101.5Z" fill="#EAEBD0" />
        </svg>

        <form method="post">
            <input type="text" name="usuario" id="inputUsuario" placeholder="Usuário" required maxlength="100">
            <input type="password" name="senha" id="inputSenha" placeholder="Senha" required maxlength="100">

            <input type="submit" value="Login" id="submitButton">
        </form>
    </main>
</body>

</html>