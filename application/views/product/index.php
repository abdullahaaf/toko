<?php
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Products</h1>
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
                    <div class="card">
                        <div class="card-header">
                            Daftar Produk
                            <a href="<?php echo base_url('Product/new'); ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered" id="table-produk">
                                    <thead>
                                        <tr>
                                            <th width="10px" class="text-center">No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Tipe</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $nomor = 0;
                                            foreach($data_barang->result_array() as $row){ 
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$nomor; ?></td>
                                            <td><?php echo $row['barang_nama']; ?></td>
                                            <td><?php echo $row['kategori_nama']; ?></td>
                                            <td><?php echo $row['barang_tipe_barang']; ?></td>
                                            <td><?php echo $row['barang_satuan']; ?></td>
                                            <td><?php echo "Rp. ".number_format($row['barang_harjul']); ?></td>
                                            <td>
                                                <?php if ($row['barang_status'] == 1) {
                                                    echo "Active";
                                                }else{
                                                    echo "InActive";
                                                } 
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('Product/show/'.$row['barang_id']); ?>" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('Product/edit/'.$row['barang_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('Product/delete/'.$row['barang_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
    $this->load->view('_partials/footer');
?>

<script>
    $('#table-produk').DataTable({
        "lengthMenu": [ 5, 25, 50, 75, 100 ]
    });
</script>