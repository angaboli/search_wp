<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head() ?>
</head>
<body>
    <div class="container">
        <a href="/"><h1>Tagwalk</h1></a>
        <div class="search">
            <?= get_search_form() ?>

        </div>
        <div class="menu">
            <a href="<?= get_post_type_archive_link('gallery'); ?>">Gallery</a>
            
        </div>


    
