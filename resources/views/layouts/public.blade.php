<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
        rel="stylesheet"
    />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital@1&display=swap"
        rel="stylesheet"
    />
    <link rel="icon" type="image/jpg" href="{{asset("imagenes/icono.jpg")}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        @keyframes arriba {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-110%);
            }
        }

        @keyframes arribant {
            from {
                transform: translateY(-100%);
            }
            to {
                transform: translateY(0);
            }
        }

        @keyframes slide-out-left {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-35vw);
            }
        }

        @keyframes slide-out-leftnt {
            from {
                transform: translateX(-35vw);
            }
            to {
                transform: translateX(0);
            }
        }

        @keyframes abajo {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(20vh);
            }
        }

        @keyframes aparecerDesdeArriba {
            from {
                opacity: 0.6;
                transform: translateY(-100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .aparecer-desde-arriba {
            animation: aparecerDesdeArriba 0.5s ease-out forwards;
        }

        @keyframes abajont {
            0% {
                transform: translateY(20vh);
            }
            60% {
                transform: translateY(25vh);
            }
            100% {
                transform: translateY(0);
            }
        }

        .slide-out-left {
            transform-origin: top left;
            animation: slide-out-left 1.3s ease-in-out forwards;
        }

        .abajo {
            transform-origin: bottom left;
            animation: abajo 0.5s 1s ease-in-out forwards;
        }

        .arriba {
            transform-origin: top left;
            animation: arriba 0.5s ease-in-out forwards;
        }

        body {
            overflow-x: hidden;
        }

        .slide-out-leftnt {
            transform-origin: top left;
            animation: slide-out-leftnt 0.9s ease-in-out forwards;
            animation-fill-mode: forwards;
        }

        .abajont {
            transform-origin: bottom left;
            animation: abajont 0.5s ease-in-out forwards;
            animation-fill-mode: forwards;
        }

        .arribant {
            transform-origin: top left;
            animation: arribant 0.8s ease-in-out forwards;
            animation-fill-mode: forwards; /* Mantener estado final de la animación */
        }

        .activo {
            border: black solid 0.4rem;
        }

        @keyframes aparecer {
            from {
                opacity: 0.2;
            }
            to {
                opacity: 1;
            }
        }

        .aparecer {
            transform-origin: top left;
            animation: aparecer 0.4s ease-in-out forwards;
        }

        .aparecer2 {
            transition: opacity 0.2s ease-in-out;
            transition-delay: 0.25s;
            opacity: 0;
            visibility: hidden;
        }

        .group:hover .aparecer2 {
            opacity: 1;
            visibility: visible;
        }

        /* Ajustar la animación slide-out-left para dispositivos móviles */
        @media (max-width: 767px) {
            .slide-out-left {
                transform-origin: top left;
                animation: slide-out-left-mb 1.3s ease-in-out forwards;
            }

            .slide-out-leftnt {
                transform-origin: top left;
                animation: slide-out-leftnt-mb 0.9s ease-in-out forwards;
                animation-fill-mode: forwards;
            }

            @keyframes slide-out-left-mb {
                from {
                    transform: translateX(0);
                }
                to {
                    transform: translateX(-85vw);
                }
            }

            @keyframes slide-out-leftnt-mb {
                from {
                    transform: translateX(-85vw);
                }
                to {
                    transform: translateX(0);
                }
            }
        }

    </style>

</head>

<body>
<nav class="w-screen h-[10vh] bg-cyan-400 bg-opacity-100 z-50 fixed flex items-center justify-between px-4 md:px-12">
    <div class="flex items-center w-1/3">
        <a href="{{ route('index') }}" class="order-2">
            <svg class="w-8 mr-3 md:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
        </a>
        @auth
        <a href="{{ route('profile.index') }}" class="order-3">
            <svg class="w-7 hover:scale-110 transition-transform duration-100 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>        </a>
        <a href="{{ route('elenco.index') }}" class="order-4">
            <svg class="w-8 mx-3 md:mx-7 hover:scale-110 transition-transform duration-100 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 32H361.9l-1 1-127 127h92.1l1-1L453.8 32.3c-1.9-.2-3.8-.3-5.8-.3zm64 128V96c0-15.1-5.3-29.1-14-40l-104 104H512zM294.1 32H201.9l-1 1L73.9 160h92.1l1-1 127-127zM64 32C28.7 32 0 60.7 0 96v64H6.1l1-1 127-127H64zM512 192H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192z"/></svg>        </a>
        @else
            <a href="{{ route('login') }}" class="order-1">
                <svg class="w-8 md:hidden md:mr-0 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                <button class="mr-5 hover:scale-105 transition-transform duration-100 ease-in-out hidden md:block">Iniciar sesión</button>
            </a>
            <a class="hidden md:block hover:scale-105 mr-3 transition-transform duration-100 ease-in-out" href="{{ route('register') }}">
                <button>Registrarse</button>
            </a>
        @endauth
            @auth
                @if(auth()->user()->rol === 1)
                <a href="{{ route('admin.personajes.index') }}" class="order-5">
                    <svg class="w-7 hover:scale-110 transition-transform duration-100 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>                </a>
                </a>
                @endif
            @endauth
    </div>


    <a href="{{ route('index') }}">
        <p class="text-center hidden md:block my-auto translate-y-0 transition-transform duration-200 hover:scale-[105%] ease-in-out scale-100 font-bold text-3xl w-fit" id="doblapedia">
            <img class="w-[140px] mt-0.5" src="{{asset("imagenes/logo2.png")}}" alt="">
        </p>
    </a>
    <div class="md:w-1/3 w-1/2">
        <form id="search-form" action="{{ route('actors.search') }}" method="GET" class="relative w-full md:w-[82%] ml-auto">
            <input type="text" id="search-input" name="q" placeholder="Buscar actor..."
                   class="px-3 py-1 border w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
            <button type="submit" class="absolute top-1/2 transform bg-cyan-500 bg-opacity-70 hover:bg-cyan-300 -translate-y-1/2 p-1.5 hover:bg-opacity-100 text-white right-1.5 rounded-full"><svg class="w-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
        </form>

    </div>
</nav>

@yield('content')

