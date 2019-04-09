<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <?php
      $curl = curl_init();
      $api_key = '613682110fabd84866c00a9d6abf277b';

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
          "key: $api_key"
      ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
      echo "cURL Error #:" . $err;
      } else {
      //   echo $response;
      }

      $data = json_decode($response, true);
      echo "<table class='table'>";
      echo '<thead class="thead-dark">';
      echo '<tr>';
      echo '<th scope="col">#</th>';
      echo '<th scope="col">Provinsi</th>';
      echo '<th scope="col">City</th>';
      echo '</tr>';
      echo '</thead>';

      for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
          echo "<tr>";            
              echo "<th>".$data['rajaongkir']['results'][$i]['province_id']."</th>";
              echo "<td>".$data['rajaongkir']['results'][$i]['province']."</td>";
          echo "</tr>";  
      }
      echo "</table>";
  ?>
</body>
</html>