<?php
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="timeline">
                    <?php foreach ($barang->result_array() as $barang) { ?>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Nama Produk</b></h3>
                                <div class="timeline-body">
                                    <?php echo $barang['barang_nama'];?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Tipe Produk</b></h3>
                                <div class="timeline-body">
                                    <?php echo $barang['barang_tipe_barang'];?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Satuan</b></h3>
                                <div class="timeline-body">
                                    <?php echo $barang['barang_satuan'];?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Harga Pokok</b></h3>
                                <div class="timeline-body">
                                    <?php echo "Rp. ".number_format($barang['barang_harpok']); ?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Harga Jual</b></h3>
                                <div class="timeline-body">
                                    <?php echo "Rp. ".number_format($barang['barang_harjul']); ?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Stok saat ini</b></h3>
                                <div class="timeline-body">
                                    <?php echo $barang['barang_stok'];?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Stok minimal</b></h3>
                                <div class="timeline-body">
                                    <?php echo $barang['barang_min_stok'];?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><b>Kedaluarsa</b></h3>
                                <div class="timeline-body">
                                    <?php echo $barang['barang_tgl_kedaluarsa'];?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-tags bg-green"></i>
                        </div>
                    <?php } ?>
                    </div>
                    <a href="<?php echo base_url('Product'); ?>" class="btn btn-outline-info">Back</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
    $this->load->view('_partials/footer');
?>