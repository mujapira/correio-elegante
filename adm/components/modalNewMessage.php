<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Mensagem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif; 
        }
        .custom-title-font {
            font-family: 'Kurale', serif; 
        }
        .custom-select-arrow {
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23f0e6d2" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
        }
        input::placeholder,
        textarea::placeholder {
            font-family: 'Kurale', serif; 
        }
        ::-webkit-input-placeholder { 
            font-family: 'Kurale', serif;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            font-family: 'Kurale', serif;
            opacity: 1; 
        }
        :-ms-input-placeholder { /* IE 10+ */
            font-family: 'Kurale', serif;
        }
        :-moz-placeholder {
            font-family: 'Kurale', serif;
        }

        select {
            font-family: 'Kurale', serif;
        }
        select option {
            font-family: 'Kurale', serif;
        }   

    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-[#f0e6d2]">
    <div class="bg-[#a63f3f] p-8 rounded-lg shadow-lg w-full max-w-md border-2 border-[#f0e6d2]">
        <h2 class="text-center text-[#f0e6d2] mb-6 text-xl custom-title-font tracking-wide uppercase">~ DIGITE A MENSAGEM ~</h2>

        <div class="mb-5">
            <input type="text" id="remetente" placeholder="Remetente:" class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] placeholder-[#f0e6d2] focus:outline-none">
        </div>

        <div class="mb-5">
            <textarea id="mensagem" placeholder="Escreva a mensagem aqui" class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] placeholder-[#f0e6d2] focus:outline-none resize-y min-h-[120px]"></textarea>
        </div>

        <div class="mb-8">
            <input type="text" id="destinatario" placeholder="Destinatário:" class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] placeholder-[#f0e6d2] focus:outline-none">
        </div>

        <div class="flex justify-between gap-4 mb-8">
            <select id="cor" class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] appearance-none custom-select-arrow focus:outline-none cursor-pointer">
                <option value="">Cor:</option>
                <option value="vermelho">Vermelho</option>
                <option value="azul">Azul</option>
                <option value="verde">Verde</option>
            </select>

            <select id="fundo" class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] appearance-none custom-select-arrow focus:outline-none cursor-pointer">
                <option value="">Fundo:</option>
                <option value="claro">Claro</option>
                <option value="escuro">Escuro</option>
                <option value="personalizado">Personalizado</option>
            </select>
        </div>

        <div class="flex justify-center gap-5">
            <button type="submit" class="py-3 px-8 bg-[#6a9c6a] text-white font-bold rounded-md hover:bg-[#5b875b] transition-colors duration-300">ENVIAR</button>
            <button type="button" class="py-3 px-8 bg-[#813F3F] text-white font-bold rounded-md hover:bg-[#b35c5c] transition-colors duration-300">CANCELAR</button>
        </div>
    </div>
</body>
</html>