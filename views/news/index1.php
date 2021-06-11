<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach( $newsList as $item):?> 
        <p><?php echo $item['TITLE'];?></p>
        <a href="news/<?php echo $item['ID'];?>">ID <?php echo $item['ID'];?></a>
    <?php endforeach;?>
</body>
</html>