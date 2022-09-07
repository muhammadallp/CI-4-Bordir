       <?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan'); 
       ?>
<?= $this->extend('pages/template'); ?> 
<?= $this->section('content'); ?>
      <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
              <h2 class="mt-4"></h2>
                <?php if($pesan){ ?>
                <?php echo $pesan?></p>
                <?php } ?>
                <form action="/shopping/ubah_cart/" method="post" enctype="multipart/form-data">
                  <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-shopping-cart"></i>
                            Keranjang Belanja
                    </div>
                    <div class="card-body">
                  <?php
                    if ($cart = $cart->contents())
                      {
                  ?>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Gambar</th>
                          <th scope="col">Item</th>
                          <th scope="col">Harga</th>
                          <th scope="col" width="80px">Qty</th>
                          <th scope="col">Jumlah</th>
                          <th scope="col">Hapus</th>                          
                        </tr>
                      </thead>
                          <tbody>
                            <?php
                            $grand_total = 0;
                            $i = 1;
                            foreach ($cart as $item):
                            $grand_total = $grand_total + $item['subtotal'];
                            ?>
                            <input type="hidden" name="cart[<?= $item['id'];?>][id]" value="<?= $item['id'];?>" />
                            <input type="hidden" name="cart[<?= $item['id'];?>][rowid]" value="<?= $item['rowid'];?>" />
                            <input type="hidden" name="cart[<?= $item['id'];?>][name]" value="<?= $item['name'];?>" />
                            <input type="hidden" name="cart[<?= $item['id'];?>][price]" value="<?= $item['price'];?>" />
                            <input type="hidden" name="cart[<?= $item['id'];?>][image]" value="<?= $item['image'];?>" />
                            <input type="hidden" name="cart[<?= $item['id'];?>][qty]" value="<?= $item['qty'];?>" />  
                            <tr>
                            <td><?= $i++; ?></td>
                            <td><img class="img" src="<?= base_url() . '/assets/image/product/'.$item['image']; ?>"/></td>
                            <td><?= $item['name']; ?></td>
                            <td><?= number_format($item['price'], 0,",","."); ?></td>
                            <td><input type="number" min="1" class="form-control" name="cart[<?php echo $item['id'];?>][qty]" value="<?= $item['qty'];?>"></td>
                            <td><?= number_format($item['subtotal'], 0,",",".") ?></td>
                            <td><a href="/shopping/hapus/<?= $item['rowid'];?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a></td>
                            <?php endforeach; ?>
                            </tr>
                            <tr>
                            <td colspan="3"><b>Order Total: Rp <?= number_format($grand_total, 0,",","."); ?></b></td>
                            <td colspan="4" align="right">
                            <a href="/shopping/clear"  class ='btn btn-sm btn-danger'>Kosongkan Cart</a>
                            <button class='btn btn-sm btn-success'  type="submit">Update Cart</button>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Check Out
                            </button>   
                            </tr>
                    </table>
                      <?php
                        }
                         else
                         {
                          echo "<h3>Keranjang Belanja masih kosong</h3>";	
                          }	
                          ?>
                    </div>
                  </div>
                  </form>
                </div>
        </main>
      

       <!-- Modal Save -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Check Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  
      <form class="form-horizontal" action="/shopping/proses_order" method="post" name="frmCO" id="frmCO">
                <?= csrf_field(); ?>
           <div class="form-floating mb-3">
                <input type="text" class="form-control " name="nama" placeholder="name@example.com" autofocus required/>
                <label for="nama" >Nama</label>
                <div class="invalid-feedback">
                    
                </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="alamat" placeholder="name@example.com" required/>
                    <label for="latitude">Alamat </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="telp" placeholder="name@example.com" required/>
                    <label for="latitude">Telephone </label>
                </div>
                
              
                <div class="form-floating mb-4">
                 <select class="form-select" name="bank" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Open this select menu</option>
                        <?php foreach($pembayaran as $row):?>
                        <option value="<?= $row->id_pem;?>"><?= $row->nama_bank;?></option>
                        <?php endforeach;?>
                    </select>
                    <label for="floatingSelect">Pembayaran dana</label>
                </div>
               
                <?php
                $grand_total = 0;
                    foreach ($cart as $item)
                      {
                        $grand_total = $grand_total + $item['subtotal'];
                      }
                    echo "<h4>Total Belanja: Rp.".number_format($grand_total,0,",",".")."</h4>";	
                ?>
           </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
      
    




        
        

<?= $this->endSection(); ?>
