<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        header("Location: " . $header_domain . "loging/login/" . $_POST["email"] . "/" . $_POST["password"]);
    }

    ?>

    <h1>Login</h1><br>
    <form method="post">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>         <!-- type="text" změnit na type="email" -->

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Log in">
    </form>
</main> 

<script>

    const email = document.getElementById("email");
    const form = document.querySelector("form");

    email.addEventListener("input", e =>
    {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("I am expecting an e-mail address!");
            email.reportValidity();
        } else {
            email.setCustomValidity("");
        }
    });

    form.addEventListener("submit", e =>
    {
        if (!email.value) {
            showError(email);
            event.preventDefault();
        }
    });

    function showError(e)
    {
        e.style.backgroundColor = "#ffcccb";
        e.setCustomValidity("E-mail have to be entered!");
        e.reportValidity();
    }

</script>