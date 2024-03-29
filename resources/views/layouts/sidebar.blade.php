<div class="sidebar-wrapper d-flex flex-column flex-shrink-0 p-3 text-white bg-dark min-h-screen">
  <ul class="nav nav-pills flex-column mb-auto ">
    <li>
      <a href="{{ route('dashboard') }}" @class(['nav-link', 'text-white', 'active' => request()->routeIs('dashboard')])" aria-current="page">
        <i class="bi bi-speedometer2"></i>
        Dashboard
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <i class="bi bi-people"></i>
        Staff management
      </a>
    </li>
    <li>
      <a href="{{ route('warehouse') }}" @class(['nav-link', 'text-white', 'active' => request()->routeIs('warehouse')])" aria-current="page">
        <i class="bi bi-box-seam"></i>
        Material Stock
      </a>
    </li>
      <li>
          <a href="{{ route('products') }}" @class(['nav-link', 'text-white', 'active' => request()->routeIs('products')])" aria-current="page">
          <i class="bi bi-backpack"></i>
          Product Stock
          </a>
      </li>
    <li>
        <a href="{{ route('orders') }}" @class(['nav-link', 'text-white', 'active' => request()->routeIs('orders')])" aria-current="page">
        <i class="bi bi-bag"></i>
         Orders
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <i class="bi bi-person-workspace"></i>
        Production
      </a>
    </li>

    <li>
      <a href="#" class="nav-link text-white">
        <i class="bi bi-building"></i>
        Branches
      </a>
    </li>
  </ul>
</div>
