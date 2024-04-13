<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <script src="js/util.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .login-container {
            margin: 10% 15%;
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .login-container button {
            width: 100%;
            padding : 10px 0;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .login-container p {
            text-align: center;
            margin-top: 10px;
        }
        .card-bg{
            width : 50%;
            border-radius : 1rem 0;
            background-image : url("images/card.jfif");
        }
        .tx-style1{
            color:white;
            text-align : left;
            font-size : 2rem;
            text-shadow: 0 0 1rem black;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <table>
            <tr>
                <td class="card-bg">
                    <h2 style="margin:0 5rem;" class="tx-style1">Masuk dan Mulailah cari pekerjaan !</h2>
                </td>
                <td style="padding:10%;">
                    <h2 >Login</h2>
                    <form action="/login" method="POST">
                        <input type="text" name="username" id="username" placeholder="Username" required>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <button type="submit" id="submit">Login</button>
                    </form>
                    <p>Don't have an account? <a href="/register">Register here</a></p>
                </td>
            </tr>
        </table>
        
    
    </div>
</body>
<script src="js/jquery-3.7.1.min.js"></script>
<script>
    let data = {};
    let button = document.getElementById("submit");
    console.log(button);
    button.addEventListener('click',(e)=>{
        e.preventDefault();
        console.log(document.getElementById("username").value);
        console.log(document.getElementById("password").value);
        $.ajax({
            method : "POST",
            url: "login",
            data : {
                "username" : document.getElementById("username").value,
                "password" : document.getElementById("password").value
            },
            context: document.body
        }).done(function(e) {
            console.log(e);
            if(e["status"]=="sukses"){
                alert("Berhasil login");
                data = e["data"][0];
                console.log(data);
                document.cookie = "user_id="+data.user_id;
                document.cookie = "username="+data.username;
                window.location.href = "home";
            }else{
                alert("Username atau password salah !");
            }
        }).fail((e)=>{
            console.log("Error :" + e);
        });;
    });
</script>
</html>
