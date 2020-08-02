<?php get_header(); ?>

<div class="container">
  <div class="row">
      <?php
        if(have_posts()){
          while (have_posts()) {
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="col-lg-4" <?php post_class(); ?>>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

              <div class="team-member-image">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
              </div>

              <div class="team-member-main-info">
                <?php
                  if(!empty(get_field('team-member-phone'))){ ?>
                    <div class="team-member-phone">
                      <p>Phone: <?php the_field('team-member-phone'); ?></p>
                    </div>
                  <?php }

                  if(!empty(get_field('team-member-email'))){ ?>
                    <div class="team-member-email">
                      <p>Email: <a href="mailto:<?php the_field('team-member-email'); ?>"><?php the_field('team-member-email'); ?></a>
                    </div>
                  <?php } ?>

              </div>
            </article>
          <?php } //end while
        }//end if
        ?>

  </div><!-- ROW -->
</div><!-- Container -->

<?php get_footer(); ?>
