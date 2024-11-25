<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <h1 class="d-inline-block align-text-center text-primary">Hotel Ravany</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Kamar Hotel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Fasilitas Hotel</a>
        </li>
        @can('admin')
          <li class="nav-item  row align-items-center ms-1">
            <a href="/dashboard" class="btn btn-md btn-success text-white" type="button">Dashboard</a>
          </li>
        @endcan

        @can('user')
          <li class="nav-item  row align-items-center ms-1">
            <a href="/pemesanan" class="btn btn-md btn-success text-white" type="button">Dashboard</a>
          </li>
        @endcan

        @can('resepsionis')
          <li class="nav-item  row align-items-center ms-1">
            <a href="/resepsionis" class="btn btn-md btn-success text-white" type="button">Dashboard</a>
          </li>
        @endcan


        @if (!Auth()->check())
        <li class="nav-item  row align-items-center ms-1">
          <a href="/login" class="btn btn-md btn-primary text-white" type="button">Login</a>
        </li> 
        @endif
      
        
       
      </ul>
    </div>
  </div>
</nav>