<!DOCTYPE html>
<html>
<head>
    <title>Ecran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@^1.10.0/dist/echo.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="h-screen overflow-hidden">
<div id="app">
    <div class="flex flex-wrap bg-white h-screen">
        <div class="sm:w-1/4 lg:w-1/6 shadow-lg">
            <div class="space-x-4 p-2 mb-8 flex flex-col justify-between">
                <div class="mb-12 pt-4">
                    <h1 id="temperature" class="text-center text-7xl mt-5">..°C</h1>
                    <div class="text-sm tracking-wide flex items-center justify-center space-x-1 text-center">
                        <img src="{{asset('/images/localisation.png')}}" alt="Localisation" class="h-5">
                        <span id="location" class="text-gray-600">Meknes, Morocco</span>
                    </div>
                </div>
                <div class="mt-12 flex flex-col items-center justify-center">
                    <h3 class="text-lg font-bold" id="date">Loading...</h3>
                    <h1 class="text-4xl font-bold mt-4" id="time">Loading...</h1>
                </div>
            </div>
        </div>

        <div class="sm:w-3/4 lg:w-5/6 bg-gray-100 max-h-screen " id="annonces-container">
            @foreach ($annonces as $key => $annonce)
                <div class="annonce m-1" style="display: none">
                    @if ($annonce->content && !$annonce->image)
                        <h1 class="p-4 text-center font-bold text-3xl mt-1 py-2 border-b border-gray-500">{{ $annonce->title }}</h1>
                        <div class="w-full p-4 rounded-xl flex items-center justify-center">
                            <p class="font-bold text-lg p-3 shadow-g">{!! $annonce->content !!}</p>
                        </div>
                    @elseif ($annonce->image && !$annonce->content)
                        <div class="object-cover rounded-xl flex items-center justify-center">
                            <img src="{{ asset('storage/annoncesImages/' . $annonce->image) }}" alt="Annonce Image" class="w-full">
                        </div>
                    @elseif ($annonce->image && $annonce->content)
                        <div class="flex p-2">
                            <div class="w-1/3">
                                <h1 class="text-center font-bold text-3xl mt-1 py-2 border-b border-gray-500">{{ $annonce->title }}</h1>
                                <div class="rounded-xl flex items-center justify-center">
                                    <p class="font-bold text-lg p-3 shadow-g">{!! $annonce->content !!}</p>
                                </div>
                            </div>
                            <div class="w-2/3">
                                <div class="max-h-screen rounded-xl flex items-center justify-center">
                                    <img src="{{ asset('storage/annoncesImages/' . $annonce->image) }}" alt="Annonce Image" class="w-full">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
          
    </div>

    <footer class="flex flex-row fixed left-0 bottom-0 w-full">
        <div class="sm:w-1/4 lg:w-1/6 bg-white">
            <img src="{{asset('/images/logo.png')}}" alt="FSM-UMI" class="h-16 w-full">
        </div>
        <div class="sm:w-3/4 lg:w-5/6 bg-white flex justify-center items-center" id="informations-container">
            @forelse ($information as $key => $info)
                <p class="text-black my-2 info text-base font-bold" style="display: none;">{{ $info->content }}</p>
            @empty
            <p class="text-black my-2 info text-base font-bold" style="display: none;">FSM-UMI</p>
            @endforelse
        </div>
    </footer>
</div>

<script>
    async function getWeather() {
        try {
            const response = await fetch('http://api.weatherapi.com/v1/current.json?key=cdf1481400db4a12905153211230306&q=Meknes');
            const data = await response.json();

            const temperatureElement = document.getElementById('temperature');
            temperatureElement.textContent = data.current.temp_c + ' °C';

            const locationElement = document.getElementById('location');
            locationElement.textContent = data.location.name + ', ' + data.location.country;
        } catch (error) {
            console.log(error);
        }
    }

    getWeather();
</script>

<script src="{{asset('/js/dateTime.js')}}"></script>

    <script>
        const annonces = document.querySelectorAll('.annonce');
        let index = 0;
        setInterval(() => {
            annonces[index].style.display = 'none';
            index = (index + 1) % annonces.length;
            annonces[index].style.display = 'block';
        }, 7000);
    </script>

    <script>
        const information = document.querySelectorAll('.info');
        let i = 0;
        setInterval(() => {
            information[i].style.display = 'none';
            i = (i + 1) % information.length;
            information[i].style.display = 'block';
        }, 5000);
    </script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    {{-- reload page --}}
    <script>
        setTimeout(function() {
            location.reload();
        }, 120000); 
    </script>
    
    
</body>
</html>
