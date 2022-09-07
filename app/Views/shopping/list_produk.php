<h2>Daftar Produk</h2>
<?php
    foreach ($product as $row) {
?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="kotak">
              <form method="post" action="<?php echo base_url();?>shopping/tambah" method="post" accept-charset="utf-8">
                <a href="#"><img class="img-thumbnail" src="/assets/image/product/<?= $row->image;?>"/></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row->product_name;?></a>
                  </h4>
                  <h5>Rp. <?php echo number_format($row->product_price,0,",",".");?></h5>
                  <p class="card-text"><?php echo $row->deskripsi;?></p>
                </div>
                <div class="card-footer">
                  <a href="<?php echo base_url();?>shopping/detail_produk/<?php echo $row->product_id?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a> 
 
 
                  <input type="hidden" name="id" value="<?php echo $row->product_id; ?>" />
                  <input type="hidden" name="nama" value="<?php echo $row->product_name; ?>" />
                  <input type="hidden" name="harga" value="<?php echo $row->product_price?>" />
                  <input type="hidden" name="gambar" value="<?php echo $row->image; ?>" />
                  <input type="hidden" name="qty" value="1" />
                  <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                </div>
                </form>
              </div>
            </div>
<?php
    }
?>