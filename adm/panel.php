<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Tailwind CSS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 p-5 font-sans bg-[#DA6C6C] flex justify-center items-center min-h-screen">

    <div class="bg-[#AF3E3E] p-0.5 rounded-xl">
        <div class="bg-[#F4E9DD] py-10 px-10 rounded-lg w-full flex flex-col gap-5">
            <a href="index.php"
                class="flex items-center justify-start bg-[#AF3E3E] text-white py-[18px] px-6 rounded-lg text-base font-medium uppercase w-full transition-all duration-200 ease-in-out shadow-[0_2px_4px_rgba(0,0,0,0.15),inset_0_-2px_0px_rgba(0,0,0,0.1)] hover:bg-[#A2484E] active:bg-[#8F3F44] active:translate-y-px active:shadow-[0_1px_2px_rgba(0,0,0,0.15),inset_0_-1px_0px_rgba(0,0,0,0.1)] cursor-pointer">

                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="w-[22px] h-[22px] mr-[18px] fill-current">
                    <path
                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-7.07 4.42c-.32.2-.74.2-1.06 0L4.4 8.25V6.5l7.6 4.75 7.6-4.75v1.75z" />
                </svg>
                Enviar Mensagem
            </a>

            <a href="lista_mensagens.php"
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

            <a href="incluir_admin.php"
                class="flex items-center justify-start bg-[#AF3E3E] text-white py-[18px] px-6 rounded-lg text-base font-medium uppercase w-full transition-all duration-200 ease-in-out shadow-[0_2px_4px_rgba(0,0,0,0.15),inset_0_-2px_0px_rgba(0,0,0,0.1)] hover:bg-[#A2484E] active:bg-[#8F3F44] active:translate-y-px active:shadow-[0_1px_2px_rgba(0,0,0,0.15),inset_0_-1px_0px_rgba(0,0,0,0.1)] cursor-pointer">

                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="w-[22px] h-[22px] mr-[18px] fill-current">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
                Incluir Admin
            </a>
        </div>
    </div>

</body>

</html>