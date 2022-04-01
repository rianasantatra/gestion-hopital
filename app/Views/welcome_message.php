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
            <a href="#" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <div class="tools">
                <div class="dropdown tools-item">
                    <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="/login/logout">Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="dash-content">
            <div class="container-fluid">
                <h1 class="dash-title">Patients</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-in-card table-hover" id="patients">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th>IM</th>
                                    <th>Nom</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#patients').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo site_url('dashboard/search'); ?>',
            order: [],
            columnDefs: [{
                targets: [0, 1, 2, 3],
                orderable: false
            }],
            columns: [{
                    data: ''
                },
                {
                    data: 'im'
                },
                {
                    data: 'username'
                },
                {
                    data: 'action'
                },
            ],
        });
    });
</script>
<?php include('templates/footer.php') ?>