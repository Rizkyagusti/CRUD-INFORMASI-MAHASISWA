<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="<?php __DIR__ ?>/img/EDU.png" width="350" class="d-inline-block align-top" alt="" style="margin-left: 50px;">
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#kontak" >Contact</a>
      </li>
      <li class="nav-item dropdown <?= $_SERVER['REQUEST_URI'] == '/tentang' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          About
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/tentang" >About Apps</a>
          <a class="dropdown-item" href="/tentang2">About Authors</a>
        </div>
      </li>
      <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/faq' ? 'active' : '' ?>">
        <a class="nav-link " href="/faq">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login">
        <button type="button" class="btn btn-info">Login</button>
        </a>
      </li>
    </ul>
  </div>
</nav>