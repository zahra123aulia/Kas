<?php
include 'koneksi.php';
?>

<script>
	window.print();
</script>



<table border=1 cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th colspan="8">Kas Masuk</th>
	</tr>
		<tr>
            <th>NO</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>
            </thead>
        <tbody>
                <?php
                        if (isset($_GET['tanggalAwal'])) {
                            $tanggal_awal = $_GET['tanggalAwal'];
                            $tanggal_akhir = $_GET['tanggalAkhir'];
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM kas_masuk WHERE (DATE(tanggal) BETWEEN '$tanggal_awal' AND '$tanggal_akhir')");
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