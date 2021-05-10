<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>

        <?php echo $title ?> <br>
        <?php echo $name ?> <br>
        <?php echo $size ?> <br>
        <?php echo $tmp_name ?> <br> 
        <?php echo $type ?> <br>
        <span class="card-img-top"><?php echo '<img class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $tmp_name).'"/>';?></span>

        <br>
        <span class="card-img-top"><?php echo '<img class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $img).'"/>';?></span>
        <?php
        $imageData = file_get_contents($tmp_name);
        echo sprintf('<img src="data:image/png;base64,%s" />', base64_encode($imageData));
        ?>
    </div>
</body>
</html>