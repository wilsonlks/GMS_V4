<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="{{asset('css/home.css')}}">
   
</head>

<body>



<div class="d-flex" id="wrapper">
    
    <!-- Sidebar -->

    <div class="bg-white" id="sidebar-wrapper">
<div class = "sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"> 
<i class="fas fa-mail-bulk me-2"></i>GSMP
</div>

    <div class="list-group list-group-flush my-3">
        <a href= "{{url('/dashboardV2')}}" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        
        <a href="{{url('senderHistory')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i  class="fas fa-table me-2"></i>Sender History</a>
        <a href="{{url('logMessage')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i  class="fas fa-table me-2"></i>Reveice Message History</a>
        <a href="{{url('senderPages')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i  class="fas fa-broom me-2"></i>Sender Form</a>


    </div>
</div>

    <!-- Sidebar -->
    <!-- page -->


<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">


    <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h6 class="fs-2 m-0">Menu</h6>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div> -->

    </nav>


     <div class="container-fluid px-4">
      <!--      <form>  </form>-->

      @yield('content') 

       
    </div>

</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>





</body>

</html>
