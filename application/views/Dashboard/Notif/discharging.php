<div class="panel panel-bordered panel-primary">
  <form class="form-horizontal" id="IdForm" method="post">



          <div class="panel-body">
             <h4 style="font-size:20px; font-weight: bold;">Monitoring Penerimaan - Discharging / Offloading / Bongkar</h4>
            <table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
            <thead>
              <tr>
              <th>No</th>
 		          <th>Tanggal Masuk Kapal</th>
		          <th>Nama Kapal</th>
              <th>HS Code</th>
              <th>Nama Barang</th>

              <th>QTY</th>
              <!-- <th>No. Pabean</th>
              <th>Tanggal Pabean</th> -->
              <th>Aksi</th>
             </tr>
            </thead>

            <tbody>
            <?php
              $no=1;
              foreach ($dataDischarging as $value):
          ?>
              <tr>
              <td><?= $no++;?></td>
  <td><?= date('d-M-Y', strtotime($value->tgl_masuk));?></td>
              	<td><?= $value->nama_kapal;?></td>
		<td><?= $value->id_barang;?></td>
              <td><?= $value->nama_brg;?></td>

              <td><?= number_format($value->jumlah,2); ?> - <?= $value->id_satuan ?></td>

              <!-- <td><?= $value->no_dokumen_pabean;?></td>
              <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean));?></td> -->
              <td><a style="text-decoration:none; text-align:center;" class="btn btn-block btn-success" href="<?php echo base_url('PemasukanRBB/add_get/'.$value->id_bm);?>">
                                <i class="icon wb-eye" aria-hidden="true"></i>
                                Submit
                                </a>
              </td>

              
              <!-- <td>
                      <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
                            data-toggle="dropdown" aria-expanded="false">
                              <i class="icon wb-settings" aria-hidden="true"></i>
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                              <li role="presentation">
                                <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('PemasukanRBB/add_get/'.$value->id_bm);?>">
                                <i class="icon wb-eye" aria-hidden="true"></i>
                                Detail Penerimaan Barang Masuk
                                </a>
                              </li>
                              <li role="presentation">
                                <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('PemasukanRBB/add_get/'.$value->id_bm);?>">
                                <i class="icon wb-eye" aria-hidden="true"></i>
                                Detail Penerimaan Barang Hasil Blending
                                </a>
                              </li>
                            </ul>
                        </div>

                    </td> -->
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
