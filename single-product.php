<?php
$styleplaceholder=TD."/asset/css/single-product.css";
include 'header.php';
?>

    <link rel="stylesheet" href="<?php echo TD;?>/slidebar/owl.theme.default.min.css">
    <script href="<?php echo TD;?>/slidebar/owl.carousel.min.js"></script>
<?php
if(have_posts()){
    while(have_posts()){
        the_post();
        $product_id = get_the_ID();
        global $product;
        ?>
        <div class="container">
            <?php wc_print_notices(); ?>
            <div class="single-product-top">
                <div class="right-top-single-product">
                    <div class="slideshow-container">
                        <div class="owl-carousel owl-theme" id="gallery-product">
                            <?php
                            $product_imgs = [];
                            $image_id = $product->get_image_id();
                            $image_url = wp_get_attachment_image_url($image_id , 'full');
                            array_push($product_imgs , $image_url);

                            $gallery_ids = $product->get_gallery_image_ids();
                            foreach($gallery_ids as $item){
                                $item_url = wp_get_attachment_image_url($item , 'full');
                                array_push($product_imgs , $item_url);
                            }
                            $counter = 1;
                            foreach($product_imgs as $any_pic){ ?>
                                <div class="mySlides fade zoom-area" id="zoom-area-<?php echo $counter; ?>">
                                    <div class="large" id="large-<?php echo $counter; ?>"></div>
                                    <img src="<?php echo $any_pic; ?>" style="width:100%" id="small-<?php echo $counter; ?>" class="small">

                                </div>
                                <?php
                                $counter++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="left-top-single-product">
                    <div class="product-info">
                        <h1><?php echo get_the_title(); ?></h1>
                        <?php
                        $terms = get_the_terms($product_id , 'product_cat');
                        foreach($terms as $term){ ?>
                            <a class="product-cat" href="<?php echo get_term_link($term); ?>">
                                <?php echo $term->name; ?>
                            </a>
                        <?php }
                        ?>
                    </div>
                    <div class="single-page-price-box">
                        <?php
                        woocommerce_template_single_add_to_cart();
                        woocommerce_template_single_price();
                        ?>
                    </div>
                </div>
            </div>
            <div class="tabs-box">
                <div class="tabs-link">
                    <p class="tab_link" data-reltab="info-table-content" id="info-table-tab">مشخات</p>
                    <p class="tab_link" data-reltab="description-content" id="description">توضیحات</p>
                    <p class="tab_link" data-reltab="comment-content" id="comment-tab">نظرات</p>
                </div>
                <div class="tabs_content">
                    <div class="tab_content" id="info-table-content">
                        <table class="info-table">
                            <?php
                            $product = wc_get_product();
                            $attributes = $product->get_attributes();
                            foreach($attributes as $att){
                                ?>
                                <tr>
                                    <td><?php echo wc_attribute_label($att['name']); ?></td>
                                    <td><?php echo $product->get_attribute($att['name']); ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="tab_content" id="description-content">
                        <?php echo wpautop(get_the_content()); ?>
                    </div>
                    <div class="tab_content" id="comment-content">
                        <?php comments_template(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
    <script src="<?php echo TD; ?> /asset/js/single-product.js"></script>

<?php

include 'footer.php';
?>