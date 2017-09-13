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
                    <label for="client">Selecteer een Domein</label>
                    <select name="client" id="client">
                        <?php foreach($getdata as $data){ ?>
                            <option value="<?php echo $data->name ?>"><?php echo $data->name ?></option>
                        <?php } ?>
                    </select>

                </fieldset>
                <fieldset>
                    <label for="land">Land</label>
                    <input type="text" name="land" >
                </fieldset>
                <fieldset>
                    <label for="stad">stad</label>
                    <input type="text" name="stad" >
                    <label for="postcode">postcode</label>
                    <input type="text" name="postcode">
                </fieldset>
                <fieldset>
                    <label for="adress">adres:</label>
                    <input type="text" name="adress">
                </fieldset>



                <?php submit_button('bewaar de locatie', 'primary','submit', TRUE); ?>

            </form>
        </div>

    </div>


</div>
