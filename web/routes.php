<?php
$url = '';

Route::set('', function () {
    CategoriesController::CreateView(
        CategoriesController::listAll(), 'categories'
    );
});

if (isset($_GET['url']) && is_string($_GET['url']) && preg_match('/^[a-z_]+$/i',$_GET['url'])) {
    Route::set($_GET['url'], function () {
        CurrentcatController::CreateView(
            CurrentcatController::currentcategory($_GET['url']), 'currentcat'
        );
    });
}
