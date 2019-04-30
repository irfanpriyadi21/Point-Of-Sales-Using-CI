<html lang="en" moznomarginboxes mozdisallowselectionprint>
        <head>
            <title>Faktur Penjualan</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="<?= base_url('assets/css/laporan.css')?>"/>
        </head>
        <body onload="window.print()">
        <div id="laporan">
        <table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

        </table>

        <table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
        <tr>
            
        </tr>
                            
        </table>
        </br>
        </br>
        <table border="1" align="center" style="width:700px;margin-bottom:20px;">
        <thead>     
                    <tr>
                        <th>No</th>
                        <th>Id Order</th>
                        <th>Nama User</th>
                        <th>Tanggal</th>
                        <th>Total Bayar</th>
                        <th>Jumlah</th>
                        <th>Kembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $b=1;$total = 0;
                    foreach ($transaksi as $tampil):
                    $total = $total + $tampil['jumlah'];
                    ?>
                    <tr>
                        <td><?= $b++; ?></td>
                        <td><?= $tampil['id_order'] ?></td>
                        <td><?= $tampil['nama_user'] ?></td>
                        <td><?= $tampil['tanggal'] ?></td>
                        <td>Rp.<?= number_format($tampil['total_bayar']) ?></td>
                        <td>Rp.<?= number_format($tampil['jumlah']) ?></td>
                        <td>Rp.<?= number_format($tampil['kembalian']) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot> 
                    <td colspan="5">Total Keuntungan</td>
                    <td colspan="2">Rp.<?= number_format($total);?></td>
                </tfoot>
        </table>

        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Bogor, <?php echo date('d-M-Y')?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>
        
            <tr>
            <td><br/><br/><br/><br/></td>
            </tr>    
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br/><br/></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
        </div>
        </body>
        </html>