<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ganti Password</h1>
                                    </div>
                                    <?php echo $this->session->flashdata('message') ?>
                                        <form class="user" action="<?= base_url('auth/changePassword'); ?>" method="post">
                                            <div class="form-group">
                                                <label>Password Baru</label>
                                                <input type="password" class="form-control form-control-user" id="password1" placeholder="Masukan Password..." name="password1" value="">
                                                <?= form_error(
                                                    'password1',
                                                    '<small class="text-danger pl-3">',
                                                    '</small>'
                                                ); ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Ulangi Password Baru</label>
                                                <input type="password" class="form-control form-control-user" id="password2" placeholder="Masukan Ulang Password..." name="password2" value="">
                                                <?= form_error(
                                                    'password2',
                                                    '<small class="text-danger pl-3">',
                                                    '</small>'
                                                ); ?>
                                            </div>
                                        <button type="submit" class="btn btn-primary form-control">Ganti Password</button> 
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</html>