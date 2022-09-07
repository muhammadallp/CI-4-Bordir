
 <?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan');
        
       ?>
<?= $this->extend('pages/template'); ?> 

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Proses Order sukses</h2>
                        <div class="card mb-4">
                            <div class="card-body">
                            Terima kasih sudah berbelanja di toko Putti Bordir Order anda sudah masuk ke database kami, dan dalam 3 x 24 Jam barang akan sampai di tempat anda.<br>
                            Jangan segan mengontak kami jika ada permasalahan!  
                            </div>
                        </div>
            </div>
        </main>

<?= $this->endSection(); ?>