<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">

    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
            <div <?php post_class(); ?>>
                <h2 class="page-header"><?php the_title() ;?></h2>
                <?php the_content(); ?>
                <?php
                $graphic_term_translation = array(
                    'français' => esc_html( get_post_meta( get_the_ID(), 'graphic_term_fr', true ) ),
                    'English'  => esc_html( get_post_meta( get_the_ID(), 'graphic_term_en', true ) ),
                    'Deutsch'  => esc_html( get_post_meta( get_the_ID(), 'graphic_term_de', true ) ),
                );
                ?>
                <div class="alert alert-info">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Taal</th>
                                <th scope="col">Vertaling</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($graphic_term_translation as $sleutel => $waarde) : ?>
                            <tr>
                                <th scope="row"><?php echo $sleutel; ?></th>
                                <td><?php echo $waarde; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

    </div>

    <?php //get the right sidebar ?>
    <?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>

