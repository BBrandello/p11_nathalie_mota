<?php
$args = array(
    'order_by' => 'post_date',
    'order' => 'DESC',
);
$prev_post = get_previous_post(false, '', 'category');
$next_post = get_next_post(false, '', 'category');
?>

<div class="navigation-preview-single-photo">
    <div class="prev-preview">
        <?php
        $prev_thumbnail = "";
        if ($prev_post) {
            $prev_thumbnail = get_the_post_thumbnail_url($prev_post->ID, 'thumbnail');
        }

        $next_thumbnail = "";
        if ($next_post) {
            $next_thumbnail = get_the_post_thumbnail_url($next_post->ID, 'thumbnail');
        }
        ?>
        <?php if ($prev_thumbnail): ?>
            <div class="prev-thumbnail">
                <img src="<?php echo $prev_thumbnail; ?>" id="preview-thumbnail"
                    data-original-thumbnail="<?php echo $prev_thumbnail; ?>">
            </div>
        <?php elseif ($next_thumbnail): ?>
            <div class="prev-thumbnail">
                <img src="<?php echo $next_thumbnail; ?>" id="preview-thumbnail"
                    data-original-thumbnail="<?php echo $next_thumbnail; ?>">
            </div>
        <?php endif; ?>
    </div>

    <div class="prev-and-next-post">
        <?php if ($next_post): ?>
            <div class="prev-post">
                <a href="<?php echo get_permalink($next_post->ID); ?>" data-image="<?php echo $next_thumbnail; ?>"
                    id="next-link">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($prev_post): ?>
            <div class="next-post">
                <a href="<?php echo get_permalink($prev_post->ID); ?>" data-image="<?php echo $prev_thumbnail; ?>"
                    id="prev-link">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>