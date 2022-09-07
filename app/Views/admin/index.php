<?= $this->extend('pages/templateadmin'); ?> 
   
   <?= $this->section('content'); ?>


   



             <!-- slider -->
                        
            <!-- <div id="layoutSidenav_nav"> 
            </div> -->
            <div id="layoutSidenav_content">
            <main>  
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><i class="fa fa-users" aria-hidden="true"></i>User</div>
                                    <div class="container">
                                  <?= $total_user; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('admin/datauser'); ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Pesanan</div>
                                    <div class="container">
                                  <?= $total_pesanan; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('admin/pesanan'); ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><i class="fa fa-check-square" aria-hidden="true"></i>Produk</div>
                                    <div class="container">
                                  <?= $total_product; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('product/'); ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body"><i class="fa fa-credit-card" aria-hidden="true"></i>Pembayaran</div>
                                    <div class="container">
                                    <?= $total_pembayaran; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('metodepembayaran/'); ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
       
       
        <?= $this->endSection(); ?>