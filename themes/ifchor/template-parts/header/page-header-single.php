<?php
/**
 * Displays the page header.
 *
 * @package CodeBoxr
 * @subpackage Ifchor
 * @since 1.0.0
 */
?>
<div id="page-header" class="site-page-header page-header-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-wrapper">
                    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                        <?php
                        if(function_exists('bcn_display'))
                        {
                            echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
                            bcn_display();
                            echo ' </div>';
                        }
                        else{
                            ifchor_breadcrumb();
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #page-header -->