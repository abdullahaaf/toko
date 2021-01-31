<?php
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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

            <?php echo form_open('Category/create');?>
                <div class="card">
                    <div class="card-header">Form Tambah Kategori</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php
                                        echo form_label('Nama Kategori');
                                        $kategori_nama = [
                                            'type'  => 'text',
                                            'name'  => 'kategori_nama',
                                            'id'    => 'kategori_nama',
                                            'value' => set_value('kategori_nama'),
                                            'class' => 'form-control'
                                        ];
                                        echo form_input($kategori_nama);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo base_url('Category'); ?>" class="btn btn-outline-info">Back</a>
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