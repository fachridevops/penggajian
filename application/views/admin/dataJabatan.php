
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3" href="<?=  base_url('admin/dataJabatan/tambahData' )?>"><i class="fas fa-plus"></i>Tambah Data</a>
    <?= $this->session->flashdata('pesan') ?>
<table class="table table-bordered table-striped mt-2">
    <tr>
        <th class ="text-center">No</th>
        <th class ="text-center">Nama Jabatan</th>
        <th class ="text-center">Gaji Pokok</th>
        <th class ="text-center">Tj. Struktural</th>
        <th class ="text-center">Tj. Akademik</th>
        <th class ="text-center">Tj. Pendidikan</th>
        <th class ="text-center">Tj. Kesehatan</th>
        <th class ="text-center">Tj. Keselamatan</th>
        <th class ="text-center">Tj. Kehadiran</th>
        <th class ="text-center">Total</th>
        <th class ="text-center">Action</th>
    </tr>

    <?php $no=1; foreach($jabatan as $j) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $j->nama_jabatan ?></td>
            <td>Rp. <?= number_format($j->gaji_pokok,0,',','.') ?></td>
            <td>Rp. <?= number_format($j->tj_struktural,0,',','.') ?></td>
            <td>Rp. <?= number_format($j->tj_akademik,0,',','.') ?></td>
            <td>Rp. <?= number_format($j->tj_pendidikan,0,',','.') ?></td>
            <td>Rp. <?= number_format($j->tj_kesehatan,0,',','.') ?></td>
            <td>Rp. <?= number_format($j->tj_keselamatan,0,',','.') ?></td>
            <td>Rp. <?= number_format($j->tj_kehadiran,0,',','.') ?></td>
            <td>Rp. <?= number_format($j->gaji_pokok + $j->tj_struktural + $j->tj_akademik + $j->tj_pendidikan
            + $j->tj_kesehatan + $j->tj_keselamatan + $j->tj_kehadiran,0,',','.') ?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?=  base_url('admin/dataJabatan/updateData/'. $j->id_jabatan )?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Yakin Untuk Menghapusnya?')" class="btn btn-sm btn-danger" href="<?=  base_url('admin/dataJabatan/deleteData/'. $j->id_jabatan )?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


</div>