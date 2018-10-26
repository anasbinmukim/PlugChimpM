CREATE TABLE company_counter (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      counter_name VARCHAR(128) NOT NULL,
      incharge_name VARCHAR(64) NOT NULL,
      incharge_mobile VARCHAR(64) NOT NULL,
      contact_info VARCHAR(128) NOT NULL,
      address VARCHAR(128) NOT NULL,
      district_name VARCHAR(128) NOT NULL,
      thana_name VARCHAR(128) NOT NULL,
      zone_id BIGINT(20) NOT NULL,
      note TEXT NOT NULL,
      updated_at DATETIME NOT NULL,
      updated_by BIGINT(20) NOT NULL,
      PRIMARY KEY (ID)
);

CREATE TABLE via_place (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      place_name VARCHAR(128) NOT NULL,
      address VARCHAR(128) NOT NULL,
      district_name VARCHAR(128) NOT NULL,
      thana_name VARCHAR(128) NOT NULL,
      note TEXT NOT NULL,
      PRIMARY KEY (ID)
);




CREATE TABLE place_area (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      thana_id BIGINT(20) NOT NULL,
      area_name VARCHAR(128) NOT NULL,
      note TEXT NOT NULL,
      PRIMARY KEY (ID)
);

CREATE TABLE place_thana (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      district_id BIGINT(20) NOT NULL,
      thana_name VARCHAR(128) NOT NULL,
      note TEXT NOT NULL,
      PRIMARY KEY (ID)
);

CREATE TABLE place_district (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      division_id BIGINT(20) NOT NULL,
      district_name VARCHAR(128) NOT NULL,
      note TEXT NOT NULL,
      PRIMARY KEY (ID)
);


CREATE TABLE place_zone (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      district_id BIGINT(20) NOT NULL,
      zone_name VARCHAR(128) NOT NULL,
      note TEXT NOT NULL,
      PRIMARY KEY (ID)
);


CREATE TABLE place_division (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      division_name VARCHAR(128) NOT NULL,
      note TEXT NOT NULL,
      PRIMARY KEY (ID)
);








