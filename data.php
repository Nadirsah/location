<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data</title>
  </head>
  <body>
    <table border = 1>
      <tr>
        <td>Id</td>
        <td>IP</td>
        <td>ISP</td>
        <td>Country</td>
        <td>City</td>
         <td>latitude</td>
        <td>longitude</td>
      </tr>
      <?php
      require 'config.php';
      $rows = mysqli_query($conn, "SELECT * FROM tb_data");
      ?>
      <?php foreach($rows as $row) : ?>
      <tr>
        <td>Visitor <?php echo $row["id"]; ?></td>
        <td><?php echo $row["ip"]; ?></td>
        <td><?php echo $row["isp"]; ?></td>
        <td><?php echo $row["country"]; ?></td>
        <td><?php echo $row["city"]; ?></td>
        <td><?php echo $row["latitude"]; ?></td>
        <td><?php echo $row["longitude"]; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php">Index</a>
  </body>
</html>
