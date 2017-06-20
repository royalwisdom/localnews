<?php
// define variables and set to empty values
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  if (!preg_match("a-zA-Z*$/",$name)) {
    $nameErr = "Name is invalid, only letters and spaces allowed";
  }
  $email = test_input($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email address, please review";
  }
  $signUpDate = date(Y.m.d);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail:
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
<input type="submit">
</form>
