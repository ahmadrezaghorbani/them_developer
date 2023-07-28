<?php
if(!defined('ABSPATH')){
    die();
}
define('TD',get_template_directory_uri());


add_action('after_setup_theme','my_theme_register_menu');
$register_nav_menus=['primary'=>'منوی اصلی'];
function my_theme_register_menu(){
    global $register_nav_menus;
    register_nav_menus($register_nav_menus);
}


add_action('after_setup_theme' , 'widget_setup_for_theme');
function widget_setup_for_theme(){
    add_theme_support('widgets');
    add_theme_support('post-thumbnails');
}
add_action('widgets_init' , 'register_my_theme_widgets');
function register_my_theme_widgets(){
    register_sidebar(array(
        'name'=>'footer col 1',
        'id'=>'footer_col_1',
        'before_widget'=>'<div class="footer_col_widget">',
        'after_widget'=>'</div>',
        'before_widget'=>'<h3 class="footer_col_title">',
        'after_widget'=>'</h3>'
    ));
    register_sidebar(array(
        'name'=>'footer col 2',
        'id'=>'footer_col_2',
        'before_widget'=>'<div class="footer_col_widget">',
        'after_widget'=>'</div>',
        'before_widget'=>'<h3 class="footer_col_title">',
        'after_widget'=>'</h3>'
    ));
    register_sidebar(array(
        'name'=>'footer col 3',
        'id'=>'footer_col_3',
        'before_widget'=>'<div class="footer_col_widget">',
        'after_widget'=>'</div>',
        'before_widget'=>'<h3 class="footer_col_title">',
        'after_widget'=>'</h3>'
    ));
    register_sidebar(array(
        'name'=>'footer col 4',
        'id'=>'footer_col_4',
        'before_widget'=>'<div class="footer_col_widget">',
        'after_widget'=>'</div>',
        'before_widget'=>'<h3 class="footer_col_title">',
        'after_widget'=>'</h3>'
    ));
    register_sidebar(array(
        'name'=>'blog widget',
        'id'=>'blog_sidebar_widget',
        'before_widget'=>'<div class="blog_sidebar_widget">',
        'after_widget'=>'</div>',
        'before_title'=>'<h3 class="blog_sidebar_title">',
        'after_title'=>'</h3>'
    ));
}
add_action('admin_menu','add_custom_menu');
function add_custom_menu(){
    add_menu_page('تنظیمات قالب','تنظیمات قالب','manage_options','theme_setting','setting_theme_function','dashicons-admin-tools',12);
    add_submenu_page('theme_setting','استایل های قالب','استایل های قالب','manage_options','theme_styles','style_theme_function');
}
function setting_theme_function(){
include 'admin_templates/setting.php';
}
function style_theme_function(){
    include 'admin_templates/styles.php';
}

add_action('after_switch_theme','creat_custom_table');

function creat_custom_table(){
    require_once (ABSPATH.'wp-admin/includes/upgrade.php');


    $sql="CREATE TABLE theme_sttinge(
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    record_key varchar(255) DEFAULT NULL,
    record_value varchar(255) DEFAULT NULL,
    PRIMARY KEY(id)) ENGINE = INNODB DEFAULT CHARSET=utf8;";
    dbdelta($sql);
}
function custom_checkout_fields($fields){
    //var_dump($fields);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);

    $fields['billing']['billing_first_name']=[
        'label'=>'نام و نام خانوادگی',
        'required'=>true,
        'placeholder'=>'fname and lname '
    ];

    $fields['billing']['billing_email']['priority']= 3;
    $fields['billing']['billing_phone']['priority']= 2;

    return $fields;
}
add_filter('woocommerce_checkout_fields','custom_checkout_fields');

add_shortcode('woo_cart_shortcode','card_shortcode_callback');

function card_shortcode_callback(){
    $cart_count=wc()->cart->cart_contents_count;
    $cart_url=wc_get_cart_url();

    global $woocommerce;

    $cart_items=$woocommerce->cart->get_cart();
?>
<div class="cart_item_section">
    <a href="<?php echo $cart_url; ?>" class="cart_links">سبد خرید</a>
</div>
    <?php
    if($cart_count > 0){
    ?>
        <ul class="cart_item_list">
            <?php foreach ($cart_items as $item){
            $_product=wc_get_product($item['data']->get_id());
            ?>
            <li><?php echo $_product->get_title(); ?>
                <li><?php echo $item['quantity']; ?>عدد</li>
                <?php } ?>
        </ul>
<?php }else{echo "سبد شما خالی است";} } ?>
<?php
/*شخصی سازی منوهای پنل کاربری وساخته صفحه اختصاصی برای آن*/
function my_account_menu_order($menu_items){

  /*  $reordered_items = array(
        'dashboard' => __('Dashboard', 'woocommerce'),
        'downloads' => __('Download', 'woocommerce'),
        'edit-address' => __('Addresses', 'woocommerce'),
        'edit-account' => __('جزعیات حساب', 'woocommerce'),
        'customer-logout' => __('Logout', 'woocommerce'),
        'notifications' => __('اعلانات', 'woocommerce'),
        'orders' => __('Orders', 'woocommerce')
    );

    return $reordered_items;*/
    $newmenu=array_slice($menu_items,0,5,true)+
        ['notifications'=>'اعلانات']+array_slice($menu_items,5,1,true);
    return $newmenu;
}
add_filter('woocommerce_account_menu_items', 'my_account_menu_order');

function new_my_account_endpoint(){
    add_rewrite_endpoint('notifications',EP_PAGES);
}
add_action('init','new_my_account_endpoint');

function notifications_content(){
    get_template_part('notifications');
}
add_action('woocommerce_account_loyalty_endpoint','notifications_content');
?>
