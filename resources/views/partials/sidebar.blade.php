<div class="text-3xl font-bold p-2  px-4">
    Dashboard
</div>
<div class="h-1 w-full rounded bg-gradient-to-b from-gray-400 via-gray-600 to-blue-800"></div>

<ul class="flex flex-col py-4">
  <li class="rounded-lg hover:bg-blue-100">
    <a href="{{ route('home')}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Dashboard</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-red-100">
    <a href="{{ route('annonces.create')}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Creer annonce</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-green-100">
    <a href="{{ route('information.create')}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Creer information</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-yellow-100">
    <a href="{{ route('mesPublications')}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Mes publications</span>
    </a>
  </li>
  @if ($role == "Admin")
  <li class="rounded-lg hover:bg-gray-100">
    <a href="{{ route('ecran')}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Ecran d'affichage</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-blue-100 ">
    <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Ajouter membre</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-red-100 ">
    <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Liste Membres</span>
    </a>
  </li>
  @endif

  
  @if ($role=="Responsable")
  <li class="rounded-lg hover:bg-green-100">
    <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Notifications</span>
      <span class="ml-auto mr-6 text-lg bg-red-100 rounded-full px-3 py-px text-red-500">5</span>

    </a>
  </li>
  <li class="rounded-lg hover:bg-gray-100">
    <a href="{{ route('ecran')}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Ecran d'affichage</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-blue-100 ">
    <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Ajouter membre</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-red-100 ">
    <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium">Liste Membres</span>
    </a>
  </li>
  
  @endif
</ul>