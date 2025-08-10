<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CATUR DHARMA INTEGRITAS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?=base_url()?>/assets-web/img/logo-cdi.png" rel="icon">


</head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap");

* {
  margin: 0;
  padding: 0;
  font-family: "poppins", sans-serif;
}

section {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  width: 100%;
  background: url("<?=base_url()?>/assets-web/img/cdi-2.jpg")
    no-repeat;
  background-position: center;
  background-size: cover;
}

section:before {
  content: "";
  background-color: #0009;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
}

.form-box {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  width: 400px;
  height: 650px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  backdrop-filter: blur(15px);
}

h2 {
  color: #fff;
  text-align: center;
  font-size: 2em;
}

.inputbox {
  position: relative;
  border-bottom: 2px solid #fff;
  margin: 30px 0;
  width: 310px;
}

.inputbox label {
  transform: translateY(-50%);
  color: #fff;
  font-size: 1em;
  pointer-events: none;
  transition: 0.5s;
  position: absolute;
  top: 50%;
  left: 5px;
}

input:focus ~ label,
input:valid ~ label {
  top: -5px;
}

.inputbox input {
  background: transparent;
  border: none;
  outline: none;
  font-size: 1em;
  padding: 0 35px 0 5px;
  color: #fff;
  width: 100%;
  height: 50px;
}

.inputbox ion-icon {
  font-size: 1.2em;
  position: absolute;
  right: 8px;
  color: #fff;
  top: 20px;
}

.forget {
  color: #fff;
  display: flex;
  justify-content: space-between;
  margin: -15px 0 15px;
  font-size: 0.9em;
}

.forget label {
  color: #fff;
}

.forget label input {
  margin-right: 3px;
}

.forget label a,
.forget a {
  color: #fff;
  text-decoration: none;
}

.forget label a:hover {
  text-decoration: underline;
}

button {
  width: 100%;
  height: 40px;
  border-radius: 40px;
  background: #fff;
  border: none;
  outline: none;
  cursor: pointer;
  font-size: 1em;
  font-weight: 600;
}

.register {
  font-size: 0.9em;
  color: #fff;
  text-align: center;
  margin: 25px 0 10px;
}

.register p a {
  text-decoration: none;
  color: #fff;
  font-weight: 600;
}

.register p a:hover {
  text-decoration: underline;
}

</style>
<body>
<section>
  <div class="form-box">
    <div class="form-value">
      <form action="<?=base_url()."/".$action_register?>" method="POST">
        <h2>Register Akun</h2>
        <div class="inputbox">
          <ion-icon name="user-outline"></ion-icon>
          <input type="text" name="nama_pelanggan" required autofocus>
          <label for="">Nama Pelanggan</label>
        </div>
        <div class="inputbox">
          <ion-icon name="user-outline"></ion-icon>
          <input type="text" name="hp" required >
          <label for="">HP</label>
        </div>
        <div class="inputbox">
          <ion-icon name="user-outline"></ion-icon>
          <input type="text" name="alamat" required >
          <label for="">Alamat</label>
        </div>
        <div class="inputbox">
          <ion-icon name="user-outline"></ion-icon>
          <input type="text" name="user_name" required >
          <label for="">Username</label>
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" name="password" required>
          <label for="">Password</label>
        </div>
        <button type="submit">Register</button>=
        <br>
        <a href="/login" style="margin-top:20px;color:white">ke halama Login</a>
      </form>
    </div>
  </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>