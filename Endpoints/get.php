<!DOCTYPE html>
<html>

<head>
  <title>Zobrazení dat</title>
</head>

<body>

  <?php
  $query = "SELECT EMAIL, NAME, SURNAME FROM users";
  $result = $mysqli->query($query);
  $row = $result->fetch_assoc();

  $data = array();

  if ($result->num_rows > 0)
  {
    while ($row = $result->fetch_assoc())
    {
      $data[] = $row;
    }
  }

  if (!empty($data))
  {
    $jsonData = json_encode($data);
    $formattedData = json_encode(json_decode($jsonData), JSON_PRETTY_PRINT);
    $_SESSION['data'] = $formattedData;
    $_SESSION['getOrId'] = true;

    echo "<pre>" . $formattedData . "</pre>";
  } else
  {
    echo "Žádní uživatelé nebyli nalezeni.";
  }
  ?>

  <script>
    const ra = new FormData();
    ra.append('restAPI', 'get');

    fetch("http://localhost/Simple-administratioN/Controllers/others", {
      method: "POST",
      body: ra
    })
      .then((response) =>
      {
        if (response.ok) {
          console.log("Code: 200");
        }
      })
      .catch((error) =>
      {
        console.error("Chyba při provádění asynchronního požadavku: " + error);
      });
  </script>

</body>

</html>