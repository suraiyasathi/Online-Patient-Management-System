<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="login_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

<style>
    #form-messages {
        background-color: rgb(255, 232, 232);
        border: 1px solid red;
        color: red;
        display: none;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 10px;
        padding: 10px 25px;
        max-width: 250px;
    }
</style>
</head>
<body>
	<header>
	    <nav>
		    <div class="home clearfix animated slideInDown">
			<ul class="main-nav animated slideInDown">
			    <li><a href="index.html">Home</a></li>
				<li><a href="#">Contact Info</a></li>
			</ul>
		</nav>
	</header>
    <div class="login-box">
    <div class="form">
        <ul id="form-messages"></ul>
        
       <h1>Login Here</h1>

        <label for="username">Username</label>
        <input type="email" id="username" spellcheck="false">

        <label for="password">Password</label>
        <input type="password" id="password">

        <input type="submit" id="btn-submit" value="Sign Up">
    </div>
    </div>
    <script>
        const form = {
            username: document.getElementById('username'),
            password: document.getElementById('password'),
            submit: document.getElementById('btn-submit'),
            messages: document.getElementById('form-messages')
        };

        form.submit.addEventListener('click', () => {
            const request = new XMLHttpRequest();

            request.onload = () => {
                let responseObject = null;

                try {
                    responseObject = JSON.parse(request.responseText);
                } catch (e) {
                    console.error('Could not parse JSON!');
                }

                if (responseObject) {
                    handleResponse(responseObject);
                }
            };

            const requestData = `username=${form.username.value}&password=${form.password.value}`;

            request.open('post', 'loginconf.php');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(requestData);
        });

        function handleResponse (responseObject) {
            if (responseObject.flag) {
                location.href = 'profile.php';
            } else {
                while (form.messages.firstChild) {
                    form.messages.removeChild(form.messages.firstChild);
                }

                responseObject.messages.forEach((message) => {
                    const li = document.createElement('li');
                    li.textContent = message;
                    form.messages.appendChild(li);
                });

                form.messages.style.display = "block";
            }
        }
    </script>
</body>
</html>