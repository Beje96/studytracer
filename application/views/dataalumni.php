<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data alumni</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    if ($this->session->flashdata('msg')) {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('msg')?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data alumni</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>L/P</th>
                      <th>Tahun Lulus</th>
                      <th>Phone</th>
                      <th>Angkatan</th>
                      <th>Bidang Pekerjaan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    
                    foreach($alumni as $alumni):
                      ?>
                    <tr>
                        <td><?= $no; ?></td>
                      <td><?= $alumni->nama_depan ?></td>
                      <td><?= $alumni->jenis_kelamin ?></td>
                      <td><?= $alumni->tahun_lulus ?></td>
                      <td><?= $alumni->telp ?></td>
                      <td><?= $alumni->angkatan ?></td>
                      <td><?= $alumni->bidang_pekerjaan ?></td>
                      <td>
                      <?php
                      if ($alumni->status =="nonaktif" ) {
                        echo "<span class='badge badge-danger'>";
                      }else{
                        echo "<span class='badge badge-success'>";
                      }
                      echo $alumni->status;
                      ?></span>
                      </td>
                   
                      <td>
                          <?php 
                          if ($alumni->status=="nonaktif") {
                          ?>
                          <a href="<?= base_url('backend/dataalumni/editstatus/'.$alumni->id.'/aktif'); ?> " class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                          <?php
                          }
                          else {
                            ?>
                            <a href="<?= base_url('backend/dataalumni/editstatus/'.$alumni->id.'/nonaktif'); ?> " class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                            <?php
                          }
                          ?>
                          <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_view<?= $alumni->id ?>"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                    <?php $no++; endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.modal -->
<?php foreach ($alumni2 as $alumni) {
?>
  <div class="modal fade" id="modal_view<?= $alumni->id ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Alumni</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td width="35%" rowspan="11">
                <img src="<?= base_url('assets/user/'.$alumni->foto) ?>" alt="<?= $alumni->foto ?>" class="img-thumbnail">
              </td>
              <td width="22%"><strong>Nama : </strong></td>
              <td><?= $alumni->nama_depan.' '.$alumni->nama_belakang ?></td>
            </tr>
            <tr>
            <td><strong>P/L :</strong></td>
            <td><?= $alumni->jenis_kelamin ?></td>
            </tr>
            <td><strong>T Lahir :</strong></td>
            <td><?= $alumni->tgl_lahir ?></td>
            </tr>
            <td><strong>HP :</strong></td>
            <td><?= $alumni->telp ?></td>
            </tr>
            <td><strong>E-mail :</strong></td>
            <td><?= $alumni->email ?></td>
            </tr>
            <td><strong>Alamat :</strong></td>
            <td><?= $alumni->alamat ?></td>
            </tr>
            <td><strong>Tahun lulus :</strong></td>
            <td><?= $alumni->tahun_lulus ?></td>
            </tr>
            <td><strong>Angkatan :</strong></td>
            <td><?= $alumni->angkatan ?></td>
            </tr>
            <td><strong>Pekerjaan :</strong></td>
            <td><?= $alumni->pekerjaan ?></td>
            </tr>
            <td><strong>Kota :</strong></td>
            <td><?= $alumni->kota ?></td>
            </tr>
            <td><strong>Bidang Pekerjaan :</strong></td>
            <td><?= $alumni->bidang_pekerjaan ?></td>
            </tr>
          </table>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php
}
?>
  <!-- /.modal -->