<?php
  require_once('bookmark_fns.php');
  //session_start();
 
  //create short variable names
  if(isset($_POST['del_me']))$del_me = $_POST['del_me'];
  if(isset($_SESSION['valid_user']))$valid_user = $_SESSION['valid_user'];
 
  do_html_header('Deleting bookmarks');
  check_valid_user();
  if (/*isset($HTTP_POST_VARS)&&*/!filled_out($_POST))
  {
    echo 'You have not chosen any bookmarks to delete.
         Please try again.';
    display_user_menu();  
    exit;
  }
  else 
  {
    if (isset($del_me)&&(count($del_me) >0))
    {
      foreach($del_me as $url)
      {
        if (delete_bm($valid_user, $url))
          echo 'Deleted '.htmlspecialchars($url).'.<br />';
        else
          echo 'Could not delete '.htmlspecialchars($url).'.<br />';
      } 
    }
    else
      echo 'No bookmarks selected for deletion';
  }
  // get the bookmarks this user has saved
  if ( isset( $_SESSION['valid_user'] ) && ( $url_array = get_user_urls( $valid_user ) ) )
    display_user_urls($url_array);

  display_user_menu(); 
?>