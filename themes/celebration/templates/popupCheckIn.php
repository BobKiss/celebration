<?php
/**
* Template Name: popupCheckIn
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
      <div class="title">המשרה</div>
      <form class="checkin" >
        <span class="Name">אלמ םש</span>
        <input type="text" placeholder="אלמ םש">
        <span class="Name"> דיינ ןופלט</span>
        <input type="tel" placeholder=" דיינ ןופלט">
        <span class="Name">ליימ</span>
        <input type="email" placeholder="ליימ">
        <span class="Name">תיחכונ המסיס</span>
        <input type="password" placeholder="תיחכונ המסיס">
        <span class="Name">השדח המסיס</span>
        <input type="password" placeholder="השדח המסיס">
        <a href="#" class="Login">המשרה</a>
      </form> <!-- checkin -->
      <span class="forgotpass">תורבחתהל ןאכ ץחל ?שמתשמ רבכ ךל שי</span>
    </div> <!-- popupcontent -->
  </div> <!-- popup -->
</div> <!-- overlay -->
<?php

get_footer();
