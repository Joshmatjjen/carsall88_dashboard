
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 3 | Starter</title>

  <link rel="stylesheet" href="/css/app.css">

</head>
<body class="hold-transition sidebar-mini sidebar-open">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <div class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/logo.png" alt="Carsall88 Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Carsall88</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile/{{ Auth::user()->photo }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
              {{ Auth::user()->name }}
              <p>{{ Auth::user()->type }}</p>

            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>

          @can('isAdminORDeveloper')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog green"></i>
              <p>
                  Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="nav-icon fa fa-users teal"></i>
                  <p>Users</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/developer" class="nav-link">
                  <i class="nav-icon fas fa-laptop-code pink"></i>
                  <p>Developer</p>
                </router-link>
              </li>
            </ul>
          </li>
          @endCan


          @can('isAdminORDeveloperORMechanic')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car-mechanic cyan"></i>
              <p>
                  Car Mechanic
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/mechanics" class="nav-link">
                  <i class="nav-icon fas fa-user-hard-hat teal"></i>
                  <p>Mechanics</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/services" class="nav-link">
                  <i class="nav-icon fas fa-cogs pink"></i>
                  <p>Services</p>
                </router-link>
              </li>

            </ul>
          </li>
          @endCan

          {{-- E-commerce Shop --}}

          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-store bright-green"></i>
                  <p>
                      Shop
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/products" class="nav-link">
                      <i class="nav-icon fa fa-luggage-cart"></i>
                      <p>Products</p>
                    </router-link>
                  </li>
                  @can('isAdminORDeveloperORMechanic')
                  <li class="nav-item">
                    <router-link to="/product_categories" class="nav-link">
                      <i class="nav-icon fas fa-list  pink"></i>
                      <p>Product Categories</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/product_subcategories" class="nav-link">
                      <i class="nav-icon fab fa-hubspot yellow"></i>
                      <p>Product SubCategories</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/productbrands" class="nav-link">
                      <i class="nav-icon fas fa-tags  cyan"></i>
                      <p>Brands</p>
                    </router-link>
                  </li>
                  @endcan

                  <li class="nav-item">
                    <router-link to="/myproducts" class="nav-link">
                      <i class="nav-icon fas fa-shopping-basket azur"></i>
                      <p>My Products</p>
                    </router-link>
                  </li>

                </ul>
              </li>



              {{-- User Profile --}}
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user orange"></i>
              <p>
                Profile
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off red"></i>
                <p>
                {{ __('Logout') }}
                </p>
            </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>
        <!-- set progressbar -->
        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@auth
<script>
    window.user = @json(auth()->user());
</script>
@endauth

<script src="/js/app.js"></script>
</body>
</html>
