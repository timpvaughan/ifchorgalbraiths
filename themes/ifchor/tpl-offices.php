<?php
/**
 * Template Name: Offices
 */
?>
<?php
get_header();
?>
<?php
$depts = get_option( 'ifchor_departments_by_city', [] );


$offices = get_option( 'ifchor_offices_by_city', [] );
if ( ! is_array( $offices ) ) {
	$offices = [];
}


$loc  = isset( $_REQUEST['loc'] ) ? sanitize_text_field( $_REQUEST['loc'] ) : 'ALL ';
$dept = isset( $_REQUEST['dept'] ) ? sanitize_text_field( $_REQUEST['dept'] ) : 'ALL ';
$loc  = trim( strtoupper( $loc ) );
$dept = trim( strtoupper( $dept ) );
if ( $loc == '' ) {
	$loc = 'ALL';
}
if ( $dept == '' ) {
	$dept = 'ALL';
}
?>
<div class="contacts-filter-section">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="about__subtitle">Regions</h3>
                <ul id="office_items_filters">
                    <li class="<?php echo esc_attr( office_items_filter_active_class( $loc, 'ALL' ) ) ?>"><a
                            href="<?php echo get_the_permalink(); ?>">All</a></li>
                    <li class="<?php echo esc_attr( office_items_filter_active_class( $loc, 'EMEA' ) ) ?>"><a
                            href="<?php echo office_items_filter_link( 'EMEA' ); ?>">EMEA</a></li>
                    <li class="<?php echo esc_attr( office_items_filter_active_class( $loc, 'APAC' ) ) ?>"><a
                            href="<?php echo office_items_filter_link( 'APAC' ); ?>">APAC</a></li>
                    <li class="<?php echo esc_attr( office_items_filter_active_class( $loc, 'NA' ) ) ?>"><a
                            href="<?php echo office_items_filter_link( 'NA' ); ?>">NA</a></li>
                </ul>
            </div>
            <div class="col-6">
                <h3 class="about__subtitle text-end">Departments</h3>
                <?php
					$offices_arr = [
						'ALL',
						'Capesize',
						'Dry Chartering North America',
						'Gas - LNG/LPG',
						'Geared Desk',
						'IG Sustainability',
						'Industrial Services and Business Development',
						'Offshore & Renewables',
						'Operations',
						'Panamax',
						'Panamax',
						'Research and Advisory',
						'S&P and Projects',
						'Tankers',
					];
					?>
                <div id="dept_items_filters_wrap">
                    <select name="dept" id="dept_items_filters">
                        <?php
		                    foreach ($offices_arr as $office_name){
			                    $office_name = trim( strtoupper( $office_name ) );

			                    $selected = ( $dept == $office_name ) ? ' selected="selected"' : "";

			                    echo '<option '.$selected.' value="'.$office_name.'">'.esc_html($office_name).'</option>';
		                    }
		                    ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div id="office_items" class="container">
        <div class="row">
            <div class="grid-col-3">
                <?php

					$counter = 0;

					foreach ( $offices as $office ) {

						$office_id = isset( $office['office_id'] ) ? absint( $office['office_id'] ) : 0;
						if ( ! $office_id ) {
							continue;
						}


						$area = isset( $office['area'] ) ? $office['area'] : '';
						$city = isset( $office['city'] ) ? $office['city'] : '';

						if ( $loc != 'ALL' ) {
							if ( $loc !== $area ) {
								continue;
							}
						}

						if ( $dept != 'ALL' ) {

							$cities_by_dept = isset( $depts[ $dept ] ) ? $depts[ $dept ] : [];
							if ( is_array( $cities_by_dept ) & count( $cities_by_dept ) ) {
								if ( ! in_array( $city, $cities_by_dept ) ) {
									continue;
								}
							}
						}


						$contacts_content_flags_url   = content_url( '/uploads/contacts/flags/' );
						$contacts_content_flags_url   = content_url( '/uploads/contacts/flags/' );
						$contacts_content_offices_url = content_url( '/uploads/contacts/offices/' );

						$contacts_content_dir         = trailingslashit( WP_CONTENT_DIR ) . 'uploads/contacts/';
						$contacts_content_flags_dir   = trailingslashit( WP_CONTENT_DIR ) . 'uploads/contacts/flags/';
						$contacts_content_offices_dir = trailingslashit( WP_CONTENT_DIR ) . 'uploads/contacts/offices/';


						$office_photo_url = '';//set default photo

						if ( file_exists( $contacts_content_offices_dir . $office_id . '.jpg' ) ) {
							$office_photo_url = $contacts_content_offices_url . $office_id . '.jpg';
						}

						$country         = isset( $office['country'] ) ? $office['country'] : '';
						$office_flag_url = '';
						if ( $country != '' ) {
							$office_country_sm = str_replace( '-', '_', sanitize_title( $country ) );

							//var_dump($contacts_content_flags_dir . $office_country_sm . '.png');

							if ( file_exists( $contacts_content_flags_dir . $office_country_sm . '.png' ) ) {
								$office_flag_url = $contacts_content_flags_url . $office_country_sm . '.png';
							}
						}

						echo '<div class="office_item">';

						if ( $office_photo_url != '' ) {
							echo '<img class="office_photo" src="' . esc_url( $office_photo_url ) . '" alt="Office photo" />';
						}

						echo '<div class="office_item_bottom">';


						if ( isset( $office['city'] ) && $office['city'] != '' ) {
							echo '<h2>' . esc_attr( $office['city'] );

							if ( $office_flag_url != '' ) {
								echo '<img src="' . esc_url( $office_flag_url ) . '" alt="country flag" />';
							}
							echo '</h2>';
						}

						if ( isset( $office['address'] ) && $office['address'] != '' ) {
							echo '<p class="office_address"><i class="fa-sharp fa-solid fa-location-dot"></i>' . esc_attr( $office['address'] ) . '</p>';
						}

						if ( isset( $office['telephone_number'] ) && $office['telephone_number'] != '' ) {
							echo '<p class="office_telephone_number"><i class="fa-solid fa-circle-phone"></i><a href="tel:' . esc_attr( $office['telephone_number'] ) . '">' . esc_attr( $office['telephone_number'] ) . '</a></p>';
						}

						if ( isset( $office['map_url'] ) && $office['map_url'] != '' ) {
							echo '<p class="office_dir_url"><i class="fa-solid fa-circle-chevron-right"></i><a href="' . esc_url( $office['map_url'] ) . '">Directions</a></p>';
						}

						if ( isset( $office['dir_url'] ) && $office['dir_url'] != '' ) {
							echo '<p class="office_telephone_number"><i class="fa-solid fa-circle-chevron-right"></i><a href="' . esc_url( $office['dir_url'] ) . '">Staff Directory</a></p>';
						}

						echo '</div>';

						echo '</div>';

						$counter ++;
					}

					if ( $counter == 0 ) {
						echo '<div class="col-md-12"><p class="no_office_found">No office found</p></div>';
					}
					?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
