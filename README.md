# WordPress-Starter-Plugin

A well documented starter plugin for quick WordPress plugin development. 


# Directory Structure

- /admin/ 						- Plugin backend stuff.
- /includes/					- External third party classes and libraries.
- /languages/					- Translation files go here. 
- /public/						- Front end files go here.
- index.php					- Dummy file.
- license.txt					- GPL v2
- prefix_starter-plugin.php	- File containing plugin name and other version info for WordPress.
- readme.txt					- Readme for WordPress plugin repository. https://wordpress.org/plugins/files/2017/03/readme.txt
- uninstall.php				- Fired when the plugin is uninstalled. 


# TODO

- Note: (S&R) = Search and Replace by matching case.

- Plugin name: Starter Plugin (S&R)
- Plugin folder slug: starter-plugin (S&R)
- Decide on a prefix for the plugin (S&R)
- Plugin description
- Text domain. (S&R)
- Update prefix_settings_link() 	in \admin\prefix_starter-plugin-basic-setup.php
- Update prefix_footer_text()		in \admin\prefix_starter-plugin-basic-setup.php
- Update prefix_add_menu_links() 	in \admin\prefix_starter-plugin-admin-setup.php
- Update prefix_register_settings() in \admin\prefix_starter-plugin-admin-setup.php
- Update UI format and settings		in \admin\prefix_starter-plugin-admin-ui-render.php
- Update uninstall.php
- Update readme.txt
- Update PREFIX_VERSION_NUM 		in prefix_starter-plugin.php (keep this line for future updates)