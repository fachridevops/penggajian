<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
        <form method="POST" action="<?= base_url('admin/dataJabatan/tambahDataAksi') ?>">
        
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control">
            <?= form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>
        </div>

        <div class="form-group">
            <label>Gaji Pokok</label>
            <input type="text" name="gaji_pokok" class="form-control">
            <?= form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>
        </div>
            <div class="form-group">
            <label>Tunjangan Struktural</label>
            <input type="text" name="tj_struktural" class="form-control">
            <?= form_error('tj_struktural','<div class="text-small text-danger"></div>') ?>
        </div>
        <div class="form-group">
            <label>Tunjangan Akademik</label>
            <input type="text" name="tj_akademik" class="form-control">
            <?= form_error('tj_akademik','<div class="text-small text-danger"></div>') ?>
        </div>
        <div class="form-group">
            <label>Tunjangan Pendidikan</label>
            <input type="text" name="tj_pendidikan" class="form-control">
            <?= form_error('tj_pendidikan','<div class="text-small text-danger"></div>') ?>
        </div>
        <div class="form-group">
            <label>Tunjangan Kesehatan</label>
            <input type="text" name="tj_kesehatan" class="form-control">
            <?= form_error('tj_kesehatan','<div class="text-small text-danger"></div>') ?>
        </div>
        <div class="form-group">
            <label>Tunjangan Keselamatan</label>
            <input type="text" name="tj_keselamatan" class="form-control">
            <?= form_error('tj_keselamatan','<div class="text-small text-danger"></div>') ?>
        </div>
        <div class="form-group">
            <label>Tunjangan Kehadiran</label>
            <input type="text" name="tj_kehadiran" class="form-control">
            <?= form_error('tj_kehadiran','<div class="text-small text-danger"></div>') ?>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>

        </form>
        </div>
    </div>


</div>