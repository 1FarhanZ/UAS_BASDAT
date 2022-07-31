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
                                        <h1 class="h4 text-gray-900 mb-4">Toko Milestyle</h1>
                                    </div>
                                    <?php echo $this->session->flashdata('message') ?>
                                        <form class="user" action="<?= base_url('auth/lupasandi'); ?>" method="post">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control form-control-user" id="email" placeholder="Masukan Email Address..." name="email" value="<?= set_value('name'); ?>">
                                            <?= form_error(
                                                'email',
                                                '<small class="text-danger pl-3">',
                                                '</small>'
                                            ); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary form-control">Reset Password</button> 
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/login') ?>">Kembali ke halaman login</a>
                                    </div>
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