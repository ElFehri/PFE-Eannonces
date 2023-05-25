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
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="h-screen overflow-hidden">
    <div class="flex flex-wrap bg-white h-screen">
        <div class="sm:w-1/4 lg:w-1/6 shadow-lg">
            <div class="space-x-4 p-2 mb-8 flex flex-wrap">
                <div>
                    <h1 class="text-center text-7xl my-5">28 °C</h1>
                    <div class="text-sm tracking-wide flex items-center justify-center space-x-1 text-center">
                        <img src="{{asset('/images/localisation.png')}}" alt="Localisation" class="h-5">
                        <span class="text-gray-600">Meknes, Maroc</span>
                    </div>
                </div>
                <div class="mt-4 flex flex-col items-center justify-center">
                    <h3 class="text-lg font-bold" id="date"></h3>
                    <h1 class="text-4xl font-bold mt-4" id="time"></h1>
                </div>
            </div>
        </div>

        <div class="sm:w-3/4 lg:w-5/6 h-full bg-gray-100">
        @foreach ($annonces as $key => $annonce)
            <div class="p-4 annonce m-1" style="display: none">
                <h1 class="text-center font-bold text-3xl mt-4 pb-2 border-b border-gray-500">{{ $annonce->title }}</h1>
                <div class="w-500 rounded-xl flex items-center justify-center">
                    <p class="font-bold text-lg p-3 shadow-g">{{ $annonce->content }}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <footer class="flex flex-row fixed left-0 bottom-0 w-full">
        <div class="sm:w-1/4 lg:w-1/6 bg-white">
            <img src="{{asset('/images/logo.png')}}" alt="FSM-UMI" class="h-16 w-full">
        </div>
        <div class="sm:w-3/4 lg:w-5/6 shadow-lg bg-white flex justify-center items-center">
        @foreach ($information as $key => $info)
            <p class="text-black my-2 info text-base font-bold" style="display: none;">{{ $info->content }}</p>
        @endforeach
        </div>
    </footer>


    <!-- JavaScript code -->

    <script>
        function setDateAndTime() {
            const date = new Date();
            const daysOfWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            const dayOfWeek = daysOfWeek[date.getDay()];
            const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
            const month = months[date.getMonth()];
            const dayOfMonth = date.getDate();
            const year = date.getFullYear();
            const formattedDate = `${dayOfWeek}, ${dayOfMonth} ${month} ${year}`;
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();
            const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            document.getElementById('date').innerHTML = formattedDate;
            document.getElementById('time').innerHTML = formattedTime;
        }
        setInterval(setDateAndTime, 1000);
    </script>

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
</body>
</html>
