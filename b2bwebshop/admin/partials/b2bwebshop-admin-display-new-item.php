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
$domdb = $wpdb->prefix. 'b2bdomain';
$getdata = $wpdb->get_results("SELECT * FROM $domdb");

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1>beheer zone</h1>
    <div class="postbox">
        <div class="meta-th">
            <h2>nieuwe Leveradressen toevoegen</h2>
        </div>
        <div class="meta-td">

            <form method="post" name="cleanup_options" action="options.php">
                <fieldset>

                </fieldset>
                <fieldset>
                    <label for="title">Titel</label>
                    <input type="text" name="title" >
                </fieldset>
                <fieldset>
                    <label for="price">Prijs</label>
                    <input type="text" name="price" >
                </fieldset>

                <fieldset>
                    <label for="beschrijving">Beschrijving</label>
                    <textarea name="beschrijving" id="beschrijving" cols="100" rows="10"></textarea>
                </fieldset>



                <?php submit_button('bewaar de locatie', 'primary','submit', TRUE); ?>

            </form>
        </div>

    </div>


</div>
