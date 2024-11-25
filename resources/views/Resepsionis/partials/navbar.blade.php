<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Hallo {{ Auth()->user()->name }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>