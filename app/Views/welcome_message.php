<?php include('templates/header.php') ?>

<div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="index.html" class="spur-logo"><i class="fas fa-briefcase-medical"></i> <span>Hospital</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="/dashboard" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <select class="searchbox-input" name="search"> </select>
                </form>
                <div class="tools">
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="/login/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>


    <script>
      $('.searchbox-input').select2({
        placeholder: 'Search',
        ajax: {
          url: '/dashboard/search',
          dataType: 'json',
          delay: 250,
          processResults: function(data){
            return {
              results: data
            };
          },
          cache: true
        }
      });
    </script>

<?php include('templates/footer.php') ?>