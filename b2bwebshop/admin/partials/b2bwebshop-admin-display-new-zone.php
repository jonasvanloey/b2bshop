<?php
add_action('wp_loaded','post_and_redirect');
function post_and_redirect(){
    echo 'working';
if (isset($_POST["submit"]) && $_POST["client"] != "" && $_POST["startdate"] != "" && $_POST["enddate"] != "") {
    //YOUr additional code here
    global $wpdb;
    echo 'working';
    $userdb = $wpdb->prefix . 'users';
    $table = $wpdb->prefix . "b2bdomain";
    $user_id = strip_tags($_POST["client"]);
    $startdate = strip_tags($_POST["startdate"]);
    $enddate = strip_tags($_POST["enddate"]);
    $isActive = 0;
    if ($startdate < $enddate) {
        $isActive = 1;
    }
    $query = $wpdb->get_results("SELECT user_login FROM $userdb WHERE ID = $user_id");
    $name = $query[0]->user_login;
    $wpdb->insert(
        $table,
        array(
            'userid' => $user_id,
            'isActivated' => $isActive,
            'name' => $name,
            'start_time' => $startdate,
            'end_time' => $enddate,
        )
    );
    // process form, and then Redirect
    $url = 'admin.php?page=my_pirazzo_edit';
    wp_redirect($url);
    exit();

    }
}

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
$path='admin.php?page=my_pirazzo_locations';
$path2='admin.php?page=my_pirazzo_items';
$url=admin_url($path);
$url2=admin_url($path2);
//global $wpdb;
$userdb = $wpdb->prefix. 'users';
$getdata = $wpdb->get_results("SELECT * FROM $userdb");
//if (isset($_GET['id']))
//{
//    $id= $_GET['id'];
//    echo $id;
//}

//echo $userdb;
//if (isset($_POST["submit"]) && $_POST["client"] != "" && $_POST["startdate"] != "" && $_POST["enddate"] != "") {
//
//    global $wpdb;
//
//    $userdb = $wpdb->prefix . 'users';
//    $table = $wpdb->prefix . "b2bdomain";
//    $user_id = strip_tags($_POST["client"]);
//    $startdate = strip_tags($_POST["startdate"]);
//    $enddate = strip_tags($_POST["enddate"]);
//    $isActive = 0;
//    if ($startdate < $enddate) {
//        $isActive = 1;
//    }
//    $query = $wpdb->get_results("SELECT user_login FROM $userdb WHERE ID = $user_id");
//    $name = $query[0]->user_login;
//    $wpdb->insert(
//        $table,
//        array(
//            'userid' => $user_id,
//            'isActivated' => $isActive,
//            'name' => $name,
//            'start_time' => $startdate,
//            'end_time' => $enddate,
//        )
//    );
//
////    $url = 'admin.php?page=my_pirazzo_edit';
////
////    ob_start();
////    wp_redirect($url);
////    exit();
//
//
//
//
//};

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1>beheer zone</h1>
    <div class="postbox">
        <div class="meta-th">
            <h2>nieuwe zone toevoegen</h2>
        </div>
        <div class="meta-td">

            <form method="post" name="cleanup_options" action="">
                <fieldset>
                    <label for="client">Selecteer een Klant</label>
                    <select name="client" id="client">
                        <?php foreach($getdata as $data){ ?>
                            <option value="<?php echo $data->ID ?>"><?php echo $data->user_login ?></option>
                        <?php } ?>
                    </select>

                </fieldset>
                <fieldset>
                    <label for="startdate">Startdatum</label>
                    <input type="date" name="startdate" >
                    <label for="enddate">Einddatum</label>
                    <input type="date" name="enddate" >
                </fieldset>



                <?php submit_button('bewaar de zone', 'primary','submit', TRUE); ?>

            </form>
        </div>

    </div>
    <hr>
    <div class="postbox">
        <h2>voeg locatie's toe</h2>
        <a href="<?php echo $url ?>"><button class="button-primary">voeg een locatie toe</button></a>
    </div>
    <hr>
    <div class="postbox">
        <h2>voeg Producten toe</h2>
        <a href="<?php echo $url2 ?>"><button class="button-primary">voeg een locatie toe</button></a>
    </div>

</div>
