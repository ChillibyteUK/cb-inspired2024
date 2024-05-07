<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main" class="padding-top">
<?php
$bg = get_stylesheet_directory_uri() . '/img/gy-404-pexels-kelly-3119957.jpg';
?>    
<section class="short-hero d-flex"
    style="background-image:url(<?=$bg?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-md-6 position-relative">
                <div class="overlay--light"></div>
                <h1>
                    404 - Page Not Found
                </h1>
            </div>
        </div>
    </div>
</section>
<div class="container-xl pb-5">
    <div class="text-center">
        <div class="pb-4 h3">Oops, sorry, nothing growing here!</div>
        <a href="/" target="" class="btn btn-primary">Return to Homepage</a>
    </div>
</div>
<?php
include get_stylesheet_directory() . '/page-templates/blocks/cb_latest_news.php';

?>
</main>
<?php
get_footer();