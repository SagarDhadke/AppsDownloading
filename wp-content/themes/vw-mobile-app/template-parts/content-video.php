<?php
/**
 * The template part for displaying Post
 *
 * @package VW Mobile App 
 * @subpackage vw_mobile_app
 * @since VW Mobile App 1.0
 */
?>
<?php 
  $vw_mobile_app_archive_year  = get_the_time('Y'); 
  $vw_mobile_app_archive_month = get_the_time('m'); 
  $vw_mobile_app_archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box ">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $video ) ) {
          foreach ( $video as $video_html ) {
            echo '<div class="entry-video">';
              echo $video_html;
            echo '</div>';
          }
        };
      };
    ?>
    <div class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'vw_mobile_app_toggle_postdate',true) != '' || get_theme_mod( 'vw_mobile_app_toggle_author',true) != '' || get_theme_mod( 'vw_mobile_app_toggle_comments',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('vw_mobile_app_toggle_postdate',true)==1){ ?>
             <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_mobile_app_archive_year, $vw_mobile_app_archive_month, $vw_mobile_app_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_mobile_app_toggle_author',true)==1){ ?>
            <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_mobile_app_toggle_comments',true)==1){ ?>
            <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-mobile-app'), __('0 Comments', 'vw-mobile-app'), __('% Comments', 'vw-mobile-app') ); ?> </span>
          <?php } ?>
          <hr>
        </div> 
      <?php } ?>     
      <div class="entry-content">
        <p>
          <?php $vw_mobile_app_theme_lay = get_theme_mod( 'vw_mobile_app_excerpt_settings','Excerpt');
          if($vw_mobile_app_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($vw_mobile_app_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $excerpt = get_the_excerpt(); echo esc_html( vw_mobile_app_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_mobile_app_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_mobile_app_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
      </div>
      <?php if( get_theme_mod('vw_mobile_app_button_text','READ MORE') != ''){ ?>
        <a class="content-bttn" href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html(get_theme_mod('vw_mobile_app_button_text',__('READ MORE','vw-mobile-app')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_mobile_app_button_text',__('READ MORE','vw-mobile-app')));?></span></a>
      <?php } ?>
    </div>
  </div>
</article>