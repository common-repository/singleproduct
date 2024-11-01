<?php
//----------------------------------------------------------
function SingleProcuct_func_wpPostmeta($id,$metakey)
{
  global $wpdb;
  
  $sql="SELECT * FROM `wp_postmeta` where post_id=$id and meta_key='$metakey' ";
  $result = $wpdb->get_results( $sql);
  if(!isset( $result ))return 0;
  if(empty($result))    return "";
  return  $result[0]->meta_value ;
}
//--------------------------------------
function SingleProcuct_func_wpPost($id)
{
  global $wpdb;
  
  $sql="SELECT * FROM `wp_posts` where id=$id ";
  $result = $wpdb->get_results( $sql);
  if(!isset( $result ))return 0;
  if(empty($result))    return "";
  return  $result ;
}