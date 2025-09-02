<?php
get_header();

$offices            = get_option('ifchor_offices', []);
$departments        = get_option('ifchor_departments', []);
$departments_unique = array_values(get_option('ifchor_departments_unique', []));

$contact_city       = isset($_REQUEST['contact_city']) ? esc_attr(wp_unslash($_REQUEST['contact_city'])) : '';
$contact_department = isset($_REQUEST['contact_department']) ? esc_attr(wp_unslash($_REQUEST['contact_department'])) : '';
$contact_name       = isset($_REQUEST['contact_name']) ? esc_attr(wp_unslash($_REQUEST['contact_name'])) : '';


?>
<div id="main-content-wrapper" class="blog-details">
    <div class="container">
        <div class="row">



            <div class="col-lg-12">

                <div class="contact-items">
                    <?php
                $contacts_content_url        = content_url('/uploads/contacts/');
                $contacts_content_flags_url  = content_url('/uploads/contacts/flags/');
                $contacts_content_photos_url = content_url('/uploads/contacts/photos/');
                $contacts_content_dept_url   = content_url('/uploads/contacts/departments/');

                $contacts_content_dir        = trailingslashit(WP_CONTENT_DIR).'uploads/contacts/';
                $contacts_content_flags_dir  = trailingslashit(WP_CONTENT_DIR).'uploads/contacts/flags/';
                $contacts_content_photos_dir = trailingslashit(WP_CONTENT_DIR).'uploads/contacts/photos/';
                $contacts_content_dept_dir   = trailingslashit(WP_CONTENT_DIR).'uploads/contacts/departments/';

                if (have_posts()) :
                    while (have_posts()) : the_post();

                        $title = get_the_title();

                        // Get meta field values with get_post_meta()
                        $city       = get_post_meta(get_the_ID(), '_contact_city', true);
                        $department = get_post_meta(get_the_ID(), '_contact_department', true);
                        $others     = get_post_meta(get_the_ID(), '_contact_others', true);

                        $country   = isset($others['_contact_country']) ? $others['_contact_country'] : '';
                        $email     = isset($others['_contact_email']) ? $others['_contact_email'] : '';
                        $telephone = isset($others['_contact_telephone_number']) ? $others['_contact_telephone_number'] : '';
                        $id        = isset($others['_contact_id']) ? intval($others['_contact_id']) : 0;
                        $show_dept        = isset($others['_show_dept']) ? intval($others['_show_dept']) : 1;

                        //get department info from department
                        $department_info = isset($departments[$department.'---'.$city]) ? $departments[$department.'---'.$city] : [];


                       /* print_r($department.'---'.$city);
                        print_r($department);
                        print_r($city);


                        echo '<pre>';
                        print_r($department_info);
                        echo '</pre>';*/

                        $department_telephone = isset($department_info['telephone_number']) ? $department_info['telephone_number'] : '';
                        $department_email     = isset($department_info['email']) ? $department_info['email'] : '';

                        //get office info from city
                        $office_info             = isset($offices[$city]) ? $offices[$city] : '';
                        $office_country          = isset($office_info['country']) ? $office_info['country'] : '';
                        $office_address          = isset($office_info['address']) ? $office_info['address'] : '';
                        $office_telephone_number = isset($office_info['telephone_number']) ? $office_info['telephone_number'] : '';

                        $office_flag       = '';
                        $office_country_sm = '';
                        if ($office_country != '') {
                            $office_country_sm = str_replace('-', '_', sanitize_title($office_country));

                            if (file_exists($contacts_content_flags_dir.$office_country_sm.'.png')) {
                                $office_flag = $contacts_content_flags_url.$office_country_sm.'.png';
                            }

                        }//end flag checking

                        $photo_url = '';
                        $qr_url    = '';


                        if ($id > 0) {
                            /*if ( file_exists( $contacts_content_photos_dir . 'Photo_' . $id . '.jpg' ) ) {
                                $photo_url = $contacts_content_photos_url . 'Photo_' . $id . '.jpg';
                            } else {
                                $photo_url = get_template_directory_uri() . '/assets/images/contact_photo.png';
                            }*/

                            $department_alt = trim($department);
                            $department_alt = sanitize_title($department_alt);

                            //$department_alt = str_replace('&', '', $department_alt);
                            //$department_alt = str_replace(' ', '-', $department_alt);


                            //for now we will show dept photo
                            //if (file_exists($contacts_content_dept_dir.'IG-'.$department_alt.'.svg')) {
                                $photo_url = $contacts_content_dept_url.'IG-'.$department_alt.'.svg';
                            //} else {
                              //  $photo_url = get_template_directory_uri().'/assets/images/contact_photo.png';
                            //}


                            if (file_exists($contacts_content_photos_dir.'qr_'.$id.'.svg')) {
                                $qr_url = $contacts_content_photos_url.'qr_'.$id.'.svg';
                            }
                        }

                        ?>

                    <div class="contact-item" data-aos="fade-up">
                        <div class="contact-image">
                            <?php if ($photo_url != '') { ?>
                            <?php if ($photo_url != '') {
                                        ?>
                            <div class="contact-main-image">
                                <img src="<?php echo esc_url($photo_url); ?>"
                                    title="<?php echo esc_attr(the_title()); ?>"
                                    alt="<?php echo esc_attr($title); ?>" />
                            </div>
                            <?php
                                    } ?>
                            <?php if ($qr_url != '') { ?>
                            <div class="contact-qrcode">
                                <img src="<?php echo esc_url($qr_url); ?>" alt="<?php echo esc_attr($title); ?>" />
                            </div>
                            <!--<span class="show-qr-code"><?php /*echo esc_html__('Click fo QR Code', 'ifchor'); */?></span>-->
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="contact-info-wrapper">
                            <div class="contact-info__left">
                                <h3 class="contact-info__name"><?php echo $title; ?></h3>


                                <?php if ($email) : ?>
                                <p class="contact-info__email">
                                    <span class="text-bold"><?php echo esc_html__('E', 'ifchor') ?></span>
                                    <?php echo esc_html($email); ?>
                                </p>
                                <?php endif; ?>
                                <?php if($show_dept && $department != ''): ?>
                                <div class="contact-info">
                                    <!--h4 class="contact-info_title">
                                        <svg id="Group_2" data-name="Group 2" xmlns="http://www.w3.org/2000/svg"
                                            width="50" height="50" viewBox="0 0 50 50">
                                            <path id="Path_21" data-name="Path 21"
                                                d="M-176.074-176.074a21.168,21.168,0,0,1-29.936,0,21.168,21.168,0,0,1,0-29.936,21.167,21.167,0,0,1,29.936,0,21.167,21.167,0,0,1,0,29.936m2.71-32.646a25,25,0,0,0-35.355,0,25,25,0,0,0,0,35.355,25,25,0,0,0,35.355,0,25,25,0,0,0,0-35.355"
                                                transform="translate(216.042 216.042)" fill="#fec10d" />
                                            <path id="Path_23" data-name="Path 23"
                                                d="M-25.667-77.174V-92.2h1.91v-3.572h-8.1V-92.2h1.91v15.029h-1.91V-73.6h8.1v-3.573Z"
                                                transform="translate(42.331 109.688)" fill="#fec10d" />
                                            <path id="Path_24" data-name="Path 24"
                                                d="M-46.921-93.522A11.3,11.3,0,0,1-58.23-104.793a11.3,11.3,0,0,1,11.309-11.271,11.33,11.33,0,0,1,7.352,2.71l.057.049-3.021,3.011-.049-.038a7,7,0,0,0-4.339-1.49,7.049,7.049,0,0,0-7.054,7.029,7.05,7.05,0,0,0,7.054,7.029,7,7,0,0,0,5.1-2.179v-2.415H-46.99v-.011a.214.214,0,0,1-.144-.2.214.214,0,0,1,.063-.151l3.805-3.8h5.633l-.006,8.166-.013.018a11.337,11.337,0,0,1-9.27,4.817"
                                                transform="translate(77.905 129.793)" fill="#fec10d" />
                                        </svg>
                                        <?php echo $department; ?>
                                    </h4-->

                                    <?php if ($department_telephone) : ?>
                                    <p class="contact-info__phone">
                                        <span class="text-bold"><?php echo esc_html__('T', 'ifchor') ?></span>
                                        <?php echo esc_html($department_telephone); ?>
                                    </p>
                                    <?php endif; ?>

                                    <?php if ($department_email) : ?>
                                    <p class="contact-info__email">
                                        <span class="text-bold"><?php echo esc_html__('E', 'ifchor') ?></span>
                                        <?php echo esc_html($department_email); ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="contact-info__right">
                                <?php if ($office_flag != ''): ?>
                                <div class="contact-info__flag">
                                    <img src="<?php echo esc_url($office_flag); ?>"
                                        alt="<?php echo esc_attr($title); ?>" width="34" height="34" />
                                </div>
                                <?php endif; ?>
                                <?php if ($city) : ?>
                                <h4 class="contact-info_title"><?php echo esc_html($city); ?></h4>
                                <?php endif; ?>
                                <?php if ($office_address) : ?>
                                <p class="contact-info__location"><?php echo esc_html($office_address); ?></p>
                                <?php endif; ?>
                                <?php if ($office_telephone_number) : ?>
                                <p class="contact-info__phone">
                                    <span class="contact-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15.589" height="20.358"
                                            viewBox="0 0 15.589 20.358">
                                            <defs>
                                                <clipPath id="clip-path">
                                                    <rect id="Rectangle_211" data-name="Rectangle 211" width="15.589"
                                                        height="20.358" fill="#fff" />
                                                </clipPath>
                                            </defs>
                                            <g id="Group_6259" data-name="Group 6259" transform="translate(0 0)">
                                                <g id="Group_6259-2" data-name="Group 6259" transform="translate(0 0)"
                                                    clip-path="url(#clip-path)">
                                                    <path id="Path_8977" data-name="Path 8977"
                                                        d="M15.134,16.07l-2.884-2.9-.133-.12-.027-.007a1.679,1.679,0,0,0-.578-.263,1.7,1.7,0,0,0-1.233.135l-1.167.7L9.08,13.6a2.228,2.228,0,0,1-.431-.329,7.915,7.915,0,0,1-.794-.861,11.547,11.547,0,0,1-1.031-1.555,11.278,11.278,0,0,1-.842-1.633,7.48,7.48,0,0,1-.357-1.115,3.2,3.2,0,0,1-.085-.586l.947-.557a1.717,1.717,0,0,0,.677-.733,1.476,1.476,0,0,0,.12-1.041L6.331,1.126l-.013-.047A1.864,1.864,0,0,0,6,.488,1.262,1.262,0,0,0,5.315.044,1.4,1.4,0,0,0,4.236.207L1.3,1.932A1.97,1.97,0,0,0,.727,2.4a2.357,2.357,0,0,0-.385.616l-.025.074q-.014.049-.1.322A5.015,5.015,0,0,0,.033,4.429a9.912,9.912,0,0,0-.011,1.5,12.069,12.069,0,0,0,.31,2,17.739,17.739,0,0,0,.8,2.474A20.557,20.557,0,0,0,2.6,13.337,19.607,19.607,0,0,0,4.96,16.662a16.514,16.514,0,0,0,2.187,2.06,8.981,8.981,0,0,0,1.808,1.112,8.832,8.832,0,0,0,1.138.425c.117.031.214.051.288.063a.227.227,0,0,0,.053.007l.081.015a2.164,2.164,0,0,0,.242.013,2.479,2.479,0,0,0,.483-.049,1.966,1.966,0,0,0,.69-.269l2.934-1.708a1.422,1.422,0,0,0,.719-1.08l0-.041a1.5,1.5,0,0,0-.453-1.14"
                                                        transform="translate(0 0)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <?php echo esc_html($office_telephone_number); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.contact-item -->
                    <?php endwhile; ?>

                    <?php else: ?>
                    <?php
                    if ($contact_department != '' ) {

                     /* echo '<pre>';
                      print_r($departments);
                      echo '</pre>';*/

                        //need to find the first city for the department
                        //$contact_city
                        $contact_city_x = '';
                        if($contact_city == ''){
                            foreach ($departments as $dept_key => $dept_info){
                                $dept_key_arr  = explode('---', $dept_key );
                                $dept_key_dept = $dept_key_arr[0];
                                $dept_key_city = $dept_key_arr[1];

                                if($dept_key_dept == $contact_department) {

                                    $contact_city_x = $dept_key_city;
                                    break;
                                }
                            }


                        }
                        else{
                            $contact_city_x = $contact_city;
                        }


                        //print_r($contact_city_x);

                        $department_info = isset($departments[$contact_department.'---'.$contact_city_x]) ? $departments[$contact_department.'---'.$contact_city_x] : [];
                        if((is_array($department_info) && sizeof($department_info) > 0 ) || !empty($department_info) ){
                            $department_telephone = isset($department_info['telephone_number']) ? $department_info['telephone_number'] : '';
                            $department_email     = isset($department_info['email']) ? $department_info['email'] : '';

                            //get office info from city
                            $office_info             = isset($offices[$contact_city]) ? $offices[$contact_city] : '';
                            $office_country          = isset($office_info['country']) ? $office_info['country'] : '';
                            $office_address          = isset($office_info['address']) ? $office_info['address'] : '';
                            $office_telephone_number = isset($office_info['telephone_number']) ? $office_info['telephone_number'] : '';

                            $office_flag       = '';
                            $office_country_sm = '';
                            if ($office_country != '') {
                                $office_country_sm = str_replace('-', '_', sanitize_title($office_country));

                                if (file_exists($contacts_content_flags_dir.$office_country_sm.'.png')) {
                                    $office_flag = $contacts_content_flags_url.$office_country_sm.'.png';
                                }

                            }//end flag checking

                            $department_alt = trim($contact_department);
                            $department_alt = sanitize_title($department_alt);
                            //$department_alt = str_replace('&', '', $department_alt);
                            //$department_alt = str_replace(' ', '-', $department_alt);


                            $photo_url = '';
                            //for now we will show dept photo
                            if (file_exists($contacts_content_dept_dir.'IG-'.$department_alt.'.svg')) {
                                $photo_url = $contacts_content_dept_url.'IG-'.$department_alt.'.svg';
                            } else {
                                $photo_url = get_template_directory_uri().'/assets/images/contact_photo.png';
                            }


                            ?>
                    <div class="contact-item" data-aos="fade-up">
                        <?php if($photo_url != ''): ?>
                        <div class="contact-image">
                            <div class="contact-main-image">
                                <img src="<?php echo esc_url($photo_url); ?>"
                                    title="<?php echo esc_attr(the_title()); ?>"
                                    alt="<?php echo esc_attr($title); ?>" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="contact-info-wrapper">
                            <div class="contact-info__left">
                                <div class="contact-info">
                                    <?php if($contact_department): ?>
                                    <h4 class="contact-info_title">
                                        <svg id="Group_2" data-name="Group 2" xmlns="http://www.w3.org/2000/svg"
                                            width="50" height="50" viewBox="0 0 50 50">
                                            <path id="Path_21" data-name="Path 21"
                                                d="M-176.074-176.074a21.168,21.168,0,0,1-29.936,0,21.168,21.168,0,0,1,0-29.936,21.167,21.167,0,0,1,29.936,0,21.167,21.167,0,0,1,0,29.936m2.71-32.646a25,25,0,0,0-35.355,0,25,25,0,0,0,0,35.355,25,25,0,0,0,35.355,0,25,25,0,0,0,0-35.355"
                                                transform="translate(216.042 216.042)" fill="#fec10d" />
                                            <path id="Path_23" data-name="Path 23"
                                                d="M-25.667-77.174V-92.2h1.91v-3.572h-8.1V-92.2h1.91v15.029h-1.91V-73.6h8.1v-3.573Z"
                                                transform="translate(42.331 109.688)" fill="#fec10d" />
                                            <path id="Path_24" data-name="Path 24"
                                                d="M-46.921-93.522A11.3,11.3,0,0,1-58.23-104.793a11.3,11.3,0,0,1,11.309-11.271,11.33,11.33,0,0,1,7.352,2.71l.057.049-3.021,3.011-.049-.038a7,7,0,0,0-4.339-1.49,7.049,7.049,0,0,0-7.054,7.029,7.05,7.05,0,0,0,7.054,7.029,7,7,0,0,0,5.1-2.179v-2.415H-46.99v-.011a.214.214,0,0,1-.144-.2.214.214,0,0,1,.063-.151l3.805-3.8h5.633l-.006,8.166-.013.018a11.337,11.337,0,0,1-9.27,4.817"
                                                transform="translate(77.905 129.793)" fill="#fec10d" />
                                        </svg>
                                        <?php echo $contact_department; ?>
                                    </h4>
                                    <?php endif; ?>


                                    <?php if ($department_telephone) : ?>
                                    <p class="contact-info__phone">
                                        <span class="text-bold"><?php echo esc_html__('T', 'ifchor') ?></span>
                                        <?php echo esc_html($department_telephone); ?>
                                    </p>
                                    <?php endif; ?>

                                    <?php if ($department_email) : ?>
                                    <p class="contact-info__email">
                                        <span class="text-bold"><?php echo esc_html__('E', 'ifchor') ?></span>
                                        <?php echo esc_html($department_email); ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="contact-info__right">
                                <?php if ($office_flag != ''): ?>
                                <div class="contact-info__flag">
                                    <img src="<?php echo esc_url($office_flag); ?>"
                                        alt="<?php echo esc_attr($title); ?>" width="34" height="34" />
                                </div>
                                <?php endif; ?>
                                <?php if ($office_country) : ?>
                                <h4 class="contact-info_title"><?php echo esc_html($office_country); ?></h4>
                                <?php endif; ?>
                                <?php if ($office_address) : ?>
                                <p class="contact-info__location"><?php echo esc_html($office_address); ?></p>
                                <?php endif; ?>
                                <?php if ($office_telephone_number) : ?>
                                <p class="contact-info__phone">
                                    <span class="contact-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15.589" height="20.358"
                                            viewBox="0 0 15.589 20.358">
                                            <defs>
                                                <clipPath id="clip-path">
                                                    <rect id="Rectangle_211" data-name="Rectangle 211" width="15.589"
                                                        height="20.358" fill="#fff" />
                                                </clipPath>
                                            </defs>
                                            <g id="Group_6259" data-name="Group 6259" transform="translate(0 0)">
                                                <g id="Group_6259-2" data-name="Group 6259" transform="translate(0 0)"
                                                    clip-path="url(#clip-path)">
                                                    <path id="Path_8977" data-name="Path 8977"
                                                        d="M15.134,16.07l-2.884-2.9-.133-.12-.027-.007a1.679,1.679,0,0,0-.578-.263,1.7,1.7,0,0,0-1.233.135l-1.167.7L9.08,13.6a2.228,2.228,0,0,1-.431-.329,7.915,7.915,0,0,1-.794-.861,11.547,11.547,0,0,1-1.031-1.555,11.278,11.278,0,0,1-.842-1.633,7.48,7.48,0,0,1-.357-1.115,3.2,3.2,0,0,1-.085-.586l.947-.557a1.717,1.717,0,0,0,.677-.733,1.476,1.476,0,0,0,.12-1.041L6.331,1.126l-.013-.047A1.864,1.864,0,0,0,6,.488,1.262,1.262,0,0,0,5.315.044,1.4,1.4,0,0,0,4.236.207L1.3,1.932A1.97,1.97,0,0,0,.727,2.4a2.357,2.357,0,0,0-.385.616l-.025.074q-.014.049-.1.322A5.015,5.015,0,0,0,.033,4.429a9.912,9.912,0,0,0-.011,1.5,12.069,12.069,0,0,0,.31,2,17.739,17.739,0,0,0,.8,2.474A20.557,20.557,0,0,0,2.6,13.337,19.607,19.607,0,0,0,4.96,16.662a16.514,16.514,0,0,0,2.187,2.06,8.981,8.981,0,0,0,1.808,1.112,8.832,8.832,0,0,0,1.138.425c.117.031.214.051.288.063a.227.227,0,0,0,.053.007l.081.015a2.164,2.164,0,0,0,.242.013,2.479,2.479,0,0,0,.483-.049,1.966,1.966,0,0,0,.69-.269l2.934-1.708a1.422,1.422,0,0,0,.719-1.08l0-.041a1.5,1.5,0,0,0-.453-1.14"
                                                        transform="translate(0 0)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <?php echo esc_html($office_telephone_number); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        else{
                            ?>

                    <p class="text-center">
                        <?php esc_html_e('Sorry, no contacts found, please change your search criteria.', 'ifchor'); ?>
                    </p>

                    <?php
                        }

                        //print_r($department_info);



                    }
                    else{
                        ?>

                    <p class="text-center">
                        <?php esc_html_e('Sorry, no contacts found, please change your search criteria.', 'ifchor'); ?>
                    </p>

                    <?php
                    }
                    ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();