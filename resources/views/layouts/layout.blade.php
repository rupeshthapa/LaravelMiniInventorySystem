<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Mini Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .sidebar{
            width: 200px;
            min-height:100vh;
            background-color: black;
            color: white;
        }
        .navbar-custom{
            background-color: #6c757d;
            color: white;
        }
        
    .custom-gap{
        margin-top: 35px;
    }
    </style>
</head>
<body>

    <div class="d-flex">
        <div class="sidebar p-3">
            <h5>Logo</h5>
            <ul class="nav flex-column custom-gap">
                <li class="nav-item"><a class="nav-link text-white hover-bg-dark" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white hover-bg-dark" href="{{ route('products.index') }}"><i class="bi bi-box-seam me-2"></i>Products</a></li>
                <li class="nav-item"><a class="nav-link text-white hover-bg-dark" href="{{ route('categories.index') }}"><i class="bi bi-layers me-2"></i>Categories</a></li>
            </ul>
        </div>
        <div class="flex-grow-1 d-flex flex-column">
            <div class="navbar-custom p-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Navbar</h4>
                <form class="d-flex" role="search" method="GET" action="{{ route('products.search') }}">
                    <input class="form-control me-2" style="width: 500px" type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-dark me-2" type="submit">Search</button>
                  </form>
                  <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                
              </div>
              

            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>