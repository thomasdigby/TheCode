<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'root',
	"password" => 'password',
	"database" => 'silver',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_GB');

// log errors and warnings
SS_Log::add_writer(new SS_LogFileWriter('../log/silver-error.log'), SS_Log::WARN, '<=');