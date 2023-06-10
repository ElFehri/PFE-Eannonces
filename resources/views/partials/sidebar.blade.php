<div class="h-1 w-full rounded bg-gradient-to-b from-gray-400 via-gray-600 to-blue-800"></div>
<div class="text-3xl font-bold p-2  px-4">
    Dashboard
</div>

<ul class="flex flex-col py-4">
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('home') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{ route('home')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-tachometer-alt pr-0 md:pr-3"></i> Dashboard</span>
    </a>
  </li>
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('annonces.create') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{ route('annonces.create')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-bullhorn pr-0 md:pr-3"></i>Créer annonce</span>
    </a>
  </li>
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('information.create') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{ route('information.create')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-info-circle pr-0 md:pr-3"></i>Créer information</span>
    </a>
  </li>
  
  @if ($role === "Member" || $role === "Admin")
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('announcesStatus') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{ route('announcesStatus')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-bell pr-0 md:pr-3"></i> Notifications</span>
    </a>
  </li>
  @endif

  @if ($role==="Responsable")
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('newAnnonces') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{route('newAnnonces')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-bell pr-0 md:pr-3"></i> Notifications</span>
    </a>
  </li>
  @endif

  @if ($role === "Admin" || $role === "Responsable")
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('allAnnonces') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{ route('allAnnonces')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-bars pr-0 md:pr-3"></i> Annonces</span>
    </a>
  </li>
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('allInformations') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{ route('allInformations')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-list pr-0 md:pr-3"></i> Informations</span>
    </a>
  </li>
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('ecran') ? 'bg-green-100 font-sans' : '' }}">
    <a href="{{ route('ecran')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-desktop pr-0 md:pr-3"></i> Ecran d'affichage</span>
    </a>
  </li>
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('addUser') ? 'bg-green-100 font-sans' : '' }} ">
    <a href="{{route('addUser')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-user-plus pr-0 md:pr-3"></i>Nouveau compte</span>
    </a>
  </li>
  <li class="mb-1 rounded-lg hover:bg-blue-100 {{ request()->routeIs('usersList') ? 'bg-green-100 font-sans' : '' }} ">
    <a href="{{route('usersList')}}" class="flex flex-row items-center h-12  no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700">
      <span class="text-lg font-medium"><i class="fa fa-users pr-0 md:pr-3"></i> Liste membres</span>
    </a>
  </li>
  @endif

</ul>
