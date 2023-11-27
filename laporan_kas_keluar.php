<?php
if (isset($_POST['tanggalAwal'])) {
    $tanggalAwal = $_POST['tanggalAwal'];
    $tanggalAkhir = $_POST['tanggalAkhir'];
}
?>

<h1 class="h3 mb-3">Laporan Kas Keluar</h1>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="mb-3">
                                <label for="tanggalAwal">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="mb-3">
                                <label for="tanggalAkhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir">
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 3%;">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" id="btnCetak">Cari</button>
                                <button type="reset" onclick="location.href='?page=laporan_kas_keluar'" class="btn btn btn-primary"><i class="fa fa-retweet" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover" id="kas_keluar">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['tanggalAwal'])) {
                            $tanggal_awal = $_POST['tanggalAwal'];
                            $tanggal_akhir = $_POST['tanggalAkhir'];
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM kas_keluar WHERE (DATE(tanggal) BETWEEN '$tanggal_awal' AND '$tanggal_akhir')");
                            while ($data = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $data['keterangan'] ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                        <td><?php echo $data['total'] ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
              <div class="text-center">
                    <?php
                    if (!empty($_POST['tanggalAwal'])) {
                        ?>
                        <a href="cetak_kas_keluar.php?tanggalAwal=<?php echo $tanggalAwal ?>&tanggalAkhir=<?php echo $tanggalAkhir ?>" class="btn btn-success btn-sm mb-3" target="_blank">Print</a>
                        <?php
                     }else{
                     }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let table = new DataTable('#kas_keluar');
</script> 