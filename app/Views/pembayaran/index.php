

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
                    <h1 class="mt-4 ">Tables</h1>
                    <?php if($pesan){ ?>
                         <?php echo $pesan?></p>
                        <?php } ?>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tabah Data
                    </button>                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user fa-fw"></i>
                                Pembayaran Data Table
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nama Rekening</th>
                                            <th>Nomor Rekening</th>
                                            <th>Nama Bank</th>
                                         
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($pembayaran as $p): ?>
                                        <tr>
                                            <td><?= $p['nama_req']; ?></td>
                                            <td><?= $p['no_req']; ?></td>
                                            <td><?= $p['nama_bank'] ?></td>
                                            <td>
                                                <div class="container">
                                                <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#edit<?= $p['id_pem']; ?> ">
                                                <i class="far fa-edit"></i>
                                                </button>   
                                                 <a class="btn btn-danger"  onclick="return confirm('Apakah Anda Yakin?')" href="delete/<?= $p['id_pem']; ?>"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                                </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
               

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" action="/metodepembayaran/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                <input type="text" class="form-control " id="nama_req" name="nama_req" placeholder="name@example.com" autofocus required/>
                <label for="nama" >Nama Rekening</label>
                <div class="invalid-feedback">
                    
                </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="no_req" name="no_req" placeholder="name@example.com" required/>
                    <label for="latitude">Nomor Rekening</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="name@example.com" required/>
                    <label for="longitude">Nama Bank</label>
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
        



<!-- modal edit -->
<?php $no=0; ?>
<?php foreach($pembayaran as $p): ?>
  
<div class="modal fade" id="edit<?= $p['id_pem']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
        
      <form  action="/metodepembayaran/edit/<?= $p['id_pem']; ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                <input type="text" value="<?= $p['nama_req']; ?>" class="form-control " id="nama_req" name="nama_req" placeholder="name@example.com">
                <label for="nama" >Nama Rekening</label>
                <div class="invalid-feedback">
                    
                </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text"  value="<?= $p['no_req']; ?>" class="form-control" id="no_req" name="no_req" placeholder="name@example.com" >
                    <label for="latitude">Nomor Rekening</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text"  value="<?= $p['nama_bank']; ?>" class="form-control" id="nama_req" name="nama_bank" placeholder="name@example.com">
                    <label for="longitude">Nama Bank</label>
                </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update changes</button>
      </div>
    </div>
  </div>
</div>
  </form>
<?php endforeach; ?>
<!-- akhir modal Edit -->
          <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"><?= Date('d F Y'); ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        

<?= $this->endSection(); ?>
