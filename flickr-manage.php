<?php
/*
Plugin Name: Flickr Manage
Plugin URI: http://kcin1018.github.io/flickr-manage
Description: Handles uploading, modifying images on Flickr, and insertion into posts via the Flickr API.  Concept based on <a href="http://trentgardner.net/wordpress-flickr-manager/">wordpress-flickr-manager by Trent Gardner</a>.
Version: 0.0.1
Author: Nicholas Felicelli
Author URI: https://github.com/kcin1018
License: GPL2

Copyright 2015  Nicholas Felicelli  (email : nick.felicelli@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
defined('ABSPATH') or die('No script kiddies please!');

if (!class_exists('FlickrManage')):
    class FlickrManage
    {
        protected $wpdb;
        protected $apiKey;
        protected $apiSecret;
        protected $permissions;
        protected $cacheTable;

        public function __construct()
        {
            global $wpdb;
            $this->wpdb = $wpdb;
            $this->cacheTable =

            $this->addActions();
        }

        private function addActions()
        {
            add_action('init', array(&$this, 'init'));

            add_action('admin_menu', array(&$this, 'create_menus'));

            $page = add_options_page('Flickr Manage Options', 'Flickr Manage', 5, __DIR__, array(&$this, 'settings_page'));
            add_action("load-$page", array(&$this, 'load_dependencies')); //'LoadSettingsDependencies'));
            add_action("admin_head-$page", array(&$this, 'PrintSettingsScripts'));
        }
    }
endif;
