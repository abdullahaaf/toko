<?php
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Produk</h1>
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

        <div class="notification is-danger">
            <?php echo validation_errors(); ?>
        </div>

            <?php echo form_open('Product/create');?>
                <div class="card">
                    <div class="card-header">Form Tambah Produk</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <?php 
                                    echo form_label('Barcode');
                                    $barang_barcode = [
                                        'type'  => 'text',
                                        'name'  => 'barang_barcode',
                                        'id'    => 'barang_barcode',
                                        'value' => set_value('barang_barcode'),
                                        'class' => 'form-control',
                                        'placeholder' => 'Kosongkan jika tidak ada barcode'
                                    ];
                                    echo form_input($barang_barcode); 
                                ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Nama Produk*');
                                        $barang_nama = [
                                            'type'  => 'text',
                                            'name'  => 'barang_nama',
                                            'id'    => 'barang_nama',
                                            'value' => set_value('barang_nama'),
                                            'class' => 'form-control',
                                        ];
                                        echo form_input($barang_nama);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php 
                                        echo form_label('Tipe Produk*', 'Tipe Produk');
                                        echo form_dropdown(
                                            'barang_tipe_barang',
                                            ['' => 'Pilih', 'Konsinasi' => 'Konsinasi', 'Non-konsinasi' => 'Non-konsinasi'], set_value('barang_tipe_barang'), ['class' => 'form-control']
                                        ); 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Kategori','Kategori');
                                        echo form_dropdown(
                                            'barang_kategori_id',
                                            $kategori,
                                            set_value('barang_kategori_id'),
                                            ['class' => 'form-control']
                                        );
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Rak','Rak');
                                        echo form_dropdown(
                                            'barang_rak_id',
                                            $rak,
                                            set_value('barang_rak_id'),
                                            ['class' => 'form-control']
                                        );
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Satuan');
                                        $barang_satuan = [
                                            'type'  => 'text',
                                            'name'  => 'barang_satuan',
                                            'id'    => 'barang_satuan',
                                            'value' => set_value('barang_satuan'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($barang_satuan);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Harga Pokok');
                                        $barang_harpok = [
                                            'type'  => 'number',
                                            'name'  => 'barang_harpok',
                                            'id'    => 'barang_harpok',
                                            'value' => set_value('barang_harpok'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($barang_harpok);
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo form_label('Harga Eceran*');
                                        $barang_harjul = [
                                            'type'  => 'number',
                                            'name'  => 'barang_harjul',
                                            'id'    => 'barang_harjul',
                                            'value' => set_value('barang_harjul'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($barang_harjul);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Harga Grosir');
                                        $barang_harjul_grosir = [
                                            'type'  => 'number',
                                            'name'  => 'barang_harjul_grosir',
                                            'id'    => 'barang_harjul_grosir',
                                            'value' => set_value('barang_harjul_grosir'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($barang_harjul_grosir);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Stok');
                                        $barang_stok = [
                                            'type'  => 'number',
                                            'name'  => 'barang_stok',
                                            'id'    => 'barang_stok',
                                            'value' => set_value('barang_stok'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($barang_stok);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Minimal Stok');
                                        $barang_min_stok = [
                                            'type'  => 'number',
                                            'name'  => 'barang_min_stok',
                                            'id'    => 'barang_min_stok',
                                            'value' => set_value('barang_min_stok'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($barang_min_stok);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                        echo form_label('Kedaluarsa');
                                        $barang_tgl_kedaluarsa = [
                                            'type'  => 'date',
                                            'name'  => 'barang_tgl_kedaluarsa',
                                            'id'    => 'barang_tgl_kedaluarsa',
                                            'value' => set_value('barang_tgl_kedaluarsa'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($barang_tgl_kedaluarsa);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php 
                                        echo form_label('Status*', 'Status');
                                        echo form_dropdown(
                                            'barang_status',
                                            ['' => 'Pilih', '1' => 'Active', '0' => 'Inactive'], set_value('barang_status'), ['class' => 'form-control']
                                        ); 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo base_url('Product'); ?>" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>

</div>

<?php
    $this->load->view('_partials/footer');
?>