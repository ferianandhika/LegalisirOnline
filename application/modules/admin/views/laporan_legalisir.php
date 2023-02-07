<?php 
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Laporan Legalisir.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
<style>
    table, th, td {
        border: 1px solid;
    }
    td {
        text-align: center;
    }
</style>
<?php if($prodi) : ?>
    <h3 style="text-align: center;">Laporan Legalisir Berdasarkan Prodi <?= $prodi->nama_prodi; ?></h3>
    <?php else : ?>
    <h3 style="text-align: center;">Laporan Legalisir Berdasarkan Tanggal <?= date("d-m-Y", strtotime($tanggal[0])) ?> - <?= date("d-m-Y", strtotime($tanggal[1])) ?></h3>
    <?php endif; ?>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Pengajuan</th>
            <th>Nama Lengkap</th>
            <th>Prodi</th>
            <th>Status Transaksi</th>
            <th>Dokumen</th>
            <th>Status Legalisir</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            foreach ($laporan as $row) :
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=  date("d-m-Y", strtotime($row->created_at)) ?></td>
            <td><?= $row->name; ?></td>
            <td><?= $row->nama_prodi; ?></td>
            <td>
                <?php if($row->status_midtrans == "settlement"): ?>
                    Sudah Dibayar
                <?php elseif($row->status_midtrans == "expire") :?>
                    Expired
                <?php else :?>
                    Pending
                <?php endif; ?>
            </td>
            <td>
                <?php if($row->delivery_status == 0) : ?>
                    Belum Diterima
                <?php else : ?>
                    Sudah Diterima
                <?php endif; ?>
            </td>
            <td> 
                <?php if($row->status == 3) : ?>
                    Selesai
                <?php endif; ?>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>