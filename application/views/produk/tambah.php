<div class="dashboard-wrapper">
    <div class="dashboard-finance">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="mb-2">Produk </h3>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Finance Dashboard Template</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="card">
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
                <div class="card-header d-flex justify-content-between">
                    <h4>Tambah Produk</h4>
                </div>
                <form action="<?= base_url('index.php/tambah-produk')?>" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Kode-Buku">Kode Buku</label>
                            <input class="form-control" type="text" name="kode" value="<?= $kode_buku;?>" readonly></input>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input class="form-control" type="text" name="judul"></input>
                            <?= form_error('judul','<p class="text-danger">','</p>');?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi"></textarea>
                            <?= form_error('deskripsi','<p class="text-danger">','</p>');?>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags Buku</label>
                            <input class="form-control" type="text" name="tags"></input>
                            <?= form_error('tags','<p class="text-danger">','</p>');?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Buku</label>
                            <input class="form-control" type="text" name="harga"></input>
                            <?= form_error('judul','<p class="text-danger">','</p>');?>
                        </div>
                        <div class="form-group">
                            <label for="upload">Upload</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <?php
        $this->load->view('template/textFooter');
    ?>
</div>

<script type="text/javascript">
    $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
</script>