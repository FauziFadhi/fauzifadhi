@php
$path = Request::path()
@endphp
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview menu-open">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-dashboard"></i>
        <p>
          Data Master
          <i class="right fa fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('categories.index') }}" class="nav-link {{$path == 'product-category'? 'active': ''}}">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Product & Category</p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p></p>
          </a>
        </li> --}}
      </ul>
    </li>
    <li class="nav-item">
      <a href="{{route('periods.index')}}" class=" nav-link {{$path == 'period'? 'active': ''}}">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>Period</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/schedule" class="nav-link {{$path == 'schedule'? 'active': ''}}">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>Schedule</p>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-th"></i>
        <p>
          Simple Link
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li> --}}
  </ul>
</nav>