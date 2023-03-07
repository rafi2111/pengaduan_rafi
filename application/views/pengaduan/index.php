     <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3>Management Data Pengaduan</h3>

        <div class="row">
            <div class="col-lg-12">

                <div class="alert alert-warning">
                    <strong>Note : </strong> Jika anda menghapus data pengaduan maka data tanggapan dengan ID yang sama juga akan terhapus
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="myTable">
                            <thead class="table-info">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Foto Bukti</th>
                                    <th>Nama Pelapor</th>
                                    <th>Isi Pengaduan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($pengaduan as $p){ ?>
                            <strong>
                                <tr>
                                    <td><?= date('d M Y H:i:s', $p->id_pengaduan); ?></td>
                                    <td><img src="<?= base_url('asset/upload/') . $p->foto; ?>" width="200px"></td>
                                    <td><?= $p->nama; ?></td>
                                    <td><?= $p->isi_laporan; ?></td>
                                    <td>
                                        <?php if($p->status == 1): ?>
                                            Selesai
                                        <?php endif; ?>
                                        <?php if($p->status == 2): ?>
                                            Ditolak
                                        <?php endif; ?>
                                        <?php if($p->status == 3): ?>
                                            Diproses
                                        <?php endif; ?>
                                        <?php if($p->status == 0): ?>
                                            Menunggu
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('pengaduan/del_pengaduan/') . $p->id_pengaduan; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>
                                        <a href="<?= base_url('pengaduan/detail/') . md5($p->id_pengaduan); ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i></a>
                                    </td>
                                </tr>
                                </strong>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->