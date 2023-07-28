<?php
include 'header.php';
?>
<div class="search_info">
    <?php
    if (have_posts()){
        while (have_posts()){
            the_post();

            $postTitle=get_the_title();
            $postID=get_the_id();
            $postThumbnail=get_the_post_thumbnail_url($postID);
            $postPermalink=get_the_permalink();
        }

    ?>
    <div class="box-search">
    <a href="<?php echo $postPermalink; ?>">
        <img src="<?php echo $postThumbnail; ?>">
        <p><?php echo $postTitle;?></p>
    </a>
    </div>
    <?php }
    else{
            $error_massage='فیلد مورد نظر پیدا نشد';
    ?>
    <p class="error_massage"><?php echo $error_massage;?></p>
    <?php } ?>
</div>
<?php
include 'footer.php';
?>

