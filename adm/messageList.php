<?php
require_once '../verificar_sessao.php';
?>

<?php
if (function_exists('date_default_timezone_set')) { // Verifica se a função existe antes de chamar
    date_default_timezone_set('America/Sao_Paulo');
}

require_once '../connection.php';

$mensagens = [];
$sql = "SELECT ID_MENSAGEM, MENSAGEM, DATA_HORA FROM MENSAGEM ORDER BY DATA_HORA DESC";
$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mensagens[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Mensagens</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F0E6D2;
            margin: 0;
            padding: 20px;
        }

        .container-principal {
            background-color: #AF3E3E;
            border-radius: 12px;
            padding: 30px;
            max-width: 900px;
            margin: 20px auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .titulo-pagina {
            font-family: 'Kurale', serif;
            color: #F4E9DD;
            font-size: 2em;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #F4E9DD;
        }

        th,
        td {
            padding: 12px 8px;
            text-align: left;
            font-family: 'Kurale', serif;
        }

        th {
            border-bottom: 2px solid #D1C0A8;
            font-size: 0.9em;
            text-transform: uppercase;
        }

        td {
            border-bottom: 1px solid #8C3232;
            font-size: 0.95em;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .col-data,
        .col-hora {
            width: 15%;
            border-right: 1px solid #8C3232;
        }

        .col-mensagem {
            width: 55%;
            border-right: 1px solid #8C3232;
        }

        .col-excluir {
            width: 15%;
            text-align: center;
        }

        .btn-excluir {
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }

        .btn-excluir svg {
            width: 24px;
            height: 24px;
            fill: #F4E9DD;
            transition: fill 0.2s ease-in-out;
        }

        .btn-excluir:hover svg {
            fill: #FFFFFF;
        }

        .mensagem-vazia {
            text-align: center;
            padding: 20px;
            font-family: 'Kurale', serif;
            color: #F4E9DD;
        }

        .btn-voltar {
            display: inline-flex;
            align-items: center;
            padding: 8px 15px;
            margin-bottom: 20px;
            background-color: #8C3232;
            color: #F4E9DD;
            border-radius: 6px;
            text-decoration: none;
            font-family: 'Kurale', serif;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-voltar:hover {
            background-color: #A04242;
        }

        .btn-voltar svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            fill: currentColor;
        }
    </style>
</head>

<body>

    <div class="container-principal">
        <a href="panel.php" class="btn-voltar">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.707 14.707a1 1 0 01-1.414 0L7 10.414l4.293-4.293a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z" />
            </svg>
            Voltar ao Painel
        </a>

        <h1 class="titulo-pagina">Mensagens</h1>

        <?php if (!empty($mensagens)): ?>
            <table>
                <thead>
                    <tr>
                        <th class="col-data">Data</th>
                        <th class="col-hora">Hora</th>
                        <th class="col-mensagem">Mensagem</th>
                        <th class="col-excluir">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mensagens as $msg): ?>
                        <tr id="mensagem-row-<?php echo htmlspecialchars($msg['ID_MENSAGEM']); ?>">
                            <td class="col-data">
                                <?php
                                $dateTime = new DateTime($msg['DATA_HORA']);
                                echo $dateTime->format('d/m');
                                ?>
                            </td>
                            <td class="col-hora">
                                <?php echo $dateTime->format('H:i'); ?>
                            </td>
                            <td class="col-mensagem">
                                <?php echo htmlspecialchars($msg['MENSAGEM']); ?>
                            </td>
                            <td class="col-excluir">
                                <button class="btn-excluir" onclick="confirmarExclusao(<?php echo $msg['ID_MENSAGEM']; ?>)">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12 1.41-1.41L12 12.59l2.12-2.12 1.41 1.41L13.41 14l2.12 2.12-1.41 1.41L12 15.41l-2.12 2.12-1.41-1.41L10.59 14l-2.13-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mensagem-vazia">Nenhuma mensagem para exibir.</p>
        <?php endif; ?>
    </div>

    <script>
        function confirmarExclusao(idMensagem) {
            if (confirm("Tem certeza que deseja excluir esta mensagem? Esta ação não pode ser desfeita.")) {
                excluirMensagem(idMensagem);
            }
        }

        function excluirMensagem(idMensagem) {
            fetch('../excluir_mensagem.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_mensagem=' + idMensagem
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message || 'Mensagem excluída com sucesso!');
                        const linhaParaRemover = document.getElementById('mensagem-row-' + idMensagem);
                        if (linhaParaRemover) {
                            linhaParaRemover.remove();
                        }
                        const tbody = document.querySelector('table tbody');
                        if (tbody && tbody.children.length === 0) {
                            const tabela = document.querySelector('table');
                            if (tabela) tabela.remove();
                            document.querySelector('.container-principal').insertAdjacentHTML('beforeend', '<p class="mensagem-vazia">Nenhuma mensagem para exibir.</p>');
                        }
                    } else {
                        alert(data.message || 'Ocorreu um erro ao tentar excluir a mensagem.');
                    }
                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                    alert('Erro de comunicação ao tentar excluir. Verifique o console.');
                });
        }
    </script>

</body>

</html>
<?php $connection->close(); ?>