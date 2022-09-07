

       <?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan');
        
       ?>
<?= $this->extend('pages/templateadmin'); ?> 

<?= $this->section('content'); ?>


<link rel="stylesheet" href="<?= base_url('assets/css/css.css'); ?>">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <input type="button" class="btn btn-primary mb-3" value="Print PDF" onclick="window.open('<?= site_url('admin/printpdf')?>','blank')">

                        <?php if($pesan){ ?>
                         <?php echo $pesan?></p>
                        <?php } ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user fa-fw"></i>
                                Pesanan Data Table
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>product</th>
                                            <th>Nama product</th>
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
                                        foreach($pesanan as $row):
                                        $total_harga=$row->qty *$row->harga;
                                        $grand_total=$grand_total + $total_harga;

                                        ?>
                                        <tr>
                                            <td><img src="/assets/image/product/<?= $row->image;?>" class="img"></td>
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

                    </div>
                </main>
           

        
        

<?= $this->endSection(); ?>
