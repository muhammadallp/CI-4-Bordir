    <style>
        table,
        td,
        th{
            border:1px solid #333;
        }
        table{
            width:100%;
            border-collapse:collapse;
        }
        td,th{
            padding:2px;
        }
        img{
            width: 70px;
        }
        th{
            background-color: #ccc;
        }
        <style>
        .line-title{
            border:0;
            border-style: inset;
            border-top: 1px solid #000;
        }
        </style>
    
    
    <title><?= $title; ?></title>

            <center><span style="line-height: 1.6; font-weight: bold; align:center;">
            PUTTI BORDIR
            </span></center>
      
    <!-- <div class="container-fluid px-4"> -->
    <hr class="line-title">
    <span style="line-height: 1.6; font-weight: bold;">
            Laporan penjualan
            </span>
                        <div class="container">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><?= Date('d F Y'); ?></div>
                        </div>
                        <br>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            
                                            <th>Nama produk</th>
                                            <th>tanggal order</th>
                                            <th>nama pemesan</th>
                                            <th>telephone</th>
                                            <th>alamat </th>
                                            <th>jumlah </th>
                                            <th>harga barang</th>
                                            <th>total harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $total_harga= 0;
                                        $grand_total= 0;
                                        $no=0;
                                        foreach($pesanan as $row):
                                        $total_harga=$row->qty *$row->harga;
                                        $grand_total=$grand_total + $total_harga;
                                        $no++;

                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                           
                                            <td><?= $row->product_name;?></td>
                                            <td><?= $row->tanggal; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->telp; ?></td>
                                            <td><?= $row->alamat; ?></td>   
                                            <td><?= $row->qty; ?></td>
                                            <td>Rp. <?= number_format($row->harga,0);?></td>
                                            <td>Rp. <?= number_format($total_harga,0); ?></td>
                                        </tr>
                                        
                                        <?php endforeach; ?>
                                        <tr>
                                        <td colspan="9"><b>Sub Total: Rp <?= number_format($grand_total, 0,",","."); ?></b></td>
                                          </tr>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        