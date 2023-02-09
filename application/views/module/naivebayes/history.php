<div class="row">
  <div class="col-12">
    <a href="<?=base_url()?>naivebayes/process/prediksi" class="btn btn-primary">Tambah Prediksi</a>
    <a href="<?=base_url()?>operation/printhistory" class="btn btn-warning">Cetak Hasil</a>
    <a href="<?=base_url()?>operation/deleteall" class="btn btn-danger">Hapus Semua</a>
    <div class="card card-body mt-2">
      <?php
        $history = $this->db->get("naivebayes_history")->result_array();
        $column = array();
        if(sizeof($history)>0){
          $column = $history[0]['history'];
          $column = (array)json_decode($column);
          $column = array_keys($column);
        }
      ?>
      <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <?php
              foreach ($column as $key) {
                if($key!="uniqid"){
                  ?>
                  <th>
                    <?=$key?>
                  </th>
                  <?php
                }
              }
              if(sizeof($column)>0){
                ?>
                <th>Action</th>
                <?php
              }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($history as $key) {
              $data = $key['history'];
              $data = (array)json_decode($data);
              echo "<tr>";
              foreach ($column as $keys) {
                if($keys!="uniqid"){
                  ?>
                  <td>
                    <?=$data[$keys]?>
                  </td>
                  <?php
                }
              }
                ?>
                <td>
                  <a href="<?=base_url()?>operation/delete/<?=$data['uniqid']?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                <?php
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>
