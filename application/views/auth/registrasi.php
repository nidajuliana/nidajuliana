<style type="text/css">
    body{
        background-image: url('<?= base_url('media/buku.jpg') ?>')
    }
</style>
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
    <form class="splash-container" action="<?= base_url('index.php/auth/registrasi') ?>" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrasi</h3>
                <p>Isi dengan informasi anda</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="nama" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="no_hp" placeholder="No hp">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="password" name="password" placeholder="password">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="<?= base_url('index.php/auth/index') ?>" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>