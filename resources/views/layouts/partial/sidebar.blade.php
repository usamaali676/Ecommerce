<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (Auth::user()->role_id == 1)

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bx  bx-shield-quarter"></i><span>Roles</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('role.index')}}">
              <i class="bi bi-circle"></i><span>View Roles</span>
            </a>
          </li>
          <li>
            <a href="{{route('role.create')}}">
              <i class="bi bi-circle"></i><span>Add New Role</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Tables Nav -->
      @endif
      @if (Auth::user()->role_id == 1)
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav2" data-bs-toggle="collapse" href="#">
          <i class="bx bx-user"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('user.index')}}">
              <i class="bi bi-circle"></i><span>View Users</span>
            </a>
          </li>
          <li>
            <a href="{{route('user.create')}}">
              <i class="bi bi-circle"></i><span>Add New User</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Tables Nav -->
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav3" data-bs-toggle="collapse" href="#">
          <i class="bx bx-category"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('category.index')}}">
              <i class="bi bi-circle"></i><span>View Category</span>
            </a>
          </li>
          <li>
            <a href="{{route('category.create')}}">
              <i class="bi bi-circle"></i><span>Add New Category</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav4" data-bs-toggle="collapse" href="#">
          <i class="bx bx-cube"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('product.index')}}">
              <i class="bi bi-circle"></i><span>View Product</span>
            </a>
          </li>
          <li>
            <a href="{{route('product.create')}}">
              <i class="bi bi-circle"></i><span>Add New Product</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav5" data-bs-toggle="collapse" href="#">
          <i class="bx bx-cart"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('order.index')}}">
              <i class="bi bi-circle"></i><span>View Orders</span>
            </a>
          </li>

        </ul>
      </li>
      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav6" data-bs-toggle="collapse" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bx bx-power-off"></i><span>Log Out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
      <!-- End Tables Nav -->


    </ul>

  </aside>
