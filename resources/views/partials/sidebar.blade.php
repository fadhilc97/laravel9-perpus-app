<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'anggota' ? 'active' : '' }}" href="/anggota">
          <span data-feather="users" class="align-text-bottom"></span>
          Anggota
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'buku' ? 'active' : '' }}" href="/buku">
          <span data-feather="book" class="align-text-bottom"></span>
          Buku
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'transaksi' ? 'active' : '' }}" href="/transaksi">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Transaksi
        </a>
      </li>
    </ul>
  </div>
</nav>