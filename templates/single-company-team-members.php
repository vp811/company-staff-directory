<?php get_header(); ?>

<div class="container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
      if(have_posts()){
        while (have_posts()) {
          the_post(); ?>

          <h2><?php the_title(); ?></h2>
          <div class="team-member-image">
            <?php the_post_thumbnail('medium'); ?>
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
              <?php }

              if(!empty(get_field('team-member-office'))){ ?>
                <div class="team-member-office">
                  <?php the_field('team-member-office'); ?>
                </div>
              <?php }

              if(!empty(get_field('team-member-bio'))){ ?>
                <div class="team-member-bio">
                  <?php the_field('team-member-bio'); ?>
                </div>
              <?php } ?>
          </div>


        <?php }
      }
    ?>
  </article>
</div>
<?php get_footer(); ?>
