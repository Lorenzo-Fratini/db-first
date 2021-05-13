<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <h1>STANZE</h1>
    <div class="rooms-cont">
      <?php

        require_once "data.php";

        $conn = getConnection();
        $sql = getStanzeSql();

        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $stmt -> bind_result($roomId, $room);

        while ($stmt -> fetch()) {
      
          echo '<a href="room.php?id=' . $roomId . '">' 
          . $room . '</a><br>';  
        }

        closeConn($conn, $stmt);
      ?>
    </div>
  </body>
</html>