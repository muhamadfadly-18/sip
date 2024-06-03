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
              <th>User</th>
              <th>Tipe</th>
              <th>Aksi</th>
                            
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                <th>No</th>
              <th>User</th>
              <th>Tipe</th>
              <th>Aksi</th>
            
              
                  </tr>
                </tfoot>
                <tbody>
                <?php
                  $no=1;
                  foreach ($data as $value):
                ?>
                  <tr align="center">
                    <td><?= $no++;?></td>
                    <td><?= $value->log_user;?></td>
              <td><?= $value->log_tipe;?></td>
              <td><?= $value->log_aksi;?></td>
              
                    
                  </tr>
                  <?php
                    endforeach;
                  ?>
                </tbody>
            </table>


</body>
</html>