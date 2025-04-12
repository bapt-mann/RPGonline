<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>RPG online</title>
    <link rel="stylesheet" href="<?= URL ?>public/assets/css/style.css" />
    <?php
    if(isset($css) && count($css) > 0){
        foreach($css as $file){
            echo "<link rel=\"stylesheet\" href=\"".URL."public/assets/css/$file.css\"/>";
        }
    }
    ?>

</head>

<body>
    <main>
        <?php
        echo $content_for_layout;
        ?>
    </main>
</body>
<footer>

</footer>

</html>