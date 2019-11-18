jQuery(document).ready(function ($) {

// $('.celebrationPostsHomepage.mobile .posts ').slick({
//   rtl: true,
//   slidesToShow: 2,
//   slidesToScroll: 2,
//   rows: 2,
//   nextArrow: `
//   <a class="slick-next">
//     <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
//     <path d="M1.72625 22.5C2.05478 22.5 2.36098 22.374 2.59732 22.1324L12.1448 12.3747C12.6184 11.8907 12.6184 11.1093 12.1448 10.6253L2.59732 0.867559C2.1178 0.37748 1.3347 0.37748 0.855178 0.867559C0.381607 1.35156 0.381607 2.13292 0.855178 2.61692L9.54685 11.5L0.855178 20.3831C0.381607 20.8671 0.381607 21.6484 0.855178 22.1324C1.09151 22.374 1.39772 22.5 1.72625 22.5Z" fill="#DFA29D" stroke="#DFA29D"/>
//   </svg>
//
//   </a>
//   `,
//   prevArrow: `
//   <a class="slick-prev">
//     <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
//     <path d="M12.1448 22.1324L11.7892 21.7844L12.1448 22.1324C11.9085 22.374 11.6023 22.5 11.2738 22.5C10.9452 22.5 10.639 22.374 10.4027 22.1324L10.7601 21.7828L10.4027 22.1324L0.855177 12.3747C0.381607 11.8907 0.381607 11.1093 0.855177 10.6253L10.4027 0.867559C10.8822 0.37748 11.6653 0.37748 12.1448 0.867559C12.6184 1.35156 12.6184 2.13292 12.1448 2.61692L3.45315 11.5L12.1448 20.3831C12.6184 20.8671 12.6184 21.6484 12.1448 22.1324Z" fill="#DFA29D" stroke="#DFA29D"/>
//   </svg>
//
//   </a>
//   `,
// });

// $('.celebrationShopSection.mobile .shopContent .tabContentContainer .active .productsList > .mobileSlidersWrapper').slick({
//   rtl: true,
//   slidesToShow: 2,
//   slidesToScroll: 2,
//   rows: 2,
//   nextArrow: `
//   <a class="slick-next">
//     <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
//     <path d="M1.72625 22.5C2.05478 22.5 2.36098 22.374 2.59732 22.1324L12.1448 12.3747C12.6184 11.8907 12.6184 11.1093 12.1448 10.6253L2.59732 0.867559C2.1178 0.37748 1.3347 0.37748 0.855178 0.867559C0.381607 1.35156 0.381607 2.13292 0.855178 2.61692L9.54685 11.5L0.855178 20.3831C0.381607 20.8671 0.381607 21.6484 0.855178 22.1324C1.09151 22.374 1.39772 22.5 1.72625 22.5Z" fill="#DFA29D" stroke="#DFA29D"/>
//   </svg>
//
//   </a>
//   `,
//   prevArrow: `
//   <a class="slick-prev">
//     <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
//     <path d="M12.1448 22.1324L11.7892 21.7844L12.1448 22.1324C11.9085 22.374 11.6023 22.5 11.2738 22.5C10.9452 22.5 10.639 22.374 10.4027 22.1324L10.7601 21.7828L10.4027 22.1324L0.855177 12.3747C0.381607 11.8907 0.381607 11.1093 0.855177 10.6253L10.4027 0.867559C10.8822 0.37748 11.6653 0.37748 12.1448 0.867559C12.6184 1.35156 12.6184 2.13292 12.1448 2.61692L3.45315 11.5L12.1448 20.3831C12.6184 20.8671 12.6184 21.6484 12.1448 22.1324Z" fill="#DFA29D" stroke="#DFA29D"/>
//   </svg>
//
//   </a>
//   `,
// });

$('.mainNavigationContainer .menu-item-has-children > a, .fullscreenMenu .menu-item-has-children > a').click(function (e) {
  console.log('click and prev def');
  e.preventDefault();
  $(this).parent().toggleClass('active');
  $(this).parent().find('.sub-menu').toggleClass('activeMenu');
  $('.mainNavigationContainer .activeLine').toggleClass('hide');
});

});
