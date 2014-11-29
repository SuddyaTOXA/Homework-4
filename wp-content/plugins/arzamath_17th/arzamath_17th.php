<?php
/*
Plugin Name: Arzamath_17th
Description: A simple wordpress plugin template
Version: 1.0
Author: Anton Shlikhta
Author URI:
License: GPL2
*/
/*
Copyright 2014  Anton Shlikhta  (email : suddyadred@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software

*/

if(!class_exists('WP_Plugin_Template')) //перевірка чи був оголошений клас
{
    class WP_Plugin_Template
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // Initialize Settings
            require_once(sprintf("%s/settings.php", dirname(__FILE__)));
            /**
             *require_once - конструкция однократных включений
             *
             * sprintf -- Возвращает отформатированную строку
             *       % - символ процента. Аргумент не используется.
             *       s - аргумент трактуется как строка.
             *
             * dirname -- Возвращает имя каталога из указанного пути
             *
             * __FILE__ --Полный путь и имя текущего файла. Если используется внутри подключаемого файла,
             *            то возвращается имя данного файла.
             */
            $WP_Plugin_Template_Settings = new WP_Plugin_Template_Settings();

            // Register custom post types
            require_once(sprintf("%s/post-types/post_type_template.php", dirname(__FILE__)));
            $Post_Type_Template = new Post_Type_Template();

            $plugin = plugin_basename(__FILE__);
            add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
            /**
             * "plugin_action_links_$plugin" -- Название фильтра
             *
             * array( $this, 'plugin_settings_link') -- Название функции. Для функций внутри классов
             *          указываем массив: array('название_класса', 'название_функции')
             */
        } // END public function __construct

        /**
         * Activate the plugin
         */
        public static function activate()
        {
            // Do nothing
        } // END public static function activate

        /**
         * Deactivate the plugin
         */
        public static function deactivate()
        {
            // Do nothing
        } // END public static function deactivate

        // Add the settings link to the plugins page
        function plugin_settings_link($links)
        {
            $settings_link = '<a href="options-general.php?page=wp_plugin_template">Settings</a>';
            array_unshift($links, $settings_link);
            return $links;
            /**
             * записує ссилку в змінну $settings_link
             *
             *  array_unshift($links, $settings_link); - записує значення змінної $settings_link в масив $links
             */
        }


    } // END class WP_Plugin_Template
} // END if(!class_exists('WP_Plugin_Template'))

if(class_exists('WP_Plugin_Template'))
{
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('WP_Plugin_Template', 'activate'));
    register_deactivation_hook(__FILE__, array('WP_Plugin_Template', 'deactivate'));

    /**
     * register_activation_hook -- регистрирует функцию, которая будет срабатывать во время активации плагина
     *      __FILE__ -- путь до PHP файла
     *
     *       array('WP_Plugin_Template', 'activate') -- Название функции обратного вызова.
     *                                             Для классов используйте массив: array( $this, 'название_функции' )
     */

    // instantiate the plugin class
    $wp_plugin_template = new WP_Plugin_Template();

}
