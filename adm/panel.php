<?php
require_once '../verificar_sessao.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Tailwind CSS</title>
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

        ::-moz-placeholder {
            font-family: 'Kurale', serif;
            opacity: 1;
        }

        :-ms-input-placeholder {
            font-family: 'Kurale', serif;
        }

        :-moz-placeholder {
            font-family: 'Kurale', serif;
        }

        select,
        select option {
            font-family: 'Kurale', serif;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
    </style>
</head>

<body class="m-0 p-5 font-sans bg-[#DA6C6C] flex justify-center items-center min-h-screen">

    <div class="bg-[#AF3E3E] p-0.5 rounded-xl">
        <div class="bg-[#F4E9DD] py-10 px-10 rounded-lg w-full flex flex-col gap-5">
            <a href="#" id="openMessageModalBtn"
                class="flex items-center justify-start bg-[#AF3E3E] text-white py-[18px] px-6 rounded-lg text-base font-medium uppercase w-full transition-all duration-200 ease-in-out shadow-[0_2px_4px_rgba(0,0,0,0.15),inset_0_-2px_0px_rgba(0,0,0,0.1)] hover:bg-[#A2484E] active:bg-[#8F3F44] active:translate-y-px active:shadow-[0_1px_2px_rgba(0,0,0,0.15),inset_0_-1px_0px_rgba(0,0,0,0.1)] cursor-pointer">

                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="w-[22px] h-[22px] mr-[18px] fill-current">
                    <path
                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-7.07 4.42c-.32.2-.74.2-1.06 0L4.4 8.25V6.5l7.6 4.75 7.6-4.75v1.75z" />
                </svg>
                Enviar Mensagem
            </a>

            <a href="messageList.php"
                class="flex items-center justify-start bg-[#AF3E3E] text-white py-[18px] px-6 rounded-lg text-base font-medium uppercase w-full transition-all duration-200 ease-in-out shadow-[0_2px_4px_rgba(0,0,0,0.15),inset_0_-2px_0px_rgba(0,0,0,0.1)] hover:bg-[#A2484E] active:bg-[#8F3F44] active:translate-y-px active:shadow-[0_1px_2px_rgba(0,0,0,0.15),inset_0_-1px_0px_rgba(0,0,0,0.1)] cursor-pointer">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="w-[22px] h-[22px] mr-[18px] fill-current">
                    <circle cx="5.5" cy="7" r="1.7" />
                    <circle cx="5.5" cy="12" r="1.7" />
                    <circle cx="5.5" cy="17" r="1.7" />
                    <rect x="9" y="6" width="11" height="2.2" rx="1" />
                    <rect x="9" y="11" width="11" height="2.2" rx="1" />
                    <rect x="9" y="16" width="11" height="2.2" rx="1" />
                </svg>
                Lista de Mensagens
            </a>

            <a href="../logout.php"
                class="flex items-center justify-start bg-[#AF3E3E] text-white py-[18px] px-6 rounded-lg text-base font-medium uppercase w-full transition-all duration-200 ease-in-out shadow-[0_2px_4px_rgba(0,0,0,0.15),inset_0_-2px_0px_rgba(0,0,0,0.1)] hover:bg-[#A2484E] active:bg-[#8F3F44] active:translate-y-px active:shadow-[0_1px_2px_rgba(0,0,0,0.15),inset_0_-1px_0px_rgba(0,0,0,0.1)] cursor-pointer">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="w-[22px] h-[22px] mr-[18px] fill-current">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
                Deslogar
            </a>
        </div>
    </div>

    <div id="messageModal" class="modal-overlay hidden">
        <div class="bg-[#a63f3f] p-8 rounded-lg shadow-lg w-full max-w-md border-2 border-[#f0e6d2] relative">
            <button id="closeModalXBtn"
                class="absolute top-2 right-3 text-[#f0e6d2] hover:text-white text-2xl font-bold">&times;</button>

            <h2 class="text-center text-[#f0e6d2] mb-6 text-xl custom-title-font tracking-wide uppercase">~ DIGITE A
                MENSAGEM ~</h2>

            <form id="formNovaMensagem">
                <div class="mb-5">
                    <input type="text" id="remetente" name="remetente" placeholder="Remetente:"
                        class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] placeholder-[#f0e6d2] focus:outline-none">
                </div>

                <div class="mb-5">
                    <textarea id="mensagem" name="mensagem" placeholder="Escreva a mensagem aqui"
                        class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] placeholder-[#f0e6d2] focus:outline-none resize-y min-h-[120px]"></textarea>
                </div>

                <div class="mb-8">
                    <input type="text" id="destinatario" name="destinatario" placeholder="Destinatário:"
                        class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] placeholder-[#f0e6d2] focus:outline-none">
                </div>

                <div class="flex justify-between gap-4 mb-8">
                    <select id="cor" name="cor"
                        class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] appearance-none custom-select-arrow focus:outline-none cursor-pointer">
                        <option value="">Cor:</option>
                        <option value="#f00">Vermelho</option>
                        <option value="#00f">Azul</option>
                        <option value="#0f0">Verde</option>
                    </select>

                    <select id="fundo" name="fundo"
                        class="w-full p-3 rounded-md bg-[#c96a6a] text-[#f0e6d2] appearance-none custom-select-arrow focus:outline-none cursor-pointer">
                        <option value="">Fundo:</option>
                        <option value="#ddd">Claro</option>
                        <option value="#222">Escuro</option>
                    </select>
                </div>

                <div class="flex justify-center gap-5">
                    <button type="submit"
                        class="py-3 px-8 bg-[#6a9c6a] text-white font-bold rounded-md hover:bg-[#5b875b] transition-colors duration-300">ENVIAR</button>
                    <button type="button" id="cancelModalBtn"
                        class="py-3 px-8 bg-[#813F3F] text-white font-bold rounded-md hover:bg-[#b35c5c] transition-colors duration-300">CANCELAR</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openModalButton = document.getElementById('openMessageModalBtn');
            const messageModal = document.getElementById('messageModal');
            const closeModalXButton = document.getElementById('closeModalXBtn');
            const cancelModalButton = document.getElementById('cancelModalBtn');
            const formNovaMensagem = document.getElementById('formNovaMensagem');

            function showModal() {
                messageModal.classList.remove('hidden');
            }

            function hideModal() {
                messageModal.classList.add('hidden');
            }

            if (openModalButton) {
                openModalButton.addEventListener('click', function (event) {
                    event.preventDefault();
                    showModal();
                });
            }

            if (closeModalXButton) {
                closeModalXButton.addEventListener('click', function () {
                    hideModal();
                });
            }

            if (cancelModalButton) {
                cancelModalButton.addEventListener('click', function () {
                    hideModal();
                });
            }

            if (messageModal) {
                messageModal.addEventListener('click', function (event) {
                    if (event.target === messageModal) {
                        hideModal();
                    }
                });
            }

            if (formNovaMensagem) {
                formNovaMensagem.addEventListener('submit', function (event) {
                    event.preventDefault();

                    const formData = new FormData(formNovaMensagem);

                    fetch('../processa_mensagem.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Resposta do servidor:', data);
                            if (data.success) {
                                alert(data.message || 'Mensagem enviada com sucesso!');
                                formNovaMensagem.reset();
                                hideModal();
                            } else {
                                alert(data.message || 'Erro ao enviar mensagem. Verifique os campos.');
                            }
                        })
                        .catch(error => {
                            console.error('Erro ao enviar formulário:', error);
                            alert('Ocorreu um erro de comunicação. Tente novamente.');
                        });
                });
            }
        });
    </script>

</body>

</html>