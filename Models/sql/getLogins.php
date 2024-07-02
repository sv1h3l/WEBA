<?php

$query_result = $mysqli->query("SELECT DISTINCT email FROM logins ORDER BY email DESC LIMIT 10;");
while ($row = $query_result->fetch_assoc())
{
    $query = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $row['email']);
    $query->execute();
    $query_result2 = $query->get_result()->fetch_assoc();

    echo "<tr>";
    echo "<td style='padding: 10px; border: 1px solid #000;'>" . $query_result2['email'] . "</td>";
    echo "<td style='padding: 10px; border: 1px solid #000;'>" . $query_result2['name'] . "</td>";
    echo "<td style='padding: 10px; border: 1px solid #000;'>" . $query_result2['surname'] . "</td>";
    echo "<td style='padding: 10px; border: 1px solid #000;'>" . $query_result2['phone'] . "</td>";
    echo "</tr>";
}

?>