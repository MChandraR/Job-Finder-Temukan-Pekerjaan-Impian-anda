<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/register.css" />
    <script src="js/util.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Register</h1>
          <form method="POST" action="">
              <div class="txt_field">
                  <input type="text" name="name" id="username" required>
                  <span></span>
                  <label>Name</label>
              </div>
              <div class="txt_field">
                  <input type="email" name="email" id="email"required>
                  <span></span>
                  <label>Email</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="password" id="password" required>
                  <span></span>
                  <label>Password</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="cpassword" id="cpassword" required>
                  <span></span>
                  <label>Confirm Password</label>
              </div>
              <input name="submit" type="Submit" id="submit" value="Sign Up">
              <div class="signup_link">
                  Have an Account ? <a href="login">Login Here</a>
              </div>
          </form>
      </div>
  </div>
  </body>

<script>
    let submit = document.getElementById("submit");
    submit.addEventListener('click',(e)=>{
        e.preventDefault();
        let pass = document.getElementById("password").value;
        let cpass = document.getElementById("cpassword").value;
        if(pass==cpass){
            console.log(document.getElementById("username").value);
            console.log(document.getElementById("email").value);
        }else{
            alert("Password tidak sesuai !");
            return;
        }

        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value ;
        let email = document.getElementById("email").value;

        if(username == "" || password == "" || email == ""){
            alert("Data tidak boleh kosong !");
            return;
        }

        $.ajax({
            method : "POST",
            url: "register",
            data : {
                "username" : username ,
                "email" : email ,
                "password" : password
            },
            context: document.body
        }).done(function(e) {
            console.log(e);
            if(e["status"]=="sukses"){
                alert("Berhasil register");
                window.location.href = "login";
            }else{
                alert(e.message);
            }
        }).fail((e)=>{
            console.log("Error :" );
            console.log(e);
        });;
       
    });
</script>
</html>