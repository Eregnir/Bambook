<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        foreach ($email as $em){
            echo $em->email;
        }
        // echo $email[0];
        ?>
    </div>
</body>
</html>