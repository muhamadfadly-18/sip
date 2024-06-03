<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<style type="text/css">
  @page { size: landscape; margin:20px 20px;}
  body { margin:20px 20px; }

  .skop{
    width: 100%;
  }

  .line-skop{
    width: 100%;
    height:1px;
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
    margin-top:10px;
  }

  .table-isi{
    width: 100%;
    margin-top: 20px;
  }

  .garisbawah{
    border-top: 1px solid black;
    border-bottom: 1px solid black;
  }

</style>
<body>

  
  <table style="width: 100%;">
                <thead>
                  <tr>
                <th>No</th>
              <th>Po Number</th>
              <th>NO Bukti Penerima</th>
              <th>Tanggal Finish Goods</th>
              <th>HS Code</th>
              <th>Uraian Barang</th>
              <th>Satuan</th>
              <th>Jumlah Dari Produksi</th>
              <th>Jumlah Dari SubKontrak</th>
              <th>Gudang</th>
              
                  </tr>
                </thead>
                
                <tbody>
                <?php
                  $no=1;
                  foreach ($data as $value):
                    $purchase       = $this->db->query("select po_number from purchase where id_purchase = '$value->po_number' ")->row();
                ?>
                  <tr>
                    <td><?= $no++;?></td>
                     <td><?= $purchase->po_number;?></td>
              <td><?= $value->bukti_penerimaan_no;?></td>
              <td><?= $value->tanggal_finish_goods;?></td>
              <td><?= $value->kode_barang;?></td>             
                    <td><?= $value->nama_barang;?></td>
              <td><?= $value->satuan;?></td>
              <td><?= $value->jumlah_dari_produksi;?></td>
              <td><?= $value->jumlah_dari_subkontrak;?></td>
              <td>Asinusa</td>
                    
                  </tr>
                  <?php
                    endforeach;
                  ?>
                </tbody>
            </table>


</body>
</html>