<?php

function do_html_header($title)
{
  // print an HTML header
?>

  <img src='<?php echo base_url('images/bookmark.gif') ?>' alt="Bookmarker logo" border=0
       align=left valign=bottom height = 55 width = 57 />
  <h1>&nbsp;Bookmarker</h1>
  <hr />
<?php
  if($title)
    do_html_heading($title);
}


function do_html_heading($heading)
{
  // print heading
?>
  <h2><?php echo $heading;?></h2>
<?php
}

function do_html_URL($url, $name)
{
  // output URL as link and br
?>
  <br /><a href="<?php echo base_url('index.php/bookmarker').'/'.$url;?>"><?php echo $name;?></a><br />
<?php
}

function display_site_info()
{
  // display some marketing info
?>
  <ul>
  <li>Store your bookmarks online</li>
  <li>See what other users use</li>
  <li>Share your favorite links with others!</li>
  </ul>
<?php
}

function display_login_form()
{
?>
  <a href='<?php echo base_url('index.php/bookmarker/register_form') ?>'>Not a member?</a>
  <form method='post' action='<?php echo base_url('index.php/bookmarker/member') ?>'>
  <table bgcolor='#cccccc'>
   <tr>
     <td colspan=2>Members log in here:</td>
   <tr>
     <td>Username:</td>
     <td><input type='text' name='username'></td></tr>
     <tr><td>&nbsp</td></tr>
   <tr>
     <td>Password:</td>
     <td><input type='password' name='passwd'></td></tr>
      <tr><td>&nbsp</td></tr>
   <tr>
     <td colspan=2 align='center'>
     <input type='submit' value='Log in'></td></tr>
   <tr>
     <td colspan=2><a href='<?php echo base_url('index.php/bookmarker/forgot_form') ?>'>Forgot your password?</a></td>
   </tr>
 </table></form>
<?php
}

function display_registration_form()
{
?>
 <form method='post' action='<?php echo base_url('index.php/bookmarker/register_new') ?>'>
 <table bgcolor='#cccccc'>
   <tr>
     <td>Email address:</td>
     <td><input type='text' name='email' size=30 maxlength=100></td></tr>
   <tr>
    <tr><td>&nbsp</td></tr>
     <td>Preferred username <br />(max 16 chars):</td>
     <td valign='top'><input type='text' name='username'
                     size=16 maxlength=16></td></tr>
   <tr>
     <td>Password <br />(between 6 and 16 chars):</td>
     <td valign='top'><input type='password' name='passwd'
                     size=16 maxlength=16></td></tr>
                      <tr><td>&nbsp</td></tr>
   <tr>
     <td>Confirm password:</td>
     <td><input type='password' name='passwd2' size=18 maxlength=18></td></tr>
      <tr><td>&nbsp</td></tr>
   <tr>
     <td colspan=2 align='center'>
     <input type='submit' value='Register'></td></tr>
 </table></form>
<?php 

}

function display_user_urls($url_array)
{
  // display the table of URLs

  // set global variable, so we can test later if this is on the page
  global $bm_table;
  $bm_table = true;
?>
  <br />
  <form name='bm_table' action='<?php echo base_url('index.php/bookmarker/delete_bms') ?>' method='post'>
  <table width=300 cellpadding=2 cellspacing=0>
  <?php
  $color = "#cccccc";
  echo "<tr bgcolor='$color'><td><strong>Bookmark</strong></td>";
  echo "<td><strong>Delete?</strong></td></tr>";
  if (is_array($url_array) && count($url_array)>0)
  {
    foreach ($url_array as $url)
    {
      if ($color == "#cccccc")
        $color = "#ffffff";
      else
        $color = "#cccccc";
      // remember to call htmlspecialchars() when we are displaying user data
      echo "<tr bgcolor='$color'><td><a href=\"$url\">".htmlspecialchars($url)."</a></td>";
      echo "<td><input type='checkbox' name=\"del_me[]\"
             value=\"$url\"></td>";
      echo "</tr>"; 
    }
  }
  else
    echo "<tr><td>No bookmarks on record</td></tr>";
?>
  </table> 
  </form>
<?php
}

function display_user_menu()
{
  // display the menu options on this page
?>
<hr />
<a href='<?php echo base_url('index.php/bookmarker/member') ?>'>Home</a> &nbsp;|&nbsp;
<a href='<?php echo base_url('index.php/bookmarker/add_bm_form') ?>'>Add BM</a> &nbsp;|&nbsp; 
<?php
  // only offer the delete option if bookmark table is on this page
  global $bm_table;
  if($bm_table==true)
    echo "<a href='#' onClick='bm_table.submit();'>Delete BM</a>&nbsp;|&nbsp;"; 
  else
    echo "<font color='#cccccc'>Delete BM</font>&nbsp;|&nbsp;"; 
?>
<a href="change_passwd_form">Change password</a>
<br /><br />
<a href='<?php echo base_url('index.php/bookmarker/recommend')?>'>Recommend URLs to me</a> &nbsp;|&nbsp;
<a href='<?php echo base_url('index.php/bookmarker/logout') ?>'>Logout</a> 
<hr />

<?php
}

function display_add_bm_form()
{
  // display the form for people to ener a new bookmark in
?>
<form name='bm_table' action='<?php echo base_url('index.php/bookmarker/add_bms') ?>' method='post'>
<table width=250 cellpadding=2 cellspacing=0 bgcolor='#cccccc'>
<tr><td>New BM:</td><td><input type='text' name='new_url'  value="http://"
                        size=30 maxlength=255></td></tr>
<tr><td colspan=2 align='center'><input type='submit' value='Add bookmark'></td></tr>
</table>
</form>
<?php
}

function display_password_form()
{
  // display html change password form
?>
   <br />
   <form action='<?php echo base_url('index.php/bookmarker/change_passwd')?>' method='post'>
   <table width=250 cellpadding=2 cellspacing=0 bgcolor='#cccccc'>
   <tr><td>Old password:</td>
       <td><input type='password' name='old_passwd' size=18 maxlength=16></td><td>&nbsp</td>
   </tr>
   <tr><td>New password:</td>
       <td><input type='password' name='new_passwd' size=18 maxlength=16></td>
   </tr>
   <tr><td>Repeat new password:</td>
       <td><input type='password' name='new_passwd2' size=18 maxlength=16></td>
   </tr>
   <tr><td colspan=2 align='center'><input type='submit' value='Change password'>
   </td></tr>
   </table>
   <br />
<?php
};

function display_forgot_form()
{
  // display HTML form to reset and email password
?>
   <br />
   <form action='<?php echo base_url('index.php/bookmarker/forgot_passwd') ?>' method='post'>
   <table width=250 cellpadding=2 cellspacing=0 bgcolor='#cccccc'>
   <tr><td>Enter your username</td>
       <td><input type='text' name='username' size=16 maxlength=16></td>
   </tr>
   <tr><td colspan=2 align='center'><input type='submit' value='Change password'>
   </td></tr>
   </table>
   <br />
<?php
};

function display_recommended_urls($url_array)
{
  // similar output to display_user_urls
  // instead of displaying the users bookmarks, display recomendation
?>
  <br />
  <table width=300 cellpadding=2 cellspacing=0>
<?php
  $color = "#cccccc";
  echo "<tr bgcolor=$color><td><strong>Recommendations</strong></td></tr>";
  if (is_array($url_array) && count($url_array)>0)
  {
    foreach ($url_array as $url)
    {
      if ($color == "#cccccc")
        $color = "#ffffff";
      else
        $color = "#cccccc";
      echo "<tr bgcolor='$color'><td><a href=\"$url\">".htmlspecialchars($url)."</a></td></tr>";
    }
  }
  else
    echo "<tr><td>No recommendations for you today.</td></tr>";
?>
  </table>
<?php
};

?>