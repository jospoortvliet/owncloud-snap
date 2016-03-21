<?php

$snap_name = getenv('SNAP_NAME');
$snap_developer = getenv('SNAP_DEVELOPER');
if ($snap_developer == '') {
	$snap_developer = getenv('SNAP_ORIGIN');
}

$snap_fullname = $snap_name . '.' . $snap_developer;

$CONFIG = array(
/**
 * Use the ``apps_paths`` parameter to set the location of the Apps directory,
 * which should be scanned for available apps, and where user-specific apps
 * should be installed from the Apps store. The ``path`` defines the absolute
 * file system path to the app folder. The key ``url`` defines the HTTP web path
 * to that folder, starting from the ownCloud web root. The key ``writable``
 * indicates if a web server can write files to that folder.
 */
'apps_paths' => array(
	array(
		'path'=> '/var/lib/snaps/'.$snap_fullname.'/current/owncloud/apps',
		'url' => '/apps',
		'writable' => true,
	),
),

/**
 * Database types that are supported for installation.
 *
 * Available:
 * 	- sqlite (SQLite3 - Not in Enterprise Edition)
 * 	- mysql (MySQL)
 * 	- pgsql (PostgreSQL)
 * 	- oci (Oracle - Enterprise Edition Only)
 */
'supportedDatabases' => array(
	'mysql',
),

/**
 * ownCloud doesn't support hosting the config file out of the application, so
 * this version of ownCloud has been patched slightly to allow for it. As a
 * result, we fail the integrity check, so we'll just disable it.
 */
'integrity.check.disabled' => true,
);
