<!DOCTYPE html>
<html lang="pt-BR">

<?php

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
            width: 691px;
            height: 452px;

            border: 3px solid #AF3E3E;
            border-radius: 15px;
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

        main form input[type="text"] {
            margin-bottom: 39px;
            margin-top: 69px;
        }

        main form #submitButton {
            background-color: #AF3E3E;
            color: white;

            font-size: 36px;
            font-weight: 700;

            margin-top: 78px;
        }

        main form #submitButton:hover {
            background-color: #DA6C6CCC;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <main>
        <form action="" method="post">
            <span class="material-symbols-outlined">
                person
            </span>
            <input type="text" name="inputUsuario" id="" placeholder="Usuário" required>
            <input type="password" name="inputUsuario" id="" placeholder="Senha" required>

            <input type="submit" value="Login" id="submitButton">
        </form>
    </main>
</body>

</html>