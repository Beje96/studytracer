<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Panitia Tracer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- alert -->
        <?php
        if ($this->session->flashdata('msg')) {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('msg')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
        }
        ?>

      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Panitia Tracer</h3>
                <span class="float-right">
                    <a  class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#modal_tambah"><i class="fa fa-plus"></i> Tambah</a>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>L/P</th>
                      <th>Phone</th>
                      <th>E-mail</th>
                      <th>Username</th>
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
                      <td><?= $alumni->telp ?></td>
                      <td><?= $alumni->email ?></td>
                      <td><?= $alumni->username ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_view<?= $alumni->id ?>"><i class="fa fa-eye"></i></a>
                          <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?= $alumni->id ?>"><i class="fa fa-edit"></i></a>
                          <a href="<?= base_url('backend/datapanitia/delete/'.$alumni->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingini menghapus data tersebut ?')"><i class="fa fa-trash"></i></a>
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
  <?php foreach ($alumni2 as $alumni) {
?>
  <div class="modal fade" id="modal_view<?= $alumni->id ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Panitia</h4>
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
              <td width="15%"><strong>Nama : </strong></td>
              <td><?= $alumni->nama_depan.' '.$alumni->nama_belakang ?></td>
            </tr>
            <tr>
            <td><strong>P/L :</strong></td>
            <td><?= $alumni->jenis_kelamin ?></td>
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
            <td><strong>Username :</strong></td>
            <td><?= $alumni->username ?></td>
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
  <?php foreach ($alumni2 as $alumni) {
?>
  <div class="modal fade" id="modal_edit<?= $alumni->id ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Panitia</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?=base_url('backend/datapanitia/update/'.$alumni->id)?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan" value="<?= $alumni->nama_depan ?>">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang" value="<?= $alumni->nama_belakang ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">L/P</label>
                    <select name="jenis_kelamin" class="form-control">
                        <?php if($alumni->jenis_kelamin=="L"): ?>
                        <option value="L" selected>L</option>
                        <option value="P">P</option>
                        <?php else: ?>
                        <option value="P" selected>P</option>
                        <option value="L">L</option>
                        <?php endif ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Phone</label>
                    <input type="text" class="form-control" name="telp" value="<?= $alumni->telp ?>">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">E-mail</label>
                    <input type="text" class="form-control" name="email" value="<?= $alumni->email ?>">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $alumni->alamat ?>">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $alumni->username ?>">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Foto</label>
                    <input type="file" class="form-control" name="new_foto" >
                    <input type="text" class="form-control" name="old_foto" value="<?= $alumni->foto?>" hidden>
                    
                </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Edit</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php
}
?>
  <!-- /.modal -->

  <div class="modal fade" id="modal_tambah" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?=base_url('backend/datapanitia/tambah')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">L/P</label>
                    <select name="jenis_kelamin" class="form-control">
                       <option selected>Pilih</option>
                       <option value="L">L</option>
                       <option value="P">P</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Phone</label>
                    <input type="text" class="form-control" name="telp" >
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">E-mail</label>
                    <input type="text" class="form-control" name="email" >
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Foto</label>
                    <input type="file" class="form-control" name="foto" >
                </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Tambah</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>