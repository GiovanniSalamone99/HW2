<?php
  /*include 'auth.php';
  if (checkAuth()) {
      header('Location: index.php');
      exit;
  }
  if(!empty($_POST["username"]) && !empty($_POST["password"]))
   {
     
     $conn=mysqli_connect("localhost","root","","fantacalcio2");
     $username=mysqli_real_escape_string($conn,$_POST["username"]);
     $password=mysqli_real_escape_string($conn,$_POST["password"]);
     $query="SELECT id,username,password FROM fantallenatore WHERE username='$username'";
     $res= mysqli_query($conn,$query) or die(mysqli_error($conn));;
     if(mysqli_num_rows($res)>0)
     {
      $entry = mysqli_fetch_assoc($res);
      if (password_verify($_POST['password'], $entry['password'])) {
        $_SESSION["username"]=$_POST["username"];
        $_SESSION['log']=$entry['id'];
        header("Location: index.php");
        mysqli_free_result($res);
        mysqli_close($conn);
        exit;
      }
      else{
        $error=true;
      }
     }
     else{
       $error=true;
     }
        
   }*/
?>
<!DOCTYPE html>
<html>
  <head>
    @include('layouts.head')
    <script src="{{asset('js/Validazione.js')}}" defer="true"></script>
  </head>
  <body>
    <header>
      <nav>
      <div id="logo">
        
      <img src="img/logo.jpg" >
       </div>
        <div id="links">
          <a href="http://localhost/fantacalcio-app/public/podcast"><img src="img/Spotify_icon.png" id="spotify"></a>
          <a href="http://localhost/fantacalcio-app/public/home">Home</a>
          <a href="http://localhost/fantacalcio-app/public/highlights">Highlights</a>
          <button class='button' onclick='accedi()'>Accedi</button>
        </div>
		    <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>

    </header>
    

    <section>
        
      <div id="login">

          <img src="https://content.fantacalcio.it/web/img/logo-fantacalcio.png" >
          <form action="" name="login" method="POST">
          @csrf
              @if(old('username') != null)
              <p class='error'>Credenziali non valide</p>
              @endif
              <label>Username</label><br>
                <input type="text" name="username" value="{{ old('username') }}"><br>
              <label>Password</label><br>
                <input type="password" name="password" value="{{ old('password') }}"><br>
              <input type="submit" name="submit" id="submit_log" value="Login">
          </form>
          <br>
          <br>
          
            <label>Non sei ancora iscritto?</label>
            <a id="iscrizione" href="iscrizione">Iscriviti</a>
          
      </div>
    
    </section>

    @include('layouts.footer')
  </body>
</html>
