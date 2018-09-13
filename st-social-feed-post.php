<?php

/**
 * ST Social Feed
 * 
 * 
 * @package WordPress
 * @subpackage st-social-feed
 */


function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Social Feed Setting</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("st_section");
	            do_settings_sections("st_theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function st_add_theme_menu_item()
{
	add_menu_page("ST Social Feed", "ST Social Feed", "manage_options", "social-feed", "theme_settings_page", null, 99);
}

add_action("admin_menu", "st_add_theme_menu_item");


function st_display_url() {
	?>
	<div><a href="https://smashballoon.com/instagram-feed/token/" target="_blank">Click here for insta access token</a></div>
  <?php
}

function st_display_key()
{
	?>
      <input type="text" value="<?php echo get_option('st-key'); ?>" name="st-key" id="st-key">
    <?php
}

function st_display_feed()
{
	?>
      <input type="text" value="<?php echo get_option('st-feed'); ?>" name="st-feed" id="st-feed">
    <?php
}

function st_display_row()
{
	?>
      <input type="text" value="<?php echo get_option('st-row'); ?>" name="st-row" id="st-row">
    <?php
}



function st_display_theme_panel_fields()
{
	add_settings_section("st_section", "ST Social Feed", null, "st_theme-options");

	add_settings_field("", "", "display_url", "st_theme-options", "st_section");
	
	add_settings_field("st-key", "Enter access token", "st_display_key", "st_theme-options", "st_section");
	add_settings_field("st-feed", "Enter number of feed", "st_display_feed", "st_theme-options", "st_section");
	add_settings_field("st-row", "Enter number of row", "st_display_row", "st_theme-options", "st_section");

    register_setting("st_section", "st-key");
    register_setting("st_section", "st-feed");
    register_setting("st_section", "st-row");
}

add_action("admin_init", "st_display_theme_panel_fields");