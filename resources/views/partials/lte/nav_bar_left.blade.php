<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      @if(file_exists(asset('img/logo.png')))
      <img src="{{asset('img/logo.png')}}" alt="Home" class="brand-image img-circle elevation-3" style="opacity: .8">
      @endif
     <span class="brand-text font-weight-light">Home</span>
    </a>

    <div class="sidebar">
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Listagem
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('listagem.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Listagem</p>
          </a>
        </li>
        </ul>
      </li>

    {{--menu--}}

        </ul>
      </nav>
    </div>
</aside>
