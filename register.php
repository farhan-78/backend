<?php 
include_once('connect.php');
$database = new database();
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST ['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $umur = $_POST ['umur'];
    $jeniskelamin = $_POST ['jeniskelamin'];
    $telpon = $_POST ['telpon'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $alamat = $_POST ['alamat'];
    if($database->register($username,$email,$tanggal_lahir,$umur,$jeniskelamin,$telpon,$password,$alamat))
    {
      header('location:login.php');
    }
}

$usernameErr = $emailErr = $tanggal_lahirErr = $umurErr = $jeniskelaminErr = $telponErr = $passwordErr = $alamatErr = "";
$username = $email = $tanggal_lahir = $umur = $jeniskelamin = $telpon = $password = $alamat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username kosong";
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email kosong";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["tanggal_lahir"])) {
    $tanggal_lahirErr = "Tanggal lahir kosong";
  } else {
    $tanggal_lahir = test_input($_POST["tanggal lahir"]);
  }

  if (empty($_POST["umur"])) {
    $umurErr = "Umur kosong";
  } else {
    $umur = test_input($_POST["umur"]);
  }

  if (empty($_POST["jeniskelamin"])) {
    $jeniskelaminErr = "jenis kelamin kosong";
  } else {
    $jeniskelamin = test_input($_POST["jenis kelamin"]);
  }

  if (empty($_POST["telpon"])) {
    $telponErr = "Telpon kosong";
  } else {
    $telpon = test_input($_POST["telpon"]);
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password tidak boleh kosong";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["alamat"])) {
    $pekerjaanErr = "Alamat tidak kosong";
  } else {
    $alamat = test_input($_POST["alamat"]);
  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}    
 
?>
<!doctype html>
<html lang="en" class="h-50">
  <head>
    <title>from</title>
  </head>
<style>

.error {color: #FF0000;}

input[type=text], select {
  width: 100%;
  padding: 18px 20px;
  margin: 8px 0;
  display: block;
}

input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

button:hover {
  background-color: #00BFFF;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

a:link, a:visited {
  background-color: green;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
</style>

<body>

  <div>
    <h1 class="mt-5">Registrasi</h1>
    <p class="lead">Masukkan data</p>
    <hr/>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form">
      <label for="username">Username</label>
      <div>
        <span class="error">* <?php echo $usernameErr;?></span>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      </div>
    </div>

    <div class="form">
      <label for="email">Email</label>
      <div>
        <span class="error">* <?php echo $emailErr;?></span>  
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
      </div>
    </div>

    <div class="form">
      <label for="tanggal lahir">tanggal lahir</label><span class="tanggal lahir">* <?php echo $tanggal_lahirErr;?></span>
      <div>
        <input type="text" class="form-control" id="tanggal lahir" name="tanggal lahir" placeholder="tanggal lahir">
      </div>
    </div>
 
    <div class="form">
      <label for="umur">umur</label>
      <span class="error">* <?php echo $umurErr;?></span>
      <div>
        <input type="text" class="form-control" id="umur" name="umur" placeholder="umur">
      </div>
    </div>  

    <div class="form">
      <label for="jenis kelamin">jenis kelamin</label>
      <span class="error">* <?php echo $jeniskelaminErr;?></span>
      <div>
        <input type="text" class="form-control" id="jenis kelamin" name="jenis kelamin" placeholder="jenis kelamin">
      </div>
    </div>

    <div class="form">
      <label for="telpon">telpon</label>
      <span class="error">* <?php echo $telponErr;?></span>
      <div>
        <input type="text" class="form-control" id="telpon" name="telpon" placeholder="telpon">
      </div>
    </div>

    <div class="form">
    <label for="password">Password</label>
    <span class="error">* <?php echo $passwordErr;?></span>
    <div>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div> 

    <div class="form">
      <label for="alamat">Alamat</label>
      <span class="error">* <?php echo $alamatErr;?></span>
      <div>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
      </div>
    </div>
  
  <div class="form">
  <a href="login.php">Sing in</a>
  <button type="submit" name="register">Register</button>
  </div>
</form>
  </div>
</main>
 
<footer>
    <p class="p-5 bg-warning text-white text-center">@dicky</p>
</footer>
</footer>
</body>
</html>