<?php
require_once 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_mensagem'])) {
    $id_mensagem = intval($_POST['id_mensagem']);

    if ($id_mensagem > 0) {
        $sql = "DELETE FROM MENSAGEM WHERE ID_MENSAGEM = ?";

        if ($stmt = $connection->prepare($sql)) {
            $stmt->bind_param("i", $id_mensagem);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo json_encode(['success' => true, 'message' => 'Mensagem excluída com sucesso!']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Nenhuma mensagem encontrada com este ID.']);
                }
            } else {
                error_log("Erro ao deletar mensagem: " . $stmt->error);
                echo json_encode(['success' => false, 'message' => 'Erro ao excluir a mensagem do banco de dados.']);
            }
            $stmt->close();
        } else {
            error_log("Erro ao preparar statement para deletar: " . $connection->error);
            echo json_encode(['success' => false, 'message' => 'Erro no servidor ao preparar a exclusão.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ID da mensagem inválido.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
}

$connection->close();
?>