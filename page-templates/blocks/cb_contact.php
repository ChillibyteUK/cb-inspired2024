<section class="contact">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6">
                <h2 class="h4 mb-4">Contact Details</h2>
                <ul class="fa-ul">
                    <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <a
                            href="mailto:<?=get_field('contact_email', 'options')?>"><?=get_field('contact_email', 'options')?></a>
                    </li>
                    <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-phone"></i></span>  Jude: <a
                    href="tel:<?=parse_phone(get_field('contact_judith', 'options'))?>"><?=get_field('contact_judith', 'options')?></a>
                    </li>
                    <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-phone"></i></span> Emily: <a
                            href="tel:<?=parse_phone(get_field('contact_emily', 'options'))?>"><?=get_field('contact_emily', 'options')?></a>
                    </li>
                </ul>
                <h2 class="h4 mb-4">Connect</h2>
                <div class="contact__socials">
                    <?php
                    $s = get_field('social','options');
                    ?>
                    <a href="<?=$s['instagram_url']?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?=$s['facebook_url']?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="<?=$s['linkedin_url']?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <?=do_shortcode('[gravityform id="' . get_field('form_id') . '" title="false"]')?>
            </div>
        </div>
    </div>
</section>