<?php
include(dirname(__FILE__) . '/../../views/partials/maintop.php');
include(dirname(__FILE__) . '/../../views/partials/header.php');
include(dirname(__FILE__) . '/../../views/partials/navbar.php');
$i=0;
?>
    <div class="container">
        <!-- Default form login -->
        <div class="row">
            <div class="col-lg-6">
                <div class="text-center border border-light p-5">
                    <p class="h4 mb-4">Categories</p>
                    <?php foreach ($data[0] as $information) {
                        echo '<a href="/task/' . $information['category'] . '"><button class="btn btn-info btn-block my-4" type="submit" >' . $information['category'] . '</button></a>';
                    }?>

                    <a type="button" class="light-blue-text mx-2">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a type="button" class="light-blue-text mx-2">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a type="button" class="light-blue-text mx-2">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <a type="button" class="light-blue-text mx-2">
                        <i class="fa fa-github"></i>
                    </a>

                </div>
                <!-- Default form login -->
            </div>
            <div class="col-lg-6">
                <p class="h4 mb-4 text-center" style="padding-top: 24px">Recent feed</p>
            <?php foreach ($data[1] as $information) { ?>
                <div class="pos-f-t border border-light p-5" style="padding: 5%;">
                    <div class="collapse" id="navbarToggleExternalContent<?php echo $i ?>">
                    <div class="bg-dark p-4">
                        <span class="text-muted"><?php echo $information['description']; ?></span><br><br>
                        <a href="<?php echo $information['link'] ?>" class="text-muted"><?php echo $information['link']; ?></a>
                        <br>
                        <span class="text-muted"><?php echo $information['pubDate']; ?></span>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <h4 class="text-white"><?php echo $information['title']; ?></h4>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarToggleExternalContent<?php echo $i ?>"
                            aria-controls="navbarToggleExternalContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
                </div>
    <?php $i++; } ?>
            </div>
        </div>
    </div>
    </div>


<?php
include(dirname(__FILE__) . '/../../views/partials/footer.php');
include(dirname(__FILE__) . '/../../views/partials/mainbottom.php');






