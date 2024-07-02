<?php
{
    if (isset($_GET['edit']))
    {
        echo '<p class="notification">User was successfully edited.</p>';
    } else if (isset($_GET['new']))
    {
        echo '<p class="notification">New user was successfully added.</p>';
    }

    $query_result = $mysqli->query("SELECT * FROM users;");

    echo '<h4>Logged as: ' . $_SESSION['email'] . '</h4>';

    echo "<table class='table' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>";
    echo "<th style='padding: 10px; border: 1px solid #000;'>Email</th>";
    echo "<th style='padding: 10px; border: 1px solid #000;'>Name</th>";
    echo "<th style='padding: 10px; border: 1px solid #000;'>Surname</th>";
    echo "<th style='padding: 10px; border: 1px solid #000;'>Phone</th>";
    echo "<th style='padding: 10px; border: 1px solid #000;'>Office</th>";
    echo "<th style='padding: 10px; border: 1px solid #000;'>Description</th>";
    if ($_SESSION['admin'])
    {
        echo "<th style='padding: 10px; border: 1px solid #000;'></th>";
        echo "<th style='padding: 10px; border: 1px solid #000;'></th>";
    }
    echo "</tr>";

    while ($row = $query_result->fetch_assoc())
    {
        echo "<tr data-id=" . $row['email'] . ">";
        echo "<td style='padding: 10px; border: 1px solid #000;'>" . $row['email'] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #000;'>" . $row['name'] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #000;'>" . $row['surname'] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #000;'>" . $row['phone'] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #000;'>" . $row['office'] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #000;'>" . $row['description'] . "</td>";
        if ($_SESSION['admin'])
        {
            echo "<td style='padding: 10px; border: 1px solid #000;'><a href='./users/edit/" . $row['email'] . "'>Edit</a></td>";
            echo '<td style="padding: 10px; border: 1px solid #000;"><button class="button button--delete" data-action="./users/delete/' . $row["email"] . '">Delete</button></td>';
        }
        echo "</tr>";
    }

    if ($_SESSION['admin'])
    {
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #000;'><a href='./users/new'>Add new user</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<dialog id="dialog">
    <p id="dialog__text">Do you really want to delete user with email = <span id="dialog__item-to-delete">X</span>? This
        action
        cannot be undone.</p>
    <a href="#" onclick="deleteUserAsynchronous(document.getElementById('dialog__item-to-delete').textContent)">yes</a>
    <a href="#" onclick="closeDeleteDialog()">no</a>
</dialog>

<script>

    const deleteButtons = document.querySelectorAll(".button--delete");
    deleteButtons.forEach(b => b.addEventListener("click", e =>
    {
        const dialog = document.getElementById("dialog");
        const action = b.dataset.action;

        const item = document.getElementById("dialog__item-to-delete");
        item.innerHTML = action.split("/").pop();;

        dialog.showModal();
    }));

    function closeDeleteDialog()
    {
        const dialog = document.getElementById("dialog");
        dialog.close();
    }

    function deleteUserAsynchronous(id)
    {
        fetch("http://localhost/Simple-administratioN/users/delete/" + id, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "user_id=" + id,
        })
            .then((response) =>
            {
                if (response.ok) {
                    updateTable(id);
                } else {
                    console.error("Chyba při mazání uživatele");
                }
            })
            .catch((error) =>
            {
                console.error("Chyba při provádění asynchronního požadavku: " + error);
            });

        closeDeleteDialog()
    }

    function updateTable(id)
    {
        const table = document.querySelector("table");

        const rowToDelete = table.querySelector(`tr[data-id="${id}"]`);

        if (rowToDelete) {
            rowToDelete.remove();
        }
    }


    const notifications = document.querySelectorAll(".notification");
    setTimeout(() => { notifications.forEach(n => n.style.display = "none") }, 3000);
    var opacity = 1;
    var fadeOutInterval = setInterval(() =>
    {
        opacity = opacity - 0.01;
        notifications.forEach(n =>
        {
            n.style.opacity = opacity;
            if (opacity <= 0) {
                n.style.display = "none";
                clearInterval(fadeOutInterval);
            }
        })
    }, 30);

</script>