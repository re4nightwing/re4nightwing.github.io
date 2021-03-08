<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="https://www.google.com/recaptcha/api.js?render=6LeCM3caAAAAADC4_7YpzWT2Dur4hFyX6i0G6bK-"></script>

<form action="index1.php" method="post">
    <input type="text" name="name" id="">
    <input type="text" name="token" id="token" hidden>
    <input type="submit" name="sub">
</form>
<?php
    echo 'pakyu';
    if(isset($_POST['sub'])){
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => "6LeCM3caAAAAAAT4OQ4-rJ1XrWW0uEmupyQU9C2p",
            'response' => $_POST['token'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url,false,$context);

        $res = json_decode($response, true);

        if($res['success']){
            echo '$_POST["name"]';
        } else{
            echo 'fuck';
        }
    }
?>

<script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LeCM3caAAAAADC4_7YpzWT2Dur4hFyX6i0G6bK-', {action: 'submit'}).then(function(token) {
              document.getElementById("token").value = token;
              console.log(token);
          });
        });
      }
  </script>
</body>
</html>
