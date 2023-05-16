<!DOCTYPE html>
<html>
<head>
    <title>Ecran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- tailwind css -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="flex flex-row h-screen">
  <!-- component -->
<div class="flex flex-wrap bg-gray-100 w-full h-screen">
    <div class="w-2/12 bg-gary-900  p-3 shadow-lg ">
        <div class=" space-x-4 p-2 mb-8 flex flex-wrap">
            <h1 class="font-semibold text-2xl mt-10 capitalize font-poppins tracking-wide">meteo </h1>
            <img class="h-10 w-10 mt-10 rounded-full" src="{{asset('/images/rain.png')}}" alt="La meteo">   
        </div>
        <div class="">
            <h1 class="text-center text-7xl ">28 °C</h1>
            <div class="text-sm tracking-wide flex items-center justify-center space-x-1 text-center ">
                <img src="{{asset('/images/localisation.png')}}" alt="Localisation" class="h-5"><span class="text-gray-600">Meknes, Maroc</span>
            </div>
        </div>

        
        <div class="mt-28 flex flex-col items-center justify-center">
          <h3 class=" text-lg font-bold" id="date"></h3>
          <h1 class=" text-4xl font-bold mt-4" id="time"></h1>
        </div>
      
          <script>
          function setDateAndTime() {
        const date = new Date();
      
        // Get day of the week
        const daysOfWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        const dayOfWeek = daysOfWeek[date.getDay()];
      
        // Get month
        const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        const month = months[date.getMonth()];
      
        // Get day of the month
        const dayOfMonth = date.getDate();
      
        // Get year
        const year = date.getFullYear();
      
        // Format date
        const formattedDate = `${dayOfWeek}, ${dayOfMonth} ${month} ${year}`;
      
        // Get time
        const hours = date.getHours();
        const minutes = date.getMinutes();
        const seconds = date.getSeconds();
      
        // Format time
        const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      
        // Set the date and time in the HTML elements
        document.getElementById('date').innerHTML = formattedDate;
        document.getElementById('time').innerHTML = formattedTime;
      }
      
      setInterval(setDateAndTime, 1000);
      
          </script>  
        
          
    </div>

     <div class="w-10/12">
       @foreach ($annonces as $key => $annonce) 
        <div class="p-4 annonce m-4 bg-white shadow-md" style="display: none">
            <h1 class="text-center font-bold text-3xl underline mt-4"> {{ $annonce->title }} </h1>
            <p class="font-bold text-md mx-9 my-16"> {{ $annonce->content }} </p>
        </div>        
         @endforeach 
      </div>
      
      <script>
        const annonces = document.querySelectorAll('.annonce');
        let index = 0;
        setInterval(() => {
          annonces[index].style.display = 'none';
          index = (index + 1) % annonces.length;
          annonces[index].style.display = 'block';
        }, 5000);
      </script>
      
    
    
    
    <footer class="bg-gray-800 mt-4 px-0 py-1 dark:bg-gray-800 w-full fixed bottom-0">
        <div class="flex flex-wrap flex-row">
             <div class="w-2/12 px-2 mx-auto md:flex md:items-center md:justify-between">
                <img src="{{asset('/images/logo.png')}}" alt="FSM-UMI" srcset="" class=" h-12 w-full">
            </div> 
            <div class="w-10/12">
                <div class="w-full overflow-hidden">
                  <div class="p-2 h-12  bg-white shadow-lg">
                     @foreach ($information as $key => $info) 
                      <p class="font-bold text-lg info " style="animation: marquee 30s linear infinite"> {{ $info->content }}  </p>
                     @endforeach 
                  </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
  const information = document.querySelectorAll('.info');
  let i = 0;
  setInterval(() => {
    information[i].style.display = 'none';
    i = (i + 1) % information.length;
    information[i].style.display = 'block';
  }, 10000);
</script>

<style>
  @keyframes marquee {
    0% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(-100%);
    }
  }
</style>

</body>
</html>
