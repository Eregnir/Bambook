<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php echo $user_username ?> <br>
        <span class="card-img-top"><?php echo '<img class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $img).'"/>';?></span>
    </div>
</body>
</html>