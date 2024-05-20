<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <title>Document</title>
    <link rel="stylesheet" href="../../css/consulta.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital@1&display=swap" rel="stylesheet" />
</head>

<body>
<nav class="w-full h-[10vh] bg-green-300 z-20 fixed flex items-center justify-between px-12">
    <div class="flex items-center w-1/3">
        <a href="">
            <img class="w-11 h-11 mx-3" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEGklEQVR4nO2aS2xWRRTHf0hpSyzRPihEIVRXIChEEyJ7DLWJ2OoKH0tSVmChGzbWuBICK3wGwoIVcWmxoguliQEsatAYH4USwksCmCYmyKsPc5L/TSb92ntn5k5bNPyTSb5895w59//NnDPnnPngAf6/eBTYCOwGeoHfgOvALQ37/CvwmWReAh7hPkEN8DpwFBgBxgOH6XwBvKa5Zhy1wHbgsvNSt4FjQA/QAawEGiVbq8+rgFck0w/ccfQvAW9JdkbwInDWeYEfgE6gPmKueun+6Mx3BtjANMJ+qQ8dg2a8NdHcc/QDnXbm3zcd220R8L0M/ANsA+amNgJUAV0KDmZrAGhONXmLltsm/h14ukB+BbAT+AYYEvGbwDngELDOw+ZqYFA2B/UOpVciI3FSDjsVmoCDwGhBpBoD3pV8HpqA7xwyzWV8IttOJ4C6HFkz8ktg6L0HfAI8nDNvnUNmINZnPnK2U95KPAR8G3GGZMN0qwtWZlCy74eSaHMcu8gnXi1BIhvdBTbWOAHAOzTPl5Oa0lYP+d4ERM572Oly/MVri+1wzom5HvH/7wREbDzpEZp/kqyF/0IHvxywhAsTkbCxPmDLXypalTckaNHKB4sTEmn3sDfHSWc25Ql+JaHNnkSaExLxdeItku/LS+BGlMVabeGDBTrgUhBZ7mmzQVnzvanqmXZN+DVhuJCAxGhg+t4vPSvOKrBHD98OJNKXgMjPgTbfkZ5VmhU4oocvB076QQIilqOFoEN6VjZXIEsDLHv1haUnfyYgckVz+WKlkz5V4C89NGfyRUPCqBViNzu/rk32MKuf8xK4iZinfKwsiduBmW2No5eECOqglCVinZQQZETsnZNsLcNzqgBjSZjus4E2m6R7I8/ZfQ+myaJIzDDdUDyV5+x9keE3W+prESSuRmxl9/C2I6MCeyMPxAzdEUSsyReDnrwDMTZFcSPYqQASA6oxYnAsL0VpVCIWkjROxJIAIo9H2mhQtLqb955fBqbxk62KL5HY1eiU/ud5Qm9KyIqXGNQFEMlrL/kUVnYLkBt9slI3pq/7RAARkw1Fm3Qv+kS7LPqcDlz+FnUjfYlY029ZwPxVSvfHdf1QiBqnHeSjsBbYH3m6m84B4HkPO9ulMxhy9rSphLWm2DNTpAhbJ1wDlB32a3dN0ePNGnRjMVs+a5n+4TScrUt+eMJNU+pxF/hUL5+l7GecO5NgzHcayCdUCRZ12lOOUeBjx++Ol7mWW6x7jfFZHkO64iiFpc7SzsY4FxmqJ8VjgaE11TiuXZEUtdqzqRpyeWNMPjmtd++t0+w3Z4EXmCHUKOZfSUjAUqNtkYVWaVTr7xdHFf9DX/6OGg+blDnfF6hXcbZLZbP9gWbYeelhfWfP3lNJHfNviQfgv4B/ARxzhNGFGL+bAAAAAElFTkSuQmCC">
        </a>
        <a href="">
            <img class="w-11 h-11 mx-3" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAABOElEQVR4nO3WwSsFURTH8U8iUZREKQuWip0sLCys/AFWbPgjbEg27Kz5W2RppaxYKIqUwg6lFLkaXfV6De+9a57Ry69OM53pnPOdc6Y5l3/9YYUEO8VQmQChSIgQLQW4EIiQCHBScR0sA2AAx0V0IiQCKApiH3MJAHmWjaPpCjWsYbVjA5e4wiY6fgDWsNZz3mLrNwHOY+AMpuL9dU7iWu1OBniKgd1fJCodoF61LkAoewShbIB61boAoewRhCL/+98B9KMrMXkfFiTqMBbcwXbCWs2gD2LcagrAOJ7xhle8YLJqW85jD4+4xXJ81hv9IW7SYYlay9mEWeElXOTM/h7TFefCO4ylFv8sdhQTdn54mK0oeIYVjOIh5xQ0ogBNVLU+0y4W0Vbhy9p/E1d29s30FFH8X5qtd9DG59+YnAVQAAAAAElFTkSuQmCC">
        </a>
        <a href="{{ route('elenco.index') }}">
            <img class="w-11 p-1 h-11 mx-3" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC5klEQVR4nO3ZW6gVZRQH8F9lGd6g8EDpOSKlkfggiBgY5EOgpoQgQhTVQ2CahJcHCS8PQQg+6JuhPggiiHhBkDITpSAsAiuiIEGE8kqiHlETs9CJiXUOwzR7t89pe2YOzR/Wyzdr5vuv9V9rfd9mMzjwDFbhC1zDQYw0CPAgZmADTiIpsDUqimGYj+24lCN9FcdzaydUCKPxJvbiZo7oL9iGl/Fw+D+Hz+L5PXSWSX4S3sNXuNugbE5gYpNvfBx+bw8gbw/hBWzEqQbEi+yPUKQo6yvC59D9Jj8cC7ADl3MEr2N/kPm2hYBuYxOmYy2+yTxLv912PBlSH4rNs2TSEtqMF/FI5p0H8EoflUrwWyRjdrvIT8ZqfN2k3nvsZ7wRozWPtJkX40KT9y9Gqc3Fo+2o95kh9emCzbpbyOYPmJf55pgIIm3gvJI/Yn2UVaref8IILMROXCmo9wNRUuMwBG/hTAsBfRnT6V5m7c8YryvxlDZgLJbgE/zegEh64j7b4P2hWF5wsBXZDezD63i8HeSnYF1Blv5tRH6IJwq+NyrUyR90qZ3HFsyJoNuCkXEZy4+8j7Ao7ju3WpgiH8RhtxRHcCfn8334TGtHvRfh3cyRvyvmf3oOyDXk1lCg1RGZ1vsxLMN4A4B3MpvfiYZOa3ZCge/EmN+NyKfNvwev4TEDjOcbkEoDejp8UlKvYnfBiD0bfTIrd9gNOHYFoU+jhDpjWvXM/M+jTLLkv8P7mHq/6r0/+DXIdWXWugqm09Hop/S8qCS6g2xnk0CqbsfFj5okyqkr7HAFyCV9tL+vAvmrdpLpkY6cgh2xXhX/pCcQMeerQKqjj/7/CCS7kNpPBdeOZpuU4S8mZ8NABmMQSVEgg9V6UTaROpBaEeWXUVL3iPIzntSKKD/LSa2I8jOb1IoEys5orUgkoRdlZ7RWpFZENa0XZROpA6kVUX4ZJf+LHjlXATJJPy39j6YXL8VC2aT6E8ScvwAnYZZsqyKAtQAAAABJRU5ErkJggg==">
        </a>
    </div>
    <a href="{{ route('index') }}">
        <p class="text-center my-auto w-1/3 font-bold text-3xl">Doblapedia</p>
    </a>
    <div class="w-1/3 ">
        <div class="w-full h-6 bg-slate-50 rounded-full "></div>
    </div>
</nav>
<div class="container pt-[12vh] pl-2">
        <h1>Listado de Personajes</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Serie</th>
                <th>Actor original</th>
                <th>Id del actor</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($personajes as $personaje)
                <tr>
                    <td>{{ $personaje->nombre }}</td>
                    <td>{{ $personaje->serie }}</td>
                    <td>{{ $personaje->actor_original }}</td>
                    <td>{{ $personaje->actor_id }}</td>
                    <td>
                        <form action="{{ route('admin.personajes.delete', $personaje->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    <div class="mt-4">
        <a href="{{ route('admin.personajes.create') }}" class="px-1 rounded py-1 bg-amber-500 w-auto text-decoration-none">Crear personaje</a>
    </div>
    </div>


</body>
