
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
            Input Absensi Pegawai
            </div>
        <div class="card-body">
            
    <form class="form-inline">
        <div class="form-group mb-2">
            <label for="staticEmail2">Bulan: </label>
           <select class="form-control ml-2" name="bulan">
                <option value="">--Pilih Bulan--</option>
                <option value="01">Janurai</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
           </select>
        </div>
        <div class="form-group mb-2 ml-5">
            <label for="staticEmail2">Tahun: </label>
           <select class="form-control ml-2" name="tahun">
                <option value="">--Pilih Tahun--</option>
                <?php $tahun = date('Y'); 
                for($i=2020;$i<$tahun+5;$i++) {?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php } ?>
           </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate Data</button>
</form>
        </div>
    </div>
    <?php
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    ?>

    <div class="alert alert-info">Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold">
        <?= $bulan ?> </span>
        Tahun: <span class="font-weight-bold">
        <?= $tahun ?> </span></div>
</div>
<form method="POST">


<button class="btn btn-success mb-3 ml-4" type="submit" name="submit" value="submit">Simpan</button>

<table class="table table-bordered table-striped">
    <tr>
        <td class="text-center">No</td>
        <td class="text-center">NPP</td>
        <td class="text-center">Nama Pegawai</td>
        <td class="text-center">Jenis Kelamin</td>
        <td class="text-center">Jabatan</td>
        <td class="text-center">Jenis Pegawai</td>
        <td class="text-center" width="8%">Jumlah Hadir</td>
        <td class="text-center" width="8%">Jumlah Sakit</td>
        <td class="text-center" width="8%">Jumlah Alpha</td>
    </tr>
    <?php $no=1; foreach($input_absensi as $a) : ?>
        <tr>
            <input type="hidden" name="bulan[]" class="form-control" value="<?= $bulantahun ?>">
            <input type="hidden" name="npp[]" class="form-control" value="<?= $a->npp ?>">
            <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?= $a->nama_pegawai ?>">
            <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?= $a->jenis_kelamin ?>">
            <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?= $a->nama_jabatan ?>">
            <input type="hidden" name="jenis_pegawai[]" class="form-control" value="<?= $a->jenis_pegawai ?>">

            <td><?= $no++ ?></td>
            <td><?= $a->npp ?></td>
            <td><?= $a->nama_pegawai ?></td>
            <td><?= $a->jenis_kelamin ?></td>
            <td><?= $a->nama_jabatan ?></td>
            <td><?= $a->jenis_pegawai ?></td>
            <td><input type="number" name="" class="form-control" value="0"></td>
            <td><input type="number" name="" class="form-control" value="0"></td>
            <td><input type="number" name="" class="form-control" value="0"></td>
        </tr>
    <?php endforeach; ?>

</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</form>


</div>