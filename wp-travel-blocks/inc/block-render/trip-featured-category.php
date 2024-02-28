<?php

/**
 * 
 * Render Callback For Trip List
 * 
 */
function wptravel_block_trip_featured_category_render( $attributes, $content ){

    $selected_trip_types = isset( $attributes['query']['selectedTripTypes'] ) ? $attributes['query']['selectedTripTypes'] : [];
    $selected_trip_destinations = isset( $attributes['query']['selectedTripDestinations'] ) ? $attributes['query']['selectedTripDestinations'] : [];
    $selected_trip_activities = isset( $attributes['query']['selectedTripActivities'] ) ? $attributes['query']['selectedTripActivities'] : [];
    $layout = isset( $attributes['layout'] ) ? $attributes['layout'] : 'layout-one';

    $trip_term_slugs = [];
    $active_terms = [];
    
    if( $attributes['tripTax'] == 'itinerary_types' ) {
        $active_terms = $selected_trip_types;
    } else if ( $attributes['tripTax'] == "travel_locations" ) {
        $active_terms = $selected_trip_destinations;
    } else if ( $attributes['tripTax'] == "activity" ) {
        $active_terms = $selected_trip_activities;
    }

    foreach( $active_terms as $term ) {
        array_push($trip_term_slugs, $term["slug"]);
    }
    
	ob_start();

    if( !empty( $active_terms ) ) : ?>
        <div id="wptravel-blocks-featured-category-container">
        <?php foreach( $active_terms as $term ) {
            if( $layout == "layout-one" ) { ?>
                <div id="wp-travel-blocks-trip-featured-category" class="<?php echo $layout; ?>">
                    <div class="layout-handler">
                        <a href="<?php echo esc_url($term['link']); ?>">
                            <div class="wp-travel-blocks-trip-featured-category-img-container">
                                <img src="<?php echo esc_url( wp_get_attachment_url( get_term_meta( $term['id'], 'wp_travel_trip_type_image_id', true) ) ) ?>" alt="">
                            </div>
                        </a>
                        <div class="wp-travel-blocks-trip-featured-category-footer">
                            
                                <div class="wp-travel-blocks-trip-featured-category-left-info">
                                    <span><?php echo esc_html($term['name']); ?></span>
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            
                            <div class="wp-travel-blocks-trip-featured-category-right-info">
                                <i class="fas fa-suitcase-rolling"></i>
                                <span><?php echo esc_html($term['count']) . ' ' . __( 'Trips Available') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif ( $layout == "layout-two" ) { ?>
                <div id="wp-travel-blocks-trip-featured-category" class="<?php echo $layout; ?>">
                    <a href="<?php echo esc_url($term['link']); ?>">
                        <div class="wp-travel-blocks-trip-featured-category-img-container">
                            <img src="<?php echo esc_url( wp_get_attachment_url( get_term_meta( $term['id'], 'wp_travel_trip_type_image_id', true) ) ) ?>" alt="">
                            <div class="wp-travel-blocks-trip-featured-category-img-overlay-trip">
                                <i class="fas fa-suitcase-rolling"></i>
                                <span><?php echo esc_html($term['count']) . ' ' . __( 'Trips Available') ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="wp-travel-blocks-trip-featured-category-footer">
                        <div class="wp-travel-blocks-trip-featured-category-left-info">
                            <span><?php echo esc_html($term['name']); ?></span>
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            <?php } elseif ( $layout == "layout-three" ) { ?>
                <div id="wp-travel-blocks-trip-featured-category" class="<?php echo $layout; ?>">
                    <a href="<?php echo esc_url($term['link']); ?>">
                        <div class="wp-travel-blocks-trip-featured-category-img-container">
                            <img src="<?php echo esc_url( wp_get_attachment_url( get_term_meta( $term['id'], 'wp_travel_trip_type_image_id', true) ) ) ?>" alt="">
                        </div>
                        <div class="wp-travel-blocks-trip-featured-category-img-overlay-trip">
                            <div class="wp-travel-blocks-trip-featured-category-footer">
                                <div class="wp-travel-blocks-trip-info-container">
                                    <div class="wp-travel-blocks-trip-featured-category-left-info">
                                        <div class="wp-travel-blocks-trip-destination">
                                            <span><?php echo esc_html($term['name']); ?></span>
                                        </div>
                                        <i class="fas fa-suitcase-rolling"></i>
                                        <span class="wp-travel-blocks-trip-count"><?php echo esc_html($term['count']) . ' ' . __( 'Trips Available') ?></span> 
                                    </div>
                                    <div class="wp-travel-blocks-trip-featured-category-right-info">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } elseif ( $layout == "layout-four" ) { ?>
                <div id="wp-travel-blocks-trip-featured-category" class="<?php echo $layout; ?>">
                    <a href="<?php echo esc_url($term['link']); ?>">
                        <div class="wp-travel-blocks-trip-featured-category-img-container">
                            <img src="<?php echo esc_url( wp_get_attachment_url( get_term_meta( $term['id'], 'wp_travel_trip_type_image_id', true) ) ) ?>" alt="">
                        </div>
                        <div class="wp-travel-blocks-trip-featured-category-img-overlay-trip">
                            <div class="wp-travel-blocks-trip-featured-category-footer">
                                <div class="wp-travel-blocks-trip-info-container">
                                    <div class="wp-travel-blocks-trip-featured-category-left-info">
                                        <div class="wp-travel-blocks-trip-destination">
                                            <span><?php echo esc_html($term['name']); ?></span>
                                        </div>
                                        <i class="fas fa-suitcase-rolling"></i>
                                        <span class="wp-travel-blocks-trip-count"><?php echo esc_html($term['count']) . ' ' . __( 'Trips Available') ?></span> 
                                    </div>
                                </div>
                                <div class="wp-travel-blocks-trip-featured-category-bottom">
                                    <div class="wp-travel-blocks-trip-featured-category-arrow">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }
        } ?>
        </div>
    <?php endif;

	$html = ob_get_clean();

	return $html;
}