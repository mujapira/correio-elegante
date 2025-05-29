# 🚀 Techno Quermesse – Correio Elegante

Um sistema web em **PHP** para gerenciar o “Correio Elegante” da Quermesse da FATEC.  
Desenvolvido na disciplina de Laboratório de Engenharia de Software, será hospedado na Hostinger e usa **MySQL** como banco de dados.

---

## ✨ Visão Geral

O **Correio Elegante** permite que alunos enviem e recebam mensagens anônimas ou identificadas durante a quermesse.  
Principais recursos:
- Formulário simples para envio de mensagens.
- Listagem de mensagens recebidas.
- Painel administrativo para moderação.
- Organização por turmas e usuário.

🖼️ **Protótipo no Figma:**  
https://www.figma.com/design/TyVbG4CdZjK7PrWPm9YL4N/Untitled?node-id=0-1

---

## ⚙️ Pré-requisitos

Antes de começar, tenha em mãos:
- PHP 7.4 ou superior (XAMPP, WAMP, MAMP, USBWebServer ou outro)
- MySQL (local ou servidor)
- Navegador moderno e editor de código (VS Code, PHPStorm etc.)

---

## 🛠️ Configuração Local

1. **Fork & Clone**  
   - No GitHub, clique em **Fork** para criar sua cópia.  
   - No terminal:
   ```
   git clone https://github.com/<seu-usuario>/techno-quermesse.git
   cd techno-quermesse
   ```

2. **Crie sua branch de trabalho**  
   Cada aluno deve manter sua própria branch:
   ```
   git checkout -b nome-sobrenome
   git push -u origin nome-sobrenome
   ```

3. **Configure o banco de dados**  
   - Abra o MySQL e crie o schema:
   ```
   CREATE DATABASE correio_elegante;
   ```  
   - Importe o script de criação de tabelas (se disponível):
   ```
   mysql -u root -p correio_elegante < database/schema.sql
   ```

4. **Ajuste as credenciais**  
   Edite `connection.php` na raiz do projeto com host, usuário, senha e nome do banco.

5. **Inicie o servidor local**  
   - Pelo PHP CLI:
   ```
   php -S localhost:8000
   ```  
   - Ou configure seu XAMPP/WAMP apontando para esta pasta.

6. **Acesse no navegador**  
   Abra `http://localhost:8000` e explore as páginas públicas e o painel em `/adm/index.php`.

---

## 📁 Estrutura de Pastas

```
correio-elegante/
├── adm/  
│   ├── components/      # Cabeçalhos, rodapés e componentes reutilizáveis  
│   ├── index.php        # Dashboard administrativo  
│   ├── messageList.php  # Listagem de mensagens  
│   └── panel.php        # Moderação e ações  
├── connection.php       # Configuração da conexão MySQL  
├── index.php            # Página inicial / formulário de envio  
└── README.md            # Documentação do projeto
```

---

## 🚀 Deploy na Hostinger

1. No painel da Hostinger, crie um banco **correio_elegante** via hPanel → Banco de Dados MySQL.  
2. Envie todos os arquivos para a pasta `public_html` (via Git, FTP ou File Manager).  
3. Ajuste `connection.php` com as credenciais do Hostinger.  
4. Importe o script SQL pelo phpMyAdmin.  
5. Acesse seu domínio e teste todas as funcionalidades.

---

## 🤝 Como Contribuir

1. Faça **Fork** do repositório.  
2. Crie uma **branch** para sua feature ou correção:
   ```
   git checkout -b feature/nome-da-feature
   ```  
3. Faça **commit** com mensagens claras:
   ```
   git commit -m "Adiciona validação no envio de mensagem"
   ```  
4. **Push** para sua branch e abra um **Pull Request**.

---

## 📄 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).  
Sinta-se livre para usar, estudar e contribuir!
