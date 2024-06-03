<?php
$args = array(
    'order_by' => 'post_date',
    'order' => 'DESC',
);
$prev_post = get_previous_post(false, '', 'category', $args);
$next_post = get_next_post(false, '', 'category', $args);
?>

<div class="navigation-preview-single-photo">
    <?php if ($prev_post): ?>
        <div class="prev-preview">
            <?php $prev_thumbnail = get_the_post_thumbnail($prev_post->ID, 'thumbnail'); ?>
            <?php if ($prev_thumbnail): ?>
                <div class="prev-thumbnail">
                    <?php echo $prev_thumbnail; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="prev-and-next-post">
        <?php if ($next_post): ?>
            <div class="prev-post">
                <a href="<?php echo get_permalink($next_post->ID); ?>">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($prev_post): ?>
            <div class="next-post">
                <a href="<?php echo get_permalink($prev_post->ID); ?>">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>