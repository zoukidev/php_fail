<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS</title>
</head>
<body>
    <h1>XSS</h1>
    <form action="" method="POST">
        <label for="inputName">Name</label>
        <input type="text" name="name" id="inputName">
        <input type="submit" value="Save">
    </form>
</body>
</html>

<?php
    if (isset($_POST["name"])) {
        try {
            $PDO = new PDO('mysql:host=127.0.0.1;dbname=sys', 'root', 'root');
            $sql = 'SELECT * FROM accounts WHERE username=\''.$_POST["name"].'\';';
            print $sql.'<br>';
            foreach ($PDO->query($sql) as $row) {
                var_dump($row);
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>