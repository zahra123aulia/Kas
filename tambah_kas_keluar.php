<?php
if (isset($_POST['keterangan'])) {
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    


    $query = mysqli_query($koneksi, "INSERT INTO kas_keluar (keterangan,tanggal,total) VALUES('$keterangan','$tanggal','$total')");

    if ($query) {
        echo '<script>alert("Daata Berhasil di tambah");location.href="?page=kas_keluar"</script>';
    }
}
?>
<h1 class="h3 mb-3"> Tambah Kas Keluar</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                    <label for="form-label">Keterangan</label>
                        <div class="col-12">
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                    </div>
                    <label for="form-label">Tanggal</label>
                        <div class="col-12">
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <label for="form-label">Total</label>
                        <div class="col-12">
                            <input type="text" name="total" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>