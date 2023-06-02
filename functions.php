<?php
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
    echo 'محتوای مربوط به تنظیمات قالب';
}
function style_theme_function(){
   echo 'محتوای مروبوط به استایل های قالب';
}
?>