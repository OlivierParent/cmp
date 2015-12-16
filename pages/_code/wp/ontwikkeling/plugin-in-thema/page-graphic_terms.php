<?php
/*
 * Template Name: Graphic Terms
 * Description: Toont een overzicht van alle grafische termen.
 */

$args = array(
    'post_type'      => 'graphic_term', // Vraagt alle posts op van het Custom Post Type 'graphic_term'
    'post_status'    => 'publish', // filtert de posts: toont alleen posts die als  'publish' (gepubliceerd) als statuscode hebben.
    'posts_per_page' =>  1000,
//    'meta_key'       => 'graphic_term_fr',
//    'meta_value'
//    'orderby'        => 'meta_value_num',
    'order'          => 'ASC', // sorteer: 'ASC' (ascending) of'DESC' (descending)
);

$the_query = new WP_Query( $args ); // @link https://developer.wordpress.org/reference/classes/wp_query/

// var_dump($the_query); // Toont de inhoud van: $the_qeury

// @link https://developer.wordpress.org/reference/functions/remove_filter/
remove_filter ('the_content',  'wpautop'); // Verwijder de automatische toevoeging van <p>-elementen.

?>
<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">

    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NL</th>
                    <th scope="col">FR</th>
                    <th scope="col">EN</th>
                    <th scope="col">DE</th>
                </tr>
            </thead>
            <tbody>
            <?php while ( $the_query->have_posts() ) :  // @link https://developer.wordpress.org/reference/classes/wp_query/have_posts/
                    $the_query->the_post();             // @link https://developer.wordpress.org/reference/classes/wp_query/the_post/
            ?>
                <tr class="active">
                    <th rowspan="2" scope="row"><a href="<?php the_permalink(); // @link https://developer.wordpress.org/reference/functions/the_permalink/ ?>"><?php the_title(); // @link https://developer.wordpress.org/reference/functions/the_title/ ?></a></th>
                    <?php foreach ( ['fr', 'en', 'de'] as $lang ) : ?>
                    <td lang="<?php echo $lang; ?>"><?php
                        $id  = get_the_ID(); // @link https://developer.wordpress.org/reference/functions/get_the_id/
                        $key = 'graphic_term_' . $lang;
                        echo get_post_meta( $id, $key, true ); // @link @link https://developer.wordpress.org/reference/functions/get_post_meta/ ?></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td colspan="3" class="" lang="nl"><small><span class="glyphicon glyphicon-info-sign"></span> <?php the_content(); ?></small></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php //get the right sidebar ?>
    <?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
