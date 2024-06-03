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
                         <tr>
                          <th rowspan="2" style="vertical-align:middle;">No.</th>
                            <th rowspan="2" style="vertical-align:middle;">PO. Number</th>
                            <th colspan="3" style="text-align: center;">Pabean</th>
                            <th colspan="3" style="text-align: center;">Bukti Pengeluaran</th>
                            <th colspan="6" style="text-align: center;">Barang</th>
                            <th rowspan="2" style="vertical-align:middle;">Gudang</th>
                            <th rowspan="2" style="vertical-align:middle;">Negara Tujuan</th>
                            
                          
                        </tr> 
                         <tr>
                            <th style="vertical-align:top";>Jenis</th>
                            <th style="vertical-align:top";>Nomor</th>
                            <th style="vertical-align:top";>Tanggal</th>

                    
                    <th style="vertical-align:top";>Nomor</th>
                    <th style="vertical-align:top";>Tanggal</th>
                    <th style="vertical-align:top";>Pemasok</th>

                    <th style="vertical-align:top";>HS Code</th>
                    <th style="vertical-align:top";>Uraian</th>
                    <th style="vertical-align:top";>Jumlah</th>
                    <th style="vertical-align:top";>Satuan</th>

                    <th style="vertical-align:top";>Mata Uang</th>
                    <th style="vertical-align:top";>Nilai Barang</th>

         
                        </tr>             
 
                  </tr>
                </thead>
            
              <tbody>
                <?php
                  $no=1;
                  foreach ($data as $value):
                    $data_uang = $this->db->query("select mata_uang from ref_kurs where id_kurs = '$value->id_mata_uang' ")->row();
                    $purchase       = $this->db->query("select po_number from purchase where id_purchase = '$value->po_number' ")->row();
                    $data_dokumen = $this->db->query("select dokumen from ref_dokumen where id_dokumen = '$value->jenis_doc' ")->row();

                ?>
                  <tr align="center">
                          <td><?= $no++;?></td>
                          <td><?= $purchase->po_number;?></td>
                    <td><?= $data_dokumen->dokumen;?></td>
                    <td><?= $value->no_dokumen_pabean;?></td>
                    <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean));?></td>
                    
                          <td><?= $value->no_bukti_pengeluaran;?></td>
                          <td><?= date('d-m-Y', strtotime($value->tgl_bukti_pengeluaran));?></td>
                          <td><?= $value->id_client ?></td>
                          <td><?= $value->id_barang;?></td>
                          <td><?= $value->nama_brg;?></td>
                          <td><?= number_format($value->jumlah,2,',','.');?></td> 
                          <td><?= $value->id_satuan;?></td>
                        
                          <td><?= $data_uang->mata_uang;?></td>
                          <td><?= number_format($value->nilai_barang,2,',','.');?></td> 
                          <td>Asinusa</td>
                           
                          <td><?= $value->negara_tujuan;?></td>
                          
                    
                  </tr>
                  <?php
                    endforeach;
                  ?>
                </tbody>
            </table>


</body>
</html>