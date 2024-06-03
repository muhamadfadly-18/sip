<div class="panel panel-bordered panel-primary">
  <form class="form-horizontal" id="IdForm" method="post">



          <div class="panel-body">
             <h4 style="font-size:20px; font-weight: bold;">Monitoring Data Barang Keluar</h4>
            <table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Nomor Transaksi</th>
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
              foreach ($dataLoading as $value):
        $sum_value = $this->db->query("select sum(jumlah) as total from barang_keluar_realisasi where no_transaksi = '$value->no_transaksi' ")->row();

          ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= date('d-m-Y', strtotime($value->tgl_transaksi));?></td>
                <td><?= $value->no_transaksi;?></td>
                <td><?= $value->id_barang;?></td>
                <td><?= $value->nama_brg;?></td>
                <td><?= number_format($sum_value->total,2); ?> - <?= $value->id_satuan ?></td>

                <!-- <td><?= $value->no_dokumen_pabean;?></td>
                <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean));?></td> -->
                <td><a style="text-decoration:none; text-align:center;" class="btn btn-block btn-primary" href="https://app.asinusa.co.id/sip/uploads/<?= $value->file ?>" target="_blank">
                                <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                                  Review
                                </a>
<a style="text-decoration:none; text-align:center;" class="btn btn-block btn-success" href="<?php echo base_url('Approve/approve_barang_keluar/'.$value->no_transaksi.'/'.$value->jenis_keluar);?>">
                                <i class="icon wb-check" aria-hidden="true"></i>
                                Approve
                                </a>
                                <a style="text-decoration:none; text-align:center;" class="btn btn-block btn-danger" href="<?php echo base_url('Approve/reject_barang_keluar/'.$value->no_transaksi);?>">
                                <i class="icon wb-close" aria-hidden="true"></i>
                                Not Ok
                                </a>

                                
              </td>

              
              <!-- <td>
                      <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
                            data-toggle="dropdown" aria-expanded="false">
                              <i class="icon wb-settings" aria-hidden="true"></i>
                              <span class="caret">Review</span>
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
