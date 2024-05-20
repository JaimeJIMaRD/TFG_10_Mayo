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
    <link rel="stylesheet" href="../../css/consulta.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital@1&display=swap"
        rel="stylesheet"
    />
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
            animation-fill-mode: forwards; /* Mantener estado final de la animación */
        }

        .abajont {
            transform-origin: bottom left;
            animation: abajont 0.5s ease-in-out forwards;
            animation-fill-mode: forwards; /* Mantener estado final de la animación */
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
    </style>
</head>

<body>
<nav class="w-full h-[10vh] bg-green-300 z-20 fixed flex items-center justify-between px-12">

    <div class="flex items-center w-1/3">
        @auth
        <a href="{{ route('profile.index') }}">
            <img class="w-11 h-11 mx-3" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEGklEQVR4nO2aS2xWRRTHf0hpSyzRPihEIVRXIChEEyJ7DLWJ2OoKH0tSVmChGzbWuBICK3wGwoIVcWmxoguliQEsatAYH4USwksCmCYmyKsPc5L/TSb92ntn5k5bNPyTSb5895w59//NnDPnnPngAf6/eBTYCOwGeoHfgOvALQ37/CvwmWReAh7hPkEN8DpwFBgBxgOH6XwBvKa5Zhy1wHbgsvNSt4FjQA/QAawEGiVbq8+rgFck0w/ccfQvAW9JdkbwInDWeYEfgE6gPmKueun+6Mx3BtjANMJ+qQ8dg2a8NdHcc/QDnXbm3zcd220R8L0M/ANsA+amNgJUAV0KDmZrAGhONXmLltsm/h14ukB+BbAT+AYYEvGbwDngELDOw+ZqYFA2B/UOpVciI3FSDjsVmoCDwGhBpBoD3pV8HpqA7xwyzWV8IttOJ4C6HFkz8ktg6L0HfAI8nDNvnUNmINZnPnK2U95KPAR8G3GGZMN0qwtWZlCy74eSaHMcu8gnXi1BIhvdBTbWOAHAOzTPl5Oa0lYP+d4ERM572Oly/MVri+1wzom5HvH/7wREbDzpEZp/kqyF/0IHvxywhAsTkbCxPmDLXypalTckaNHKB4sTEmn3sDfHSWc25Ql+JaHNnkSaExLxdeItku/LS+BGlMVabeGDBTrgUhBZ7mmzQVnzvanqmXZN+DVhuJCAxGhg+t4vPSvOKrBHD98OJNKXgMjPgTbfkZ5VmhU4oocvB076QQIilqOFoEN6VjZXIEsDLHv1haUnfyYgckVz+WKlkz5V4C89NGfyRUPCqBViNzu/rk32MKuf8xK4iZinfKwsiduBmW2No5eECOqglCVinZQQZETsnZNsLcNzqgBjSZjus4E2m6R7I8/ZfQ+myaJIzDDdUDyV5+x9keE3W+prESSuRmxl9/C2I6MCeyMPxAzdEUSsyReDnrwDMTZFcSPYqQASA6oxYnAsL0VpVCIWkjROxJIAIo9H2mhQtLqb955fBqbxk62KL5HY1eiU/ud5Qm9KyIqXGNQFEMlrL/kUVnYLkBt9slI3pq/7RAARkw1Fm3Qv+kS7LPqcDlz+FnUjfYlY029ZwPxVSvfHdf1QiBqnHeSjsBbYH3m6m84B4HkPO9ulMxhy9rSphLWm2DNTpAhbJ1wDlB32a3dN0ePNGnRjMVs+a5n+4TScrUt+eMJNU+pxF/hUL5+l7GecO5NgzHcayCdUCRZ12lOOUeBjx++Ol7mWW6x7jfFZHkO64iiFpc7SzsY4FxmqJ8VjgaE11TiuXZEUtdqzqRpyeWNMPjmtd++t0+w3Z4EXmCHUKOZfSUjAUqNtkYVWaVTr7xdHFf9DX/6OGg+blDnfF6hXcbZLZbP9gWbYeelhfWfP3lNJHfNviQfgv4B/ARxzhNGFGL+bAAAAAElFTkSuQmCC">
        </a>
        <a href="{{ route('elenco.index') }}">
            <img class="w-11 p-1 h-11 mx-3" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC5klEQVR4nO3ZW6gVZRQH8F9lGd6g8EDpOSKlkfggiBgY5EOgpoQgQhTVQ2CahJcHCS8PQQg+6JuhPggiiHhBkDITpSAsAiuiIEGE8kqiHlETs9CJiXUOwzR7t89pe2YOzR/Wyzdr5vuv9V9rfd9mMzjwDFbhC1zDQYw0CPAgZmADTiIpsDUqimGYj+24lCN9FcdzaydUCKPxJvbiZo7oL9iGl/Fw+D+Hz+L5PXSWSX4S3sNXuNugbE5gYpNvfBx+bw8gbw/hBWzEqQbEi+yPUKQo6yvC59D9Jj8cC7ADl3MEr2N/kPm2hYBuYxOmYy2+yTxLv912PBlSH4rNs2TSEtqMF/FI5p0H8EoflUrwWyRjdrvIT8ZqfN2k3nvsZ7wRozWPtJkX40KT9y9Gqc3Fo+2o95kh9emCzbpbyOYPmJf55pgIIm3gvJI/Yn2UVaref8IILMROXCmo9wNRUuMwBG/hTAsBfRnT6V5m7c8YryvxlDZgLJbgE/zegEh64j7b4P2hWF5wsBXZDezD63i8HeSnYF1Blv5tRH6IJwq+NyrUyR90qZ3HFsyJoNuCkXEZy4+8j7Ao7ju3WpgiH8RhtxRHcCfn8334TGtHvRfh3cyRvyvmf3oOyDXk1lCg1RGZ1vsxLMN4A4B3MpvfiYZOa3ZCge/EmN+NyKfNvwev4TEDjOcbkEoDejp8UlKvYnfBiD0bfTIrd9gNOHYFoU+jhDpjWvXM/M+jTLLkv8P7mHq/6r0/+DXIdWXWugqm09Hop/S8qCS6g2xnk0CqbsfFj5okyqkr7HAFyCV9tL+vAvmrdpLpkY6cgh2xXhX/pCcQMeerQKqjj/7/CCS7kNpPBdeOZpuU4S8mZ8NABmMQSVEgg9V6UTaROpBaEeWXUVL3iPIzntSKKD/LSa2I8jOb1IoEys5orUgkoRdlZ7RWpFZENa0XZROpA6kVUX4ZJf+LHjlXATJJPy39j6YXL8VC2aT6E8ScvwAnYZZsqyKAtQAAAABJRU5ErkJggg==">
        </a>
        @else
            <a href="{{ route('login') }}">
                <button>Iniciar sesión</button>
            </a>
        @endauth
            @auth
                @if(auth()->user()->rol === 1)
                <a href="{{ route('admin.personajes.index') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Administrar Personajes</button>
                </a>
                @endif
            @endauth
    </div>


    <a href="{{ route('index') }}">
        <p class="text-center my-auto translate-y-0  transition-transform duration-200 hover:scale-[105%] ease-in-out scale-100 font-bold text-3xl w-fit" id="doblapedia">Doblapedia</p>
    </a>
    <div class="w-1/3">
        <form id="search-form" action="{{ route('actors.search') }}" method="GET" class="relative w-fit mx-auto">
            <input type="text" id="search-input" name="q" placeholder="Buscar actor..."
                   class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
            <button type="submit" class="absolute top-1/2 transform -translate-y-1/2 px-4 py-.5 bg-blue-500 text-white right-1.5 rounded-md">Buscar</button>
        </form>

    </div>
</nav>

@yield('content')

