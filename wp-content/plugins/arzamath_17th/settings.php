<?php
if(!class_exists('WP_Plugin_Template_Settings'))
{
    class WP_Plugin_Template_Settings
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action('admin_menu', array(&$this, 'add_menu'));
                /**
                 * add_action - Заставляет указанную PHP функцию сработать в определенное событие
                 *
                 *      'admin_init' -- Название действия, к которому будем цеплять функцию.
                 *
                 *       array(&$this, 'admin_init') -- Название функции, которая должна быть вызвана во время
                 *                                  срабатывания действия, т.е. функция которую цепляем к хуку
                 */

        } // END public function __construct

        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
            // register your plugin's settings
            register_setting('wp_plugin_template-group', 'wp_plugin_setting');
                /**
                 * register_setting --Регистрирует новую опцию и callback функцию (функцию обратного вызова)
                 *                    для обработки значения опции при её сохранении в БД.
                 *
                 *      'wp_plugin_template-group' --Название группы, к которой будет принадлежать опция.
                 *                                  Это название должно совпадать с названием группы в функции
                 *                                  settings_fields().
                 *      'setting_text' -- Название опции, которая будет сохраняться в БД.
                 */

            // add your settings section
            add_settings_section(
                'wp_plugin_template-section',
                'WP Plugin Template Settings',
                array(&$this, 'settings_section_wp_plugin_template'),
                'wp_plugin_template'
            );
            /**
             * add_settings_section -Создает новый блок (секцию), в котором выводятся опции (настройки).
             * add_settings_section( $id, $title, $callback, $page );
             *      $id --Идентификатор секции, по которому нужно "цеплять" поля к секции.
             *            Строка, которая будет использована для id атрибутов тегов.
             *       $title -- Заголовок секции.
             *       $callback -- Callback функция, которая заполняет секцию нужным описание. Функция вызывается
             *                    сразу перед выводом полей в секции.
             *       $page -- Страница на которой выводить секцию. Должен совпадать с параметром $menu_slug из
             *                  add_menu_page(), add_theme_page(), add_submenu_page().
             */


            // add your setting's fields
            add_settings_field(
                'wp_plugin_template-setting_text',
                'Setting TEXT',
                array(&$this, 'settings_field_input_text'),
                'wp_plugin_template',
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_text'
                )
            );
            /**
             * add_settings_field -- Создает поле опции для указанной страницы и указанного блока (секции).
             * add_settings_field( $id, $title, $callback, $page, $section, $args );
             *      $id -- Название опции (идентификатор). Используйте в id атрибуте тега.
             *      $title -- Заголовок поля.
             *      $callback -- Название функции обратного вызова. Функция должна заполнять поле нужным <input> тегом,
             *                  который станет частью одной большой формы. Атрибут name должен быть равен параметру
             *                  $option_name из register_setting(). Атрибут id обычно равен параметру $id.
             *                  Результат должен сразу выводиться на экран (echo).
             *      $page --Страница меню в которую будет добавлено поле. Указывать нужно sug страницы, т.е. параметр
             *              должен быть равен параметру $menu_slug из add_theme_page(). У базовых страниц WordPress
             *              названия равны: general, reading, writing и т.д. по аналогии...
             *      $section -- название секции страницы настроек, в которую должно быть добавлено поле. По умолчанию
             *                  default или может быть секцией добавленной функцией add_settings_section().
             *      $args -- Параметры, которые нужно передать callback функции. Например, в паре key/value мы можем
             *               передать параметр $id, который затем использовать для атрибута id поля input, чтобы по
             *               нажатию на label в итоговом выводе, фокус курсора попадал в наше поле.
             */

            add_settings_field(
                'wp_plugin_template-setting_select',
                'Setting SELECT',
                array(&$this, 'settings_field_input_select'),
                'wp_plugin_template',
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_select'
                )
            );
            // Possibly do additional admin_init tasks
        } // END public static function activate

        public function settings_section_wp_plugin_template()
        {
            // Think of this as help text for the section.
            echo 'These settings do things for the WP Plugin Template.';
        }

        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text()
        {
            // Get the field name from the $args array
            // Get the value of this setting
            $options = get_option('wp_plugin_setting');
            /**
             * get_option( $option, $default) - Получает значение указанной настройки (опции).
             *      $option --  Название опции, значение которой нужно получить.
             *      $default -- Значение по умолчанию, которое нужно вернуть, если не удалось получить опцию
             */
            // echo a proper input type="text"
            ?>
            <input type="text" name='wp_plugin_setting[settings_field_input_text]' id="%s" value='<?php echo $options['settings_field_input_text'] ?>' >
            <?php
        } // END public function settings_field_input_text($args)

        /**
         * This function provides select for settings fields
         */
        public function settings_field_input_select()
        {
            // Get the field name from the $args array
            // Get the value of this setting
            $options = get_option('wp_plugin_setting');
            // echo a proper input type="text"
        ?>
            <select name='wp_plugin_setting[settings_field_input_select]'>
                <option value='1' <?php selected( $options['settings_field_input_select'], 1 ); ?>>Option 1</option>
                <option value='2' <?php selected( $options['settings_field_input_select'], 2 ); ?>>Option 2</option>
                <option value='3' <?php selected( $options['settings_field_input_select'], 3 ); ?>>Option 3</option>
                <option value='4' <?php selected( $options['settings_field_input_select'], 4 ); ?>>Option 4</option>
                <option value='5' <?php selected( $options['settings_field_input_select'], 5 ); ?>>Option 5</option>
            </select>
        <?php
        } // END public function settings_field_input_text($args)

        /**
         * add a menu
         */
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
            add_options_page(
                'WP Plugin Template Settings',
                'WP Plugin Template',
                'manage_options',
                'wp_plugin_template',
                array(&$this, 'plugin_settings_page')
            );
            /**
             * add_options_page -  Добавляет дочернюю страницу (подменю) в меню админ-панели "Параметры" (Settings).
             *                       Функцию нужно вызывать во время события admin_menu
             * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
             *       $page_title (строка) (обязательный)
             *               Текст, который будет использован в теге title на странице, настроек.
             *       $menu_title (строка) (обязательный)
             *               Текст, который будет использован в качестве называния для пункта меню.
             *        $capability (строка) (обязательный)
             *                 Название права доступа для пользователя, чтобы ему был показан этот пункт меню. Таблицу
             *                 возможностей смотрите здесь. Этот параметр отвечает и за доступ к странице этого пункта
             *                  меню.
             *       $menu_slug (строка) (обязательный)
             *                    Идентификатор меню. Нужно вписывать уникальную строку, пробелы не допускаются.Можно,
             *                  также указать путь от папки плагина до файла, который будет отвечать за страницу
             *                   настроек плагина, пр. my-plugin/options.php. В этом случае, следующий параметр
             *                  указывать не обязательно.
             *       $function (строка)
             *                   Название функции, которая отвечает за код страницы этого пункта меню.
             *                    По умолчанию: ''
             */
        } // END public function add_menu()

        /**
         * Menu Callback
         */
        public function plugin_settings_page()
        {
            if(!current_user_can('manage_options'))
            {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }

            // Render the settings template
            include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class WP_Plugin_Template_Settings
} // END if(!class_exists('WP_Plugin_Template_Settings'))
