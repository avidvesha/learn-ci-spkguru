<div class="page-header">
    <h1>Halaman Olah Kriteria</h1>
</div>

<div class="col-lg-12">
    
    <!-- <?php
    $msg = $this->session->flashdata('message');
    if (isset($msg)) {
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
                                    <th class="col-md-3">Kriteria</th>
                                    <th class="col-md-2 ">Sifat</th>
                                    <th class="col-md-2 ">Bobot</th>
                                    <th class="col-md-5 ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    if (isset($criteria)) {
                                        if(count($criteria) == 0){
                                            echo '<tr><td colspan="3" class="text-center"><h3>No Data Input</h3></td></tr>';
                                        }
                                        foreach ($criteria as $item) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $item->kriteria ?></td>
                                                <td><?php echo $item->sifat ?></td>
                                                <td><?php echo $item->bobot ?></td>
                                                <td>
            
                                                    <!-- Contextual button for informational alert messages -->
                                                    <button type="button" class="btn btn-info btn-xs"
                                                            onclick="lihat_kriteria(<?php echo $item->kdKriteria; ?>)">
                                                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Lihat
                                                    </button>
            
                                                    <!-- Indicates caution should be taken with this action -->
                                                    <button type="button" class="btn btn-warning btn-xs"
                                                            onclick="edit_kriteria(<?php echo $item->kdKriteria; ?>)">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah Kriteria
                                                    </button>
                                                    <!-- Indicates a dangerous or potentially negative action -->
                                                    <button type="button" data-toggle="modal" class="btn btn-danger btn-xs"
                                                            data-target="#modalDelete">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus
                                                    </button>
            
                                                </td>
                                            </tr>
                                        <?php } 
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
            href="<?php echo site_url('kriteria/tambah') ?>" 
            type="button" 
            class="btn btn-primary">
                Tambah Kriteria
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
                <button 
                type="button" 
                class="btn btn-danger"
                onclick="hapus_guru(<?php echo $item->kdGuru; ?>)">
                    Hapus
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
