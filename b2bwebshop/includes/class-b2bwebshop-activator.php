<?php

/**
 * Fired during plugin activation
 *
 * @link       www.mellowwebdesign.be
 * @since      1.0.0
 *
 * @package    B2bwebshop
 * @subpackage B2bwebshop/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    B2bwebshop
 * @subpackage B2bwebshop/includes
 * @author     Mellow Webdesign <contact@mellowwebdesign.be>
 */
class B2bwebshop_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        global $wpdb;
        global $jal_db_version;
//DOMEIN

        $table_name = $wpdb->prefix . 'b2bdomain';
        $date=current_time( 'Y-m-d' );
        $user_id=$wpdb->prefix . 'users';
        $charset_collate = $wpdb->get_charset_collate();


        $wpdb->query("CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		userid mediumint(9),
		isActivated tinyint(1) DEFAULT 0 NOT NULL,
		name tinytext NOT NULL,
		start_time date DEFAULT '$date' NOT NULL,
		end_time date DEFAULT '0000-00-00' NOT NULL,
		PRIMARY KEY  (id)		
	)ENGINE = INNODB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci");
        require_once (ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta();


        //add_option( 'jal_db_version', $jal_db_version );

        //LOCATIES
        $table_name2 = $wpdb->prefix . 'b2blocations';

        $wpdb->query("CREATE TABLE $table_name2 (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		domainid mediumint(9) ,
		land tinytext NOT NULL,
		leveradress tinytext NOT NULL,
		PRIMARY KEY  (id),
		FOREIGN KEY (domainid) REFERENCES $table_name(id)

	)ENGINE = INNODB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci");
        require_once (ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta();

////  add_option( 'jal_db_version', $jal_db_version );
//
//    //COLLECTIE
        $table_name3 = $wpdb->prefix . 'b2bcollections';



        $wpdb->query("CREATE TABLE $table_name3 (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		domainid mediumint(9),
		price mediumint(25) NOT NULL ,
		beschrijving tinytext NOT NULL,
		titel tinytext NOT NULL,

		PRIMARY KEY  (id),
		FOREIGN KEY (domainid) REFERENCES $table_name(id)

	) ENGINE = INNODB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci");
        require_once (ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta();
//
////    add_option( 'jal_db_version', $jal_db_version );
////orders
        $table_name4 = $wpdb->prefix . 'b2borders';

        $wpdb->query("CREATE TABLE $table_name4 (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		domainid mediumint(9),
		location tinytext NOT NULL,
		name tinytext NOT NULL,
		product tinytext NOT NULL,
		maat tinytext NOT NULL,

		PRIMARY KEY  (id),
		FOREIGN KEY (domainid) REFERENCES $table_name(id)

	)ENGINE = INNODB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci");

        require_once (ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta();
//
//    //add_option( 'jal_db_version', $jal_db_version );

	}

}
