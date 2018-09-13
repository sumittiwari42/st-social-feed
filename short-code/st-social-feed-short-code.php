<?php

/**
 * ST Social Feed
 * 
 * 
 * @package WordPress
 * @subpackage st-social-feed
 * @author Sumit Tiwari 
 */


/**
 * Create Shortcode for Social Feed
 *
 * @param Array 
 * @param Content inside shorcode
 * @return DOM element
 */
function st_stap_display_shortcode($atts, $content=null){
	
  $access_token = get_option('st-key');
  $photo_count = get_option('st-feed');
  $row_count = get_option('st-row');
                                       
  $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
  $json_link.="access_token={$access_token}&count={$photo_count}";
  $json = file_get_contents($json_link);
  $obj = json_decode($json);
  $data = $obj->data;

  $result = '<div class="st-insta-feed-wrapp" row="'.$row_count.'">';
    foreach ($data as $key => $value) {
      $result .= '<div class="st-insta-box"><div class="st-insta-img"><a href='.$value->link.' ><img src="'.$value->images->standard_resolution->url.'"  /></a></div></div>';
    }
      $result .= '</div>';
     
     echo $result;                            
}

add_shortcode( 'st_social_feed', 'st_stap_display_shortcode' );