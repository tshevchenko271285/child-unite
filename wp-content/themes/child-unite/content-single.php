<?php
/**
 * @package unite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">

        <?php 
                    if ( of_get_option( 'single_post_image', 1 ) == 1 ) :
                        the_post_thumbnail( 'unite-featured', array( 'class' => 'thumbnail' )); 
                    endif;
                  ?>

        <h1 class="entry-title "><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php unite_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'unite' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        <?php
            /* translators: used between list items, there is a space after the comma */
            $category_list = get_the_category_list( __( ', ', 'unite' ) );

            /* translators: used between list items, there is a space after the comma */
            $tag_list = get_the_tag_list( '', __( ', ', 'unite' ) );

            if ( ! unite_categorized_blog() ) {
                // This blog only has 1 category so we just need to worry about tags in the meta text
                if ( '' != $tag_list ) {
                    $meta_text = '<i class="fa fa-folder-open-o"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
                } else {
                    $meta_text = '<i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
                }

            } else {
                // But this blog has loads of categories so we should probably display them here
                if ( '' != $tag_list ) {
                    $meta_text = '<i class="fa fa-folder-open-o"></i> %1$s <i class="fa fa-tags"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
                } else {
                    $meta_text = '<i class="fa fa-folder-open-o"></i> %1$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
                }

            } // end check for categories on this blog
        ?>
        <div class="row">
            <!-- Output Taxonomy Country -->
            <?php if ( taxonomy_exists( 'unite_countries' ) ): ?>
                <?php if ( $terms = get_the_terms( $id, 'unite_countries' ) ): ?>
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <span>Страна: </span>
                        
                    <?php $terms = get_the_terms( $id, 'unite_countries' ); ?>
                    <?php foreach ($terms as $term): ?>
                        <a href="<?php echo get_term_link( $term->name, 'unite_countries' ) ?>"><?php echo $term->name ?></a>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
            <?php endif ?>

            <!-- Output Taxonomy Ganre -->
            <?php if ( taxonomy_exists( 'unite_ganre' ) ): ?>
                <?php if ( $terms = get_the_terms( $id, 'unite_ganre' ) ): ?>
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
                    <span>Жанр: </span>
                    <?php foreach ($terms as $term): ?>
                        <a href="<?php echo get_term_link( $term->name, 'unite_ganre' ) ?>"><?php echo $term->name ?></a>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
            <?php endif ?>

            <!-- Output Custom Field Price -->
            <?php if ( $price = get_post_meta($id, 'value' ) ): ?>
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
                    <span class="label">Цена: </span>
                    <?php if ( is_array( $price ) ): ?>
                        <?php foreach ($price as $value): ?>
                            <span><?php echo $value ?> грн. </span>
                        <?php endforeach ?>
                    <?php else: ?>
                        <span><?php echo $price ?> грн. </span>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <!-- Output Custom Field Date -->
            <?php if ( $date = get_post_meta($id, 'date' ) ): ?>
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <span class="label">Дата: </span>
                    <?php if ( is_array( $date ) ): ?>
                        <?php foreach ($date as $value): ?>
                            <span><?php echo $value ?></span>
                        <?php endforeach ?>
                    <?php else: ?>
                        <span><?php echo $date ?></span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </div>
        <?php 
            printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink()
            );
        ?>
        <?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
        <?php unite_setPostViews(get_the_ID()); ?>
        <hr class="section-divider">
    </footer><!-- .entry-meta -->
</article><!-- #post-## -->
