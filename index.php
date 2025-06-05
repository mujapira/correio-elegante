<?php
include 'connection.php';

$mensagens = [];

$sql = "SELECT MENSAGEM, REMETENTE, DESTINATARIO, COR, FUNDO
        FROM MENSAGEM
        ORDER BY DATA_HORA DESC
        LIMIT 10";
$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mensagens[] = [
            'mensagem' => $row['MENSAGEM'],
            'remetente' => $row['REMETENTE'],
            'destinatario' => $row['DESTINATARIO'],
            'cor_texto' => $row['COR'],
            'cor_fundo' => $row['FUNDO']
        ];
    }
}


if(isset($_GET['message'])){
    $message=$_GET['message'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" 
    http-equiv="refresh" content="10; url=http://localhost:8080/correio-elegante?message=<?php 
    if(isset($_GET['message'])){
        $message=(($_GET['message'] + 1) % count($mensagens));
    }
    else{
        $message=0;
    }
    echo $message;
    ?>"
    >
    <title>Correio Elegante - Visual da Imagem</title>
    <style>
        html{
            height: 90%;
        }

        .container-geral {
            background-color: rgb(209, 59, 59);
            width: 96%;
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            height: 100%;
        }
 
        header {
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #F5E9E9;
            margin-bottom: 10px;
        }
 
        header h1 {
            font-size: 36px;
            font-weight: normal;
            margin: 10px 0;
            color: #F5E9E9;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
 
        .conteudo-principal {
            display: flex;
            gap: 25px;
            height: 100%;
        }
 
        .coluna-esquerda {
            flex: 2.5;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
 
        .etiqueta {
            background-color: #DDC0C0;
            color: #7D3C3C;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 22px;
            font-weight: normal;
            text-align: center;
            border: 1px solid #C8A8A8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
 
        .remetente-area {
            align-self: flex-start;
            width: 150px;
        }
 
        .mensagem-display {
            background-color: rgb(206, 95, 95);
            border-radius: 10px;
            padding: 30px 25px;
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 220px;
            border: 3px solid #7D3C3C;
        }
 
        .mensagem-display p {
            font-size: 52px;
            margin: 0;
            font-style: italic;
            font-family: 'Georgia', 'Times New Roman', Times, serif;
            transition: opacity 0.3s ease-in-out;
        }
 
        .destinatario-area {
            align-self: center;
            width: 180px;
        }
 
        .historico-coluna {
            flex: 1.5;
            padding: 10px 0px 10px 25px;
            border-left: 1px solid #F5E9E9;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
 
        .historico-coluna h2 {
            font-size: 32px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 20px;
            color: #F5E9E9;
            text-align: left;
            letter-spacing: 1.5px;
            font-weight: normal;
        }
 
        .historico-lista {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
            overflow-y: auto;
            flex-grow: 1;
        }
 
        .historico-lista li {
            font-size: 22px;
            color: #F5E9E9;
            margin-bottom: 12px;
            padding-bottom: 8px;
            font-family: 'Georgia', 'Times New Roman', Times, serif;
            font-style: italic;
        }
    </style>
</head>
<body class="container-geral">
 
    <header>
        <h1>CORREIO ELEGANTE</h1>
    </header>

    <div class="conteudo-principal">
        <div class="coluna-esquerda">
            <div class="etiqueta remetente-area" id="remetenteAtual">REMETENTE</div>

            <div class="mensagem-display" id="mensagemPrincipal">

            </div>

            <div class="etiqueta destinatario-area" id="destinatarioAtual">DESTINATÁRIO</div>
        </div>

        <div class="historico-coluna">
            <h2>HISTÓRICO</h2>
            <ul class="historico-lista" id="listaHistoricoItens">
                <?php foreach ($mensagens as $msg): ?>
                    <li>
                        <strong><?= htmlspecialchars($msg['mensagem']) ?></strong><br>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mensagens = <?php echo json_encode($mensagens, JSON_UNESCAPED_UNICODE); ?>;
        
            const mensagemPrincipalElemento = document.getElementById('mensagemPrincipal');
            const listaHistoricoItensElemento = document.getElementById('listaHistoricoItens');
            const remetenteElemento = document.getElementById('remetenteAtual');
            const destinatarioElemento = document.getElementById('destinatarioAtual');

            function exibirMensagem(indexAtual){
                const msg = mensagens[indexAtual];

                mensagemPrincipalElemento.innerHTML = `
                        <p><strong>${msg.mensagem}</strong></p>
                    `;
                mensagemPrincipalElemento.style.color = msg.cor_texto || '#000';
                mensagemPrincipalElemento.style.backgroundColor = msg.cor_fundo || '#fff';

                remetenteElemento.textContent = msg.remetente ? `De: ${msg.remetente}` : "De: Anônimo";
                destinatarioElemento.textContent = `Para: ${msg.destinatario}`;
            }

            exibirMensagem(<?php echo $message; ?>);
        });
    </script>
 
</body>
</html>