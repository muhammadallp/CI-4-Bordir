<?= $this->extend('layout/template'); ?> 
   
   <?= $this->section('content'); ?>

               
                                <?php 
                                    $session = session();
                                    $error = $session->getFlashdata('error');
                                ?>

<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form class="user" method="POST" action="<?= base_url('auth/valid_register'); ?>">

                                        <?php if($error){ ?>
                                   
                                   <div class="alert alert-danger" role="alert">

                                       <?php foreach($error as $e){ ?>
                                       <li><?php echo $e ?></li>
                                       <?php } ?>
                                       </div>
                                       <?php } ?>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="nama" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="username" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Username</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="nohp" placeholder="name@example.com" />
                                                <label for="inputEmail">Nomor Hanphone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="alamat" placeholder="name@example.com" />
                                                <label for="inputEmail">Alamat</label>
                                            </div> -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" name="confirm" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                <input type="submit" value="Register" class="btn btn-primary btn-block">
                                                    <!-- <a class="btn btn-primary btn-block" type="submit" >Create Account</a></div> -->
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('/auth/login'); ?>">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        

        <?= $this->endSection(); ?>