<?php
$social_icons = [
    'houzz'     => of_get_option('houzz_url', ''),
    'twitter'	=> of_get_option('twitter_url', ''),
    'instagram'	=> of_get_option('instagram_url', ''),
    'facebook'	=> of_get_option('facebook_url', ''),
    'pinterest' => of_get_option('pinterest_url', ''),
];
?>

<ul class="icons footer-element">
    <?php
    foreach ($social_icons as $classname => $url) :
        if ( $url && $url != '' ) :
            ?>
            <li>
                <a class="social-icon-<?php echo $classname; ?>" target="_blank" href="<?php echo $url ?>">
                    <i class="fa fa-<?php echo $classname; ?> fa-2x fa-fw"></i>
                </a>
            </li>
        <?php
        endif;
    endforeach;
    ?>
</ul>
