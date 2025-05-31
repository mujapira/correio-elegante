<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remetente = isset($_POST['remetente']) ? trim($_POST['remetente']) : null;
    $destinatario = isset($_POST['destinatario']) ? trim($_POST['destinatario']) : '';
    $mensagem_texto = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';

    if (isset($_POST['cor'])) {
        $valor_cor_trimado = trim($_POST['cor']);
        $cor = !empty($valor_cor_trimado) ? $valor_cor_trimado : '#000000';
    } else {
        $cor = '#000000';
    }

    if (isset($_POST['fundo'])) {
        $valor_fundo_trimado = trim($_POST['fundo']);
        $fundo = !empty($valor_fundo_trimado) ? $valor_fundo_trimado : '#ffffff';
    } else {
        $fundo = '#ffffff';
    }

    if (empty($destinatario) || empty($mensagem_texto)) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Destinatário e Mensagem são obrigatórios!']);
        exit;
    }

    if (empty($remetente)) {
        $remetente = null;
    }

    $sql = "INSERT INTO MENSAGEM (REMETENTE, DESTINATARIO, MENSAGEM, COR, FUNDO) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("sssss", $remetente, $destinatario, $mensagem_texto, $cor, $fundo);

        if ($stmt->execute()) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
        } else {
            header('Content-Type: application/json');

            error_log("Erro ao inserir mensagem: " . $stmt->error);
            echo json_encode(['success' => false, 'message' => 'Erro ao enviar mensagem. Tente novamente.']);
        }

        $stmt->close();
    } else {
        header('Content-Type: application/json');

        error_log("Erro ao preparar query: " . $connection->error);
        echo json_encode(['success' => false, 'message' => 'Erro no servidor. Tente novamente mais tarde.']);
    }

    $connection->close();

} else {
    header('HTTP/1.1 405 Method Not Allowed');
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
?>