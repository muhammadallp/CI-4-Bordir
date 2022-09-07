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
            Laporan Produk
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
                                            <th>Nama Product</th>
                                            <th>Harga Product</th>
                                            <th>Kategory</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=0;
                                        foreach($product as $row):
                                      
                                        $no++;

                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                           
                                            <td><?= $row->product_name;?></td>
                                            <td><?= $row->product_price;?></td>
                                            <td><?= $row->category_name;?></td>
                                            <td><?= $row->deskripsi;?></td>
                                        </tr>
                                        
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        