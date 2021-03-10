@extends('layouts.header')

@section('common')
  <!— Main Sidebar Container —>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!— Brand Logo —>
    <a href="#" class="brand-link">
      <img src="" alt="Allin|One Logo" class="brand-image img-circle">
      <span class="brand-text font-weight-light">Check<b class="text-primary">IN</b> | OUT</span>
    </a>

    <!— Sidebar —>
    <div class="sidebar">
      <!— Sidebar user panel (optional) —>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
      </div>

      <!— Sidebar Menu —>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!— This funcion will be used to check the URI and make the approprate tab active, segment is the variable that holds the name of the current uri  —>



<li class="nav-item has-treeview">
            <a href="#" class="nav-link

              <i class="nav-icon fa fa-laptop"></i>
              <p>
                Check IN | OUT
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Check UP List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>New Check Up</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Check In | OUT</li>

        </ul>

</nav>
      <!— /.sidebar-menu —>
    </div>
    <!— /.sidebar —>
  </aside>

  <!— Content Wrapper. Contains page content —>
  <div class="content-wrapper">

    @yield('content')
  </div>
@endsection
