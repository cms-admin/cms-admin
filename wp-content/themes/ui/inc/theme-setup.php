<?php

add_action( 'after_setup_theme', 'ui_theme_setup' );

function ui_theme_setup()
{
  load_theme_textdomain( 'ui', get_template_directory() . '/languages' );

  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'title-tag' );

  add_theme_support( 'post-thumbnails' );

  set_post_thumbnail_size(320, 320, true );

  add_image_size( 'icon', 80, 80, true );
  add_image_size( 'thumb', 160, 160, true );
  add_image_size( 'small', 320, 320, true );
  add_image_size( 'medium', 640, 640, true );
  add_image_size( 'large', 1080, 1080, true );

  add_theme_support( 'html5', [
    'comment-form',
    'comment-list',
    'caption',
  ]);

  // Theme menus
  register_nav_menus([
    'primary' => tlang('Основное меню'),
  ]);
}
