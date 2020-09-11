<style type="text/css">
    body{
        background-image: url('<?= base_url('media/book.jpg') ?>')
    }
</style>
    <div class="splash-container">
        <?php if($this->session->flashdata('message')) : ?>
            <script>

                <?= $this->session->flashdata('message');?>

                function message(icon, title){
                    var message = Swal.fire({
                        icon: icon,
                        title: title,
                        showConfirmButton: true,
                        confirmButtonColor: '#FFD6AC',
                    });

                    return message;
                }
            </script>
        <?php endif;?>
        <div class="card ">
            <div class="card-body">
            <h3 class="mb-1">TOPEL</h3>
                <p>Silahkan Login</p>
                <form action="<?= base_url('index.php/auth/index') ?>" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="email" type="text" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="<?= base_url('index.php/auth/registrasi') ?>" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Lupa Password</a>
                </div>
            </div>
        </div>
    </div>