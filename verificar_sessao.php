<?php
// Arquivo para verificação de sessão - incluir em páginas protegidas
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

// Função para obter o nome do usuário logado
function getUsuarioLogado() {
    return isset($_SESSION['usuario_nome']) ? $_SESSION['usuario_nome'] : 'Usuário';
}

// Função para obter o ID do usuário logado
function getUsuarioId() {
    return isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;
}
?>

