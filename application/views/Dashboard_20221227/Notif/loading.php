<div class="panel panel-bordered panel-primary">
  <form class="form-horizontal" id="IdForm" method="post">



          <div class="panel-body">
             <h4 style="font-size:20px; font-weight: bold;">Monitoring Penerimaan - Loading / Muat</h4>
            <table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
            <thead>
              <tr>
              <th>No</th>
 		          <th>Tanggal Masuk Kapal</th>
              <th>HS Code</th>
              <th>Nama Barang</th>

              <th>QTY</th>
              <th>No. Pabean</th>
              <th>Tanggal Pabean</th>
              <th style="text-align: center;">Aksi</th>
             </tr>
            </thead>

            <tbody>
            <?php
              $no=1;
              foreach ($dataLoading as $value):
          ?>
              <tr>
              <td><?= $no++;?></td>
  <td><?= date('d-m-Y', strtotime($value->tgl_masuk));?></td>
              <td><?= $value->id_barang;?></td>
              <td><?= $value->nama_brg;?></td>

              <td><?= number_format($value->jumlah,2);?> - <?= $value->id_satuan ?></td>

              <td><?= $value->no_dokumen_pabean;?></td>
              <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean));?></td>
              <td><a style="text-decoration:none; text-align:center;" class="btn btn-block btn-success" href="<?php echo base_url('PengeluaranRBB/add_get/'.$value->id_bm);?>">
                                <i class="icon wb-eye" aria-hidden="true"></i>
                                Detail
                                </a>
              </td>

              </tr>
              <?php
                endforeach;
              ?>
            </tbody>
         </table>
          </div>
      </form>
  </div>
</div>