CREATE TABLE `launch_booking_meta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (meta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

CREATE TABLE `user_transc_meta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transc_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (meta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

CREATE TABLE `company_transc_meta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transc_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (meta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

CREATE TABLE `company_meta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (meta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

CREATE TABLE `notification_meta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `notification_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (meta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


CREATE TABLE `app_meta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dbtable` VARCHAR(128) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `rowid` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (meta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

CREATE TABLE `app_options` (
  `option_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `option_name` VARCHAR(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` LONGTEXT COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` VARCHAR(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (option_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


CREATE TABLE `messages` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `msg_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `msg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `msg_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `msg_subject` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `msg_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `msg_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `msg_slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `msg_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `msg_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'email',
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

CREATE TABLE `message_meta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (meta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

CREATE TABLE company_transactions (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      company_id INT(11) NOT NULL,
      transaction_id VARCHAR(64) NOT NULL,
      transaction_date DATETIME NOT NULL,
      transaction_amount DOUBLE NOT NULL,
      transaction_type VARCHAR(16) NOT NULL,
      type_label VARCHAR(64) NOT NULL,
      description VARCHAR(256) NOT NULL,
      note VARCHAR(256) NOT NULL,
      invoice_id BIGINT(20) NOT NULL,
      payment_gatway VARCHAR(128) NOT NULL,
      payment_status VARCHAR(64) NOT NULL,
      update_at DATETIME NOT NULL,
      update_by BIGINT(20) NOT NULL,
      PRIMARY KEY (ID)
);

CREATE TABLE notification (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      user_id BIGINT(20) NOT NULL,
      title VARCHAR(128) NOT NULL,
      description TEXT NOT NULL,
      mark_status VARCHAR(8) NOT NULL,
      PRIMARY KEY (ID)
);

CREATE TABLE user_invoice_log (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      invoice_id BIGINT(20) NOT NULL,
      note VARCHAR(256) NOT NULL,
      log_time DATETIME NOT NULL,
      status_from VARCHAR(16) NOT NULL,
      status_to VARCHAR(16) NOT NULL,
      update_by BIGINT(20) NOT NULL,
      PRIMARY KEY (ID)
);


CREATE TABLE user_invoices (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      user_id BIGINT(20) NOT NULL,
      invoice_items VARCHAR(256) NOT NULL,
      invoice_total DOUBLE NOT NULL,
      create_date DATETIME NOT NULL,
      due_date DATETIME NOT NULL,
      paid_date DATETIME NOT NULL,
      status VARCHAR(16) NOT NULL,
      allow_partial TINYINT(1) NOT NULL,
      PRIMARY KEY (ID)
);


CREATE TABLE user_transactions (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      user_id BIGINT(20) NOT NULL,
      transaction_id VARCHAR(64) NOT NULL,
      transaction_date DATETIME NOT NULL,
      transaction_amount DOUBLE NOT NULL,
      transaction_type VARCHAR(16) NOT NULL,
      type_label VARCHAR(64) NOT NULL,
      description VARCHAR(256) NOT NULL,
      note VARCHAR(256) NOT NULL,
      invoice_id BIGINT(20) NOT NULL,
      payment_gatway VARCHAR(128) NOT NULL,
      payment_status VARCHAR(64) NOT NULL,
      PRIMARY KEY (ID)
);


CREATE TABLE launch_booking (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      launch_id INT(11) NOT NULL,
      cabin_id BIGINT(20) NOT NULL,
      cabin_number VARCHAR(16) NOT NULL,
      travel_date DATE NOT NULL,
      passenger_name VARCHAR(64) NOT NULL,
      passenger_email VARCHAR(64) NOT NULL,
      passenger_mobile VARCHAR(16) NOT NULL,
      passenger_alt_mobile VARCHAR(16) NOT NULL,
      passenger_address VARCHAR(128) NOT NULL,
      passenger_nid VARCHAR(20) NOT NULL,
      booking_note VARCHAR(256) NOT NULL,
      booking_status VARCHAR(20) NOT NULL,
      booking_date DATETIME NOT NULL,
      booking_by BIGINT(20) NOT NULL,
      cabin_fare DOUBLE NOT NULL,
      paid_amount DOUBLE NOT NULL,
      due_amount DOUBLE NOT NULL,
      payment_id BIGINT(20) NOT NULL,
      bar_code VARCHAR(128) NOT NULL,
      PRIMARY KEY (ID)
);


 CREATE TABLE launch_cabin (
       ID BIGINT(20) NOT NULL AUTO_INCREMENT,
       launch_id INT(11) NOT NULL,
       cabin_number VARCHAR(16) NOT NULL,
       cabin_info VARCHAR(256) NOT NULL,
       cabin_fare DOUBLE NOT NULL,
       discount DOUBLE NOT NULL,
       cabin_type VARCHAR(64) NOT NULL,
       is_allow TINYINT(1) NOT NULL,
       PRIMARY KEY (ID)
 );


 CREATE TABLE launch_schedule (
       sche_id BIGINT(20) NOT NULL AUTO_INCREMENT,
       launch_id INT(11) NOT NULL,
       date DATE NOT NULL,
       route VARCHAR(128) NOT NULL,
       start_from VARCHAR(64) NOT NULL,
       destination_to VARCHAR(64) NOT NULL,
       start_time DATETIME NOT NULL,
       destination_time DATETIME NOT NULL,
       PRIMARY KEY (sche_id)
 );


 CREATE TABLE launch_route (
       route_id INT(11) NOT NULL AUTO_INCREMENT,
       route VARCHAR(128) NOT NULL,
       place_1 VARCHAR(64) NOT NULL,
       place_2 VARCHAR(64) NOT NULL,
       PRIMARY KEY (route_id)
 );

 CREATE TABLE launch (
       ID INT(11) NOT NULL AUTO_INCREMENT,
       launch_name VARCHAR(128) NOT NULL,
       route_1 VARCHAR(128) NOT NULL,
       route_2 VARCHAR(128) NOT NULL,
       register_info VARCHAR(512) NOT NULL,
       company_info TEXT NOT NULL,
       total_cabin INT(4) NOT NULL,
       total_capacity INT(4) NOT NULL,
       PRIMARY KEY (ID)
 );

CREATE TABLE user_login_log (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      user_id BIGINT(20) NOT NULL,
      login_time DATETIME NOT NULL,
      logout_time DATETIME NOT NULL,
      ip_address VARCHAR(64) NOT NULL,
      browser_agent VARCHAR(64) NOT NULL,
      PRIMARY KEY (ID)
);


CREATE TABLE booking_agent (
      ID BIGINT(20) NOT NULL AUTO_INCREMENT,
      agent_name VARCHAR(64) NOT NULL,
      agent_address VARCHAR(256) NOT NULL,
      agent_phone VARCHAR(64) NOT NULL,
      agent_mobile VARCHAR(64) NOT NULL,
      agent_more longtext COLLATE utf8mb4_unicode_520_ci,
      PRIMARY KEY (ID)
);
