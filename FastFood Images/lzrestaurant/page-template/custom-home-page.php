<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'lzrestaurant_above_slider' ); ?>

<?php if( get_theme_mod('lzrestaurant_slider_hide_show') != ''){ ?>
  <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'lzrestaurant_slider' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $pages[] = $mod;
              }
            }
            if( !empty($pages) ) :
            $args = array(
                'post_type' => 'page',
                'post__in' => $pages,
                'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                      <h2><?php the_title();?></h2>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( lzrestaurant_string_limit_words( $excerpt,20 ) ); ?></p>
                    <div class="read-btn">
                      <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'lzrestaurant' ); ?>"><?php esc_html_e('Read More','lzrestaurant'); ?>
                      </a>
                    </div>  
                  </div>
                </div>
            </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        </a>
      </div>  
      <div class="clearfix"></div>
  </section>
<?php }?>

<?php do_action( 'lzrestaurant_above_product_page' ); ?>

<?php if( get_theme_mod('lzrestaurant_title') != ''){ ?>
  <section id="feature-pro">
  	<div class="container">
        <?php if( get_theme_mod('lzrestaurant_title') != ''){ ?>
        	<h4><?php echo esc_html(get_theme_mod('lzrestaurant_title1','')); ?></h4>
            <h3><?php echo esc_html(get_theme_mod('lzrestaurant_title','')); ?></h3>
            <img src="<?php echo esc_url(get_theme_mod('food_restaurant_product_sec_border',get_template_directory_uri().'/assets/images/border.png')); ?>" alt="">
        <?php }?>

  			<?php $pages = array();
  			for ( $count = 0; $count <= 0; $count++ ) {
  				$mod = intval( get_theme_mod( 'lzrestaurant_product_page' . $count ));
  				if ( 'page-none-selected' != $mod ) {
  				  $pages[] = $mod;
  				}
  			}
  			if( !empty($pages) ) :
  			  $args = array(
  			    'post_type' => 'page',
  			    'post__in' => $pages,
  			    'orderby' => 'post__in'
  			  );
  			  $query = new WP_Query( $args );
  			  if ( $query->have_posts() ) :
  			    $count = 0;
  					while ( $query->have_posts() ) : $query->the_post(); ?>
  					    <div class="box-image">
  					        <p><?php the_content(); ?></p>
  					        <div class="clearfix"></div>
  					    </div>
  					<?php $count++; endwhile; ?>
  			  <?php else : ?>
  			      <div class="no-postfound"></div>
  			  <?php endif;
  			endif; 
  			wp_reset_postdata(); ?>
  	</div>
  </section>
<?php }?>

<?php do_action( 'lzrestaurant_below_product_page' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>