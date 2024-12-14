<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM siswa"; 
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Login & Signup Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section class="wrapper">
        <div class="form login ">
            <header>Login</header>
            <form action="#">
              <input type="text" placeholder="Email address" required />
              <input type="password" placeholder="Password" required />
              <a href="#">Forgot password?</a>
              <input type="submit" value="Login" />
            </form>
          </div>
    

      <div class="form signup">
        <header>Signup</header>
        <form action="#">
          <input type="text" placeholder="Full name" required />
          <input type="text" placeholder="Email address" required />
          <input type="password" placeholder="Password" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" />
            <label for="Check">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" />
        </form>
      </div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
          loginHeader = document.querySelector(".login header"),
          signupHeader = document.querySelector(".signup header");
          

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
  </body>
</html>