<!DOCTYPE html>
<html>

<head>
    <title>Zobrazení dat</title>
</head>

<body>

    <?php

    $email = $params[0];

    $query = "SELECT EMAIL, NAME, SURNAME, PHONE, OFFICE, DESCRIPTION FROM users WHERE EMAIL = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row)
    {
        $data = array(
            'EMAIL' => $row['EMAIL'],
            'NAME' => $row['NAME'],
            'SURNAME' => $row['SURNAME'],
            'PHONE' => $row['PHONE'],
            'OFFICE' => $row['OFFICE'],
            'DESCRIPTION' => $row['DESCRIPTION']
        );

        if (!empty($data))
        {
            $jsonData = json_encode($data);
            $formattedData = json_encode(json_decode($jsonData), JSON_PRETTY_PRINT);
            $_SESSION['dataId'] = $formattedData;
            $_SESSION['getOrId'] = false;

            echo "<pre>" . $formattedData . "</pre>";
        } else
        {
            echo "Žádní uživatelé nebyli nalezeni.";
        }
    }
    ?>

    <script>
        const ra = new FormData();
        ra.append('restAPI', 'id');

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