<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>room.php</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <h2>DETTAGLIO STANZA</h2>
    <?php

        require_once "data.php";

        $id = $_GET['id'];

        
        $conn = getConnection();
        $sql = getDetStanzeSql();
        
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("i", $id);
        $stmt -> execute();
        $stmt -> bind_result($room, $floor, $beds);

        $stmt -> fetch();

        echo 'Stanza:' . ' ' . $room . ' - '
            . 'Piano:' . ' ' . $floor . ' - '
            . 'Letti:' . ' ' . $beds;

        closeConn($conn, $stmt);
    ?>
  </body>
</html>