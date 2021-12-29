<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ URL::to('home') }}" class="simple-text logo-normal">
      {{ __('System obsługi pacjenta') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">home</i>
            <p>{{ __('Home') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">insert_emoticon</i>
          <p>{{ auth()->user()->name }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ URL::to('profile/edit') }}">
                <i class="material-icons">account_circle</i>
                <span class="sidebar-normal">{{ __('Profil') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ URL::to('user.index') }}">
                  <i class="material-icons">settings</i>
                <span class="sidebar-normal"> {{ __('Ustawienia') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'doctors' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('doctors') }}">
          <i class="material-icons">medication</i>
            <p>{{ __('Lekarze') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('specializations') }}">
          <i class="material-icons">grade</i>
          <p>{{ __('Specializacje') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'patients' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('patients') }}">
          <i class="material-icons">groups</i>
            <p>{{ __('Pacjenci') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('visits') }}">
          <i class="material-icons">view_list</i>
          <p>{{ __('Wizyty') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons">logout</i>
          <p>{{ __('Wyloguj') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
