<?php

/**
 * @Project VNP
 * @Author Nguyen Ngoc Phuong
 * @Copyright (C) 2012 Nguyen Ngoc Phuong. All rights reserved
 * @Createdate  30/09/2012, 00:30
 */

if( !defined( 'VNP' ) || !defined( 'VN' ) || !defined( 'VNP_INSTALL' ) ) die( 'ILN' );

//Ten cac table cua CSDL dung chung cho he thong
define( 'VNP_ADMIN', $db_info['prefix'] . '_admins' );
define( 'VNP_ADMIN_PERMISS', $db_info['prefix'] . '_admin_permiss' );
define( 'VNP_USER', $db_info['prefix'] . '_users' );
define( 'SESSION', $db_info['prefix'] . '_session' );
define( 'GLOBAL_CONFIG', $db_info['prefix'] . '_global_config' );

//define( 'NV_CRONJOBS_GLOBALTABLE', $db_info['prefix'] . '_cronjobs' );

$sql_create_table[] = "CREATE TABLE `" . VNP_USER . "` (
  `userid` mediumint(8) unsigned NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `groupid` int(11) DEFAULT NULL,
  `second_group_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permission` mediumtext NOT NULL,
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `main_avatar` varchar(100) NOT NULL,
  `squestion` varchar(100) NOT NULL,
  `sanswer` varchar(100) NOT NULL,
  `jointime` int(11) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(100) NOT NULL,
  `remember` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM";

$sql_create_table[] = "CREATE TABLE `" . VNP_ADMIN . "` (
  `admin_id` mediumint(8) unsigned NOT NULL auto_increment,
  `userid` mediumint(8) unsigned NOT NULL,
  `permission` mediumtext NOT NULL,
  `title` varchar(100) NOT NULL,
  `admin_class` varchar(100) NOT NULL,
  `expired` int(11) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM";

$sql_create_table[] = "CREATE TABLE `" . VNP_ADMIN_PERMISS . "` (
  `permission_id` int(11) NOT NULL auto_increment,
  `permission_name` varchar(100) NOT NULL,
  `content_type` varchar(100) NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=MyISAM";

$sql_create_table[] = "CREATE TABLE `" . GLOBAL_CONFIG . "` (
  `config_id` int(11) NOT NULL auto_increment,
  `config_name` varchar(100) NOT NULL,
  `config_key` varchar(100) NOT NULL,
  `config_value` mediumtext NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM";

$sql_create_table[] = "CREATE TABLE `" . SESSION . "` (
  `session_id` varchar(32) NOT NULL default '',
  `http_user_agent` varchar(32) NOT NULL default '',
  `session_data` blob NOT NULL,
  `session_expire` int(11) NOT NULL default '0',
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

$sql_create_table[] = "INSERT INTO `" . VNP_ADMIN_PERMISS . "` (`permission_id`, `permission_name`, `content_type`) VALUES
(1, 'full', 'global')";
?>