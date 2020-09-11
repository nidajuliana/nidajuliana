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
                    <h4>Tabel Produk</h4>
                    <a href="<?= base_url('index.php/tambah-produk')?>" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table table=striped" style="width: 100%;text-align: center">
                        <thead>
                            <tr>
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tags</th>
                                <th>Harga</th>
                                <th>Foto Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $r) : ?>
                            <tr>
                                <td><?= $r['kode_buku'];?></td>
                                <td><?= $r['judul_buku'];?></td>
                                <td><?= $r['deskripsi'];?></td>
                                <td><?= $r['tags'];?></td>
                                <td><?= $r['harga'];?></td>
                                <td><img src="<?= base_url('media/file/'. $r['foto_produk']);?>" style="width:10%;"></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="<?= base_url('index.php/edit-produk/'.$r['id']);?>" class="btn btn-success mr-2">Edit</a>
                                        <a href="<?= base_url('index.php/delete-produk/'.$r['id']);?>" class="btn btn-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <?php
        $this->load->view('template/textFooter');
    ?>
</div>