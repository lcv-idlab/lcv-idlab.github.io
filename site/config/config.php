<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PRO-b3743d396f4d2a92e40c01a187d34311');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/


/*
 * Language setup
 */

c::set('languages', array(
	array(
		'code'	=> 'it',
		'name'	=> 'Italiano',
		'default'	=>	true,
		'locale'	=> 'it_IT',
		'url'	=> '/it',
	),
	array(
		'code'	=> 'de',
		'name'	=> 'Deutsch',
		'locale'	=> 'de_DE',
		'url'	=> '/de',
	),
	array(
		'code'	=> 'fr',
		'name'	=> 'Français',
		'locale'	=> 'ch_FR',
		'url'	=> '/fr',
	)
));


// automatically detect the language
c::set('language.detect', true);

// Activate extra markdown features
// https://michelf.ca/projects/php-markdown/extra/

c::set('markdown.extra', true);