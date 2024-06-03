<div class="panel panel-bordered panel-primary">
  <form class="form-horizontal" id="IdForm" method="post">
 


          <div class="panel-body">
             <h4 >Monitoring Penerimaan</h4>
            <table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
            <thead>
              <tr>
              <th>No</th>
 		<th>Tanggal Masuk</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
             
              <th>QTY</th>              
              <th>No. Pabean</th>
              <th>Tanggal Pabean</th>
             </tr>
            </thead>
           
            <tbody>
            <?php
              $no=1;
              foreach ($dataNotif as $value):
          ?>
              <tr>
              <td><?= $no++;?></td>
  <td><?= date('d-m-Y', strtotime($value->tgl_masuk));?></td>
              <td><?= $value->id_barang;?></td>
              <td><?= $value->nama_brg;?></td>
            
              <td><?= $value->jumlah;?></td>
              
              <td><?= $value->no_dokumen_pabean;?></td>
              <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean));?></td>

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
 
