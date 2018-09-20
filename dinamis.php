 <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>

                <form action="action" onsubmit="dummy();
                return false">
            <div class="form-group">
                <label for="varchar">Kode Barang</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="kode_barcode[0]" id="kode_barcode" placeholder="Kode Barang" readonly="" />
                    </div>
                     <div class="col-md-1">
                        <button type="button" class="btn btn-default" data-toggle="modal"  data-target="#modal-default">. . .</button>
                    </div>
                     <div class="col-md-4">
                        <input type="text" class="form-control" name="nama_barang[0]" id="nama_barang" placeholder="Nama Barang" readonly="" />
                    </div>
                   
                </div>
            </div>
 
        </form>
            </div>

            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
<!-- /.box-header -->
  <div class="box-body">
    <table id="lookup" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("select * from tb_barang");
        while($data=$sql->fetch_assoc()){

          ?>
        

        <tr class="pilih" data-kodebarcode="<?php echo $data['kode_barcode']; ?>"
                       data-namabarang="<?php echo $data['nama_barang'];?>"
          >
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['kode_barcode'];?></td>
                  <td><?php echo $data['nama_barang'];?></td>
                </tr>
                <?php

          
        }

        ?>


      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama </th>
        </tr>
      </tfoot>
    </table>

  </div>
  <!-- /.box-body -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <script type="text/javascript">
 
//            jika dipilih, kode pegawai akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("kode_barcode").value = $(this).attr('data-kodebarcode');
                document.getElementById("nama_barang").value = $(this).attr('data-namabarang');
                $('#modal-default').modal('hide');
            });
 
//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });
 
            function dummy() {
                var kode_barcode = document.getElementById("kode_barcode").value;
                alert('kode obat ' + kode_barcode + ' berhasil tersimpan');
            }
        </script>
