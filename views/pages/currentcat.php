<?php
include(dirname(__FILE__) . '/../../views/partials/maintop.php');
include(dirname(__FILE__) . '/../../views/partials/header.php');
include(dirname(__FILE__) . '/../../views/partials/navbar.php');
$i=0;
?>

    <div class="container">
        <h1 style="text-align: center; padding: 3%;">Category: <?php echo $data[0]['category'] ?></h1>
        <div class="row">&nbsp;</div>
        <?php foreach ($data as $feed) {?>
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent<?php echo $i ?>">
                <div class="bg-dark p-4">
                    <span class="text-muted"><?php echo $feed['description']; ?></span><br><br>
                    <a href="<?php echo $feed['link'] ?>" class="text-muted"><?php echo $feed['link']; ?></a>
                    <br>
                    <span class="text-muted"><?php echo $feed['pubDate']; ?></span>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <h4 class="text-white"><?php echo $feed['title']; ?></h4>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarToggleExternalContent<?php echo $i ?>"
                        aria-controls="navbarToggleExternalContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
            <div class="row">&nbsp;</div>
        <?php $i++; } ?>
    </div>
<?php
include(dirname(__FILE__) . '/../../views/partials/footer.php');
include(dirname(__FILE__) . '/../../views/partials/mainbottom.php');




