<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.mellowwebdesign.be
 * @since      1.0.0
 *
 * @package    B2bwebshop
 * @subpackage B2bwebshop/admin/partials
 */
global $wpdb;
$table = $wpdb->prefix . 'b2bdomain';
$getdata = $wpdb->get_results("SELECT * FROM $table");

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <h2>my-pirazzo zone</h2>
    <hr>

    <button class="button button-primary action">voeg my-pirazo zone toe</button>

    <hr>
    <table class="widefat">
        <thead>
        <tr>
            <th>
                Onderneming
            </th>
            <th>
                geactiveerd
            </th>
            <th>
                start datum
            </th>
            <th>
                eind datum
            </th>
            <th>
                hook
            </th>

        </tr>
        </thead>
        <tbody>
            <?php foreach($getdata as $data){ ?>
                <tr>
                   <td> <a href="#"><?php echo $data->name ?></a></td>
                    <td><?php echo $data->isActivated ?></td>
                    <td><?php echo $data->start_time ?></td>
                    <td><?php echo $data->end_time ?></td>
                    <td>hook</td>
                </tr>
           <?php } ?>
        </tbody>
        <tfooter>
            <tr>
                <th>
                    Onderneming
                </th>
                <th>
                    geactiveerd
                </th>
                <th>
                    start datum
                </th>
                <th>
                    eind datum
                </th>
                <th>
                    hook
                </th>

            </tr>
        </tfooter>
    </table>
</div>
</div>
