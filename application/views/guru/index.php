<div class="page-header">
    <h1>Halaman Kandidat Guru</h1>
</div>

<div class="col-lg-12">
    
    <!-- <?php
    $msg = $this->session->flashdata('message');
    if ($msg) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $msg; ?>
        </div>
        <?php
    }
    ?> -->

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">List Kandidat Guru</div>
                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-6">Guru</th>
                                    <th class="col-md-5">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    if (isset($teacher)) {
                                        if(count($teacher) == 0){
                                            echo '<tr><td colspan="3" class="text-center"><h3>No Data Input</h3></td></tr>';
                                        }
                                        foreach ($teacher as $item) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $item->guru ?></td>
                                                <td>
                                                    <a 
                                                    class="btn btn-primary btn-xs"
                                                    href="<?php echo site_url('guru/ubah/' . $item->kdGuru) ?>"
                                                    role="button">
                                                        <span 
                                                        class="glyphicon glyphicon-edit" 
                                                        aria-hidden="true"></span> 
                                                            Ubah
                                                    </a>

                                                    <a 
                                                    class="btn btn-danger btn-xs"
                                                    href="<?php echo site_url('guru/hapus/' . $item->kdGuru) ?>"
                                                    role="button"
                                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                                        <span 
                                                        class="glyphicon glyphicon-edit" 
                                                        aria-hidden="true"></span> 
                                                            Hapus
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <a 
            href="<?php echo site_url('guru/tambah') ?>" 
            type="button" 
            class="btn btn-primary">
                Tambah Guru
            </a>
        </div>
    </div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                type="button" 
                class="close" 
                data-dismiss="modal" 
                aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Konfirmasi hapus data</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin menghapus data ini? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a 
                class="btn btn-danger"
                href="<?php echo site_url('guru/hapus/' . $item->kdGuru) ?>"
                role="button">
                    <span 
                    class="glyphicon glyphicon-edit" 
                    aria-hidden="true"></span> 
                        Hapus
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
