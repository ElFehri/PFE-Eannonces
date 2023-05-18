<div class="h-1 w-full rounded bg-gradient-to-b from-gray-400 via-gray-600 to-blue-800"></div>
<div class="text-3xl font-bold p-2  px-4">
    Dashboard
</div>

<ul class="flex flex-col py-4">
  <li class="rounded-lg hover:bg-blue-100">
    <a href="{{ route('home')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-tachometer-alt pr-0 md:pr-3"></i> Dashboard</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-red-100">
    <a href="{{ route('annonces.create')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-plus pr-0 md:pr-3"></i> Annonce</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-green-100">
    <a href="{{ route('information.create')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-plus pr-0 md:pr-3"></i> Information</span>
    </a>
  </li>
  @if ($role == "Admin")
  <li class="rounded-lg hover:bg-gray-100">
    <a href="{{ route('allAnnonces')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-bars pr-0 md:pr-3"></i> Annonces</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-gray-100">
    <a href="{{ route('allInformations')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-list pr-0 md:pr-3"></i> Informations</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-gray-100">
    <a href="{{ route('ecran')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-desktop pr-0 md:pr-3"></i> Ecran d'affichage</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-blue-100 ">
    <a href="#" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-user-plus pr-0 md:pr-3"></i> Membre</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-red-100 ">
    <a href="#" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-users pr-0 md:pr-3"></i> Liste Membres</span>
    </a>
  </li>
  @endif

  
  @if ($role=="Responsable")
  <li class="rounded-lg hover:bg-green-100">
    <a href="#" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-bell pr-0 md:pr-3"></i> Notifications</span>
      <span class="ml-2 text-lg bg-red-100 rounded-full px-2 py-px text-red-500">5</span>

    </a>
    <li class="rounded-lg hover:bg-gray-100">
      <a href="{{ route('allAnnonces')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
        <span class="text-lg font-medium"><i class="fa fa-bars pr-0 md:pr-3"></i> annonces</span>
      </a>
    </li>
    <li class="rounded-lg hover:bg-gray-100">
      <a href="{{ route('allInformations')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
        <span class="text-lg font-medium"><i class="fa fa-list pr-0 md:pr-3"></i> informations</span>
      </a>
    </li>
  </li>
  <li class="rounded-lg hover:bg-gray-100">
    <a href="{{ route('ecran')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-desktop pr-0 md:pr-3"></i>  Ecran d'affichage</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-blue-100 ">
    <a href="#" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-user-plus pr-0 md:pr-3"></i> Membre</span>
    </a>
  </li>
  <li class="rounded-lg hover:bg-red-100 ">
    <a href="#" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
      <span class="text-lg font-medium"><i class="fa fa-users pr-0 md:pr-3"></i> Liste Membres</span>
    </a>
  </li>
  
  @endif
</ul>