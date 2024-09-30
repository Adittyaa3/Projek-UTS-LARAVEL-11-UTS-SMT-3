

<nav class="sidebar sidebar-offcanvas" id="sidebar" style="margin-top: 70px; background-color: #f8f9fa;">
    <ul class="nav">
        {{-- Submenu untuk Anime --}}
        @if(Auth::user()->ID_jenis_user == 2 || Auth::user()->ID_jenis_user == 3)
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#animeMenu" aria-expanded="false" aria-controls="animeMenu">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Anime</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="animeMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('anime.index') }}">Show Anime</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('anime.create') }}">Create Anime</a></li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('anime.index')}}">
                <i class="mdi mdi-notification-clear-all menu-icon"></i>
                <span class="menu-title">tambah Anime</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/access')}}">
                <i class="mdi mdi-notification-clear-all menu-icon"></i>
                <span class="menu-title">tambah setting</span>
            </a>
        </li>
        @endif

    


        
        {{-- Submenu untuk User --}}
        @if(Auth::user()->ID_jenis_user == 3)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#userMenu" aria-expanded="false" aria-controls="userMenu">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="userMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ url('jenis_users') }}">Create Role</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('createuser') }}">Create User</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('showindex') }}">Show List User</a></li>
                </ul>
            </div>
        </li>

        {{-- Submenu untuk Menu Sidebar --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#menuSidebar" aria-expanded="false" aria-controls="menuSidebar">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Menu Sidebar</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menuSidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/menus/created') }}">Create</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/menus/show') }}">Show</a></li>
                </ul>
            </div>
        </li>
        @endif

        {{-- Menu tanpa submenu --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/list-anime') }}">
                <i class="mdi mdi-notification-clear-all menu-icon"></i>
                <span class="menu-title">Rekomendasi Anime</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('posts') }}">
                <i class="mdi mdi-notification-clear-all menu-icon"></i>
                <span class="menu-title">post feed</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.posts') }}">
                <i class="mdi mdi-notification-clear-all menu-icon"></i>
                <span class="menu-title">manage post</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ url('list-anime-ajax') }}">
                <i class="mdi mdi-notification-clear-all menu-icon"></i>
                <span class="menu-title">Ajax Anime</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Viewmanipulation_dom') }}">DOM </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Vieweffects') }}">EFFECT </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Viewajax') }}">AJAX</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/ViewAjaxGempa') }}">AjaxGempa</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/ViewGempamapas') }}">AjaxGempa</a></li>
              
              </ul>
            </div>
          </li>
        {{-- @foreach($menus as $menu)
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ $menu->menu_link }}" aria-expanded="false">
                <span>
                    <i class="{{ $menu->menu_icon }}"></i>
                </span>
                <span class="hide-menu">{{ $menu->menu_name }}</span>
            </a>
        </li>
    @endforeach --}}
     {{-- Menu dinamis --}}
      {{-- @foreach($menus as $menu)
     <li class="nav-item">
         <a class="nav-link" href="{{ $menu->menu_link }}">
             <i class="{{ $menu->menu_icon }} menu-icon"></i>
             <span class="menu-title">{{ $menu->menu_name }}</span>
         </a>
     </li>
 @endforeach  --}}

 {{-- @foreach(Auth::user()->jenisUser->getMenus as $menu)
     <!-- Jika menu tidak memiliki parent, tampilkan sebagai menu utama -->
     <li class="nav-item">
        <a class="nav-link" href="{{ $menu->menu_link }}">
            <i class="{{ $menu->menu_icon }} menu-icon"></i>
            <span class="menu-title">{{ $menu->menu_name }}</span>
         <a class="nav-link" href="{{ url($menu->menu_link) }}">
             <span class="menu-title">{{ $menu->menu_name }}</span>
         </a>
     </li>

@endforeach --}}

        {{-- Menu dinamis --}}
        {{-- @foreach($menus as $menu)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#menu-{{ $menu->id }}" aria-expanded="false" aria-controls="menu-{{ $menu->id }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">{{ $menu->menuLevel->name }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu-{{ $menu->id }}">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ url($menu->url) }}">Show {{ $menu->menuLevel->name }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url($menu->url . '/create') }}">Create {{ $menu->menuLevel->name }}</a></li>
                </ul>
            </div>
        </li>
        @endforeach --}}

   
        
        
        
    </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
