<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-xl">
      <a class="navbar-brand" href="#">Web Post Article</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active == 'home') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active == 'blog') ? 'active' : '' }}" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active == 'about') ? 'active' : '' }}" href="/about">About</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active == 'categories') ? 'active' : '' }}" href="/category">Categories</a>
          </li>
        </ul>

          <ul class="navbar-nav ms-auto" >
          @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Selamat Datang, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-clipboard-data-fill"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <li><i class="bi bi-box-arrow-right"></i> Logout</li>
                    </button> 
                  </form>
                </ul>
              </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($active == 'login') ? 'active' : '' }}" href="/login">Login<i class="bi bi-box-arrow-in-right"></i></a>
            </li>
          @endauth
        </ul>

      </div>
    </div>
  </nav>