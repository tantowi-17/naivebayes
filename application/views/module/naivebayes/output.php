<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=History-Prediksi.xls");
  $history = $this->db->get("naivebayes_history")->result_array();
  $column = array();
  if(sizeof($history)>0){
    $column = $history[0]['history'];
    $column = (array)json_decode($column);
    $column = array_keys($column);
  }
?>
<html>
<head>
	<title>History Prediksi</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
	<center>
		<h1>History Prediksi</h1>
	</center>
  <table>
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
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>
