<?php
$videoUrl = get_field('video');
?>
<section class="video_hero position-relative overflow-hidden vh-100">
    <video class="position-absolute top-50 start-50 translate-middle w-100 h-100 object-fit-cover" autoplay muted loop playsinline>
        <source src="<?=$videoUrl?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</section>