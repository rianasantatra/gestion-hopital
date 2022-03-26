<?php include('templates/header.php') ?>

    <div class="form-screen">
        <a href="#" class="spur-logo"><i class="fas fa-briefcase-medical"></i> <span>Hopital</span></a>
        <div class="card account-dialog">
            <div class="card-header bg-primary text-white text-center"> Authentification </div>
            <div class="card-body">
            <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
                <form action="/login/auth" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Immatriculation</label>
                        <input type="text" name="im" class="form-control" id="im" value="<?= set_value('im') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" value="<?= set_value('password') ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

<?php include('templates/footer.php') ?>