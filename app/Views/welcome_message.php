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
                        <table class="table table-in-card" id="patients">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>#</th>
                                    <th class="hidden">ID</th>
                                    <th>IM</th>
                                    <th>Nom</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<div class="modal fade" id="updateModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><span class="fas fa-info-circle"></span> Informations</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('dashboard/update'); ?>" method="POST" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">IM</label>
                            <div class="col-md-9">
                                <input id="im" name="im" placeholder="Immatriculation" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nom</label>
                            <div class="col-md-9">
                                <input id="username" name="username" placeholder="Nom" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var save_method;

    $(document).ready(function() {
        $('#patients').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo site_url('dashboard/list'); ?>',
            columnDefs: [{
                targets: [0, 1, 2, 3, 4],
                orderable: false,
            }],
            columns: [{
                    data: ''
                },
                {
                    data: 'id',
                    'visible': false
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

    $('body').on('click', '.btnedit', function() {
        var user_id = $(this).attr('id');
        $.ajax({
            url: 'dashboard/edit/' + user_id,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                $('#updateModal #user_id').val(res.data.id);
                $('#updateModal #im').val(res.data.im);
                $('#updateModal #username').val(res.data.username);
                $('#updateModal').modal('show');
            },
            error: function(data) {}
        });
    });
</script>
<?php include('templates/footer.php') ?>