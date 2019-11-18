<?php
/**
* Template Name: popup
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

?>
<div class="overlay">
  <div class="popup">
    <span class="close"></span>
    <div class="popupcontent">
      <div class="title">תורבחתה</div>
      <form class="login_form" action="index.html" method="post">
        <span class="Name">ליימ</span>
        <input type="email" placeholder="ליימ">
        <span class="Name">המסיס</span>
        <input type="password" placeholder="המסיס">
        <a href="#" class="Login">התחברות</a>
      </form> <!-- login_form -->
      <span class="forgotpass">!ןאכ ץחל ?ךלש המסיסה תא תחכש</span>
    </div> <!-- popupcontent -->
  </div> <!-- popup -->
</div> <!-- overlay -->
<?php

get_footer();
