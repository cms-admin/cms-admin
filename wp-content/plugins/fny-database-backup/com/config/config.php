<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$upload_dir = wp_upload_dir();

// site url
define('FNY_DATABASE_BACKUP_SITE_URL', get_site_url());

//Paths
define('FNY_DATABASE_BACKUP_APP_PATH', realpath(dirname(__FILE__).'/../../').'/');
define('FNY_DATABASE_BACKUP_COM_PATH', FNY_DATABASE_BACKUP_APP_PATH.'com/');
define('FNY_DATABASE_BACKUP_CORE_PATH', FNY_DATABASE_BACKUP_COM_PATH.'core/');
define('FNY_DATABASE_BACKUP_STORAGE_PATH', FNY_DATABASE_BACKUP_COM_PATH.'storage/');
define('FNY_DATABASE_BACKUP_CONFIG_PATH', FNY_DATABASE_BACKUP_COM_PATH.'config/');
define('FNY_DATABASE_BACKUP_INCLUDS_PATH', FNY_DATABASE_BACKUP_COM_PATH.'includes/');
define('FNY_DATABASE_BACKUP_PUBLIC_PATH', FNY_DATABASE_BACKUP_APP_PATH.'public/');
define('FNY_DATABASE_BACKUP_AJAX_PATH', FNY_DATABASE_BACKUP_PUBLIC_PATH.'ajax/');
define('FNY_DATABASE_BACKUP_FOLDER_PATH', $upload_dir['basedir'].'/fny_database_backups/');
define('FNY_MAIL_TEMPLATES_PATH', '');
// URLs
define('FNY_DATABASE_BACKUP_ADMIN_URL', network_admin_url('admin.php?page=fny_database_backup_admin'));

// Dump status
define('FNY_DATABASE_BACKUP_INPROGRESS', 1);
define('FNY_DATABASE_BACKUP_FINISHED', 2);
define('FNY_DATABASE_BACKUP_FINISHED_WITH_ERROR', 3);
define('FNY_DATABASE_BACKUP_FINISHED_WARNINGS', 4);
define('FNY_DATABASE_BACKUP_CANCELLED', 5);

define('FNY_DATABASE_BACKUP_PROGRESS_UPDATE_INTERVAL', 5);

define('FNY_DATABASE_BACKUP_DEFAULF_PREFIX', 'fny_backup_');
define('FNY_DATABASE_BACKUP_DEFAULF_RETENTION', 100);

//Mail
define('FNY_DATABASE_BACKUP_MAIL_BACKUP_SUCCESS_SUBJECT', 'Backup Succeeded');
define('FNY_DATABASE_BACKUP_MAIL_BACKUP_COMPLETED_WITH_WARNINGS_SUBJECT', 'Backup completed with warnings');
define('FNY_DATABASE_BACKUP_MAIL_BACKUP_FAIL_SUBJECT', 'Backup Failed');
define('FNY_DATABASE_BACKUP_MAIL_BACKUP_CANCELED_SUBJECT', 'Backup Canceled');

// Action types
define('FNY_DATABASE_BACKUP_TYPE_DUMP', 1);
define('FNY_DATABASE_BACKUP_TYPE_UPLOAD', 2);

// Schedule
define('FNY_DATABASE_BACKUP_RECURRENCE_DAY', 1);
define('FNY_DATABASE_BACKUP_RECURRENCE_WEEK', 2);
define('FNY_DATABASE_BACKUP_RECURRENCE_MONTH', 3);

// Storage
define('FNY_DATABASE_BACKUP_AMAZON', 1);
define('FNY_DATABASE_BACKUP_GOOGLE_DRIVE', 2);
define('FNY_DATABASE_BACKUP_FTP', 3);

define('FNY_DATABASE_BACKUP_GDRIVE_CLIENT_ID', '1004810773471-8cgst1fdfrg3mcpg6r4n8ddp3rv38qmo.apps.googleusercontent.com');
define('FNY_DATABASE_BACKUP_GDRIVE_SECRET', 'fb6r57IqDcN0RqzZKguLHknC');
define('FNY_DATABASE_BACKUP_GDRIVE_REDIRECT_URI', 'http://fny-webit.com/gdrive/');

define('FNY_DATABASE_BACKUP_CLOUD_FOLDER_NAME', 'fny_database_backups');
