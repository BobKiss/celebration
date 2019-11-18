<?php
/**
* Template Name: ContactUS
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

?>

<div class="template_wrapper ContactUsTemplate">

  <div class="contactUsPage">
    <div class="container">
      <div class="contact_name_section wow fadeInDown">
        <span class="hebrew">צור קשר </span>
        <div class="line">
        </div>
      </div>
      <div class="content_row">
        <div class="contactForm wow fadeInRight">
          <?php echo do_shortcode('[wpforms id="94"]'); ?>
        </div> <!-- contactForm -->
        <div class="map  wow fadeInLeft">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3379.494207819455!2d34.8391916!3d32.109953!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDA2JzM1LjgiTiAzNMKwNTAnMjEuMSJF!5e0!3m2!1sru!2sua!4v1567675993681!5m2!1sru!2sua" width="100%" height="640px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          <div id="map"></div>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- <script>

  var map;
  function initMap() {
    organizationPosition = {
      // lat: lat,
      lat: 32.109953,
      // lng: lng,
      lng: 34.8391916
    };
      map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: 32.109953,
            lng: 34.8391916
          },
          zoom: 17,
          disableDefaultUI: true,
          styles: cannaMap
      });
      // markers
      var marker = new google.maps.Marker({
        position: organizationPosition,
        icon: '<?php echo get_template_directory_uri(); ?>/assets/images/icons/map_marker.svg',
        map: map
      });
  }

  var cannaMap = [
  {
      "featureType": "all",
      "elementType": "labels.text.fill",
      "stylers": [
          {
              "saturation": 36
          },
          {
              "color": "#333333"
          },
          {
              "lightness": 40
          }
      ]
  },
  {
      "featureType": "all",
      "elementType": "labels.text.stroke",
      "stylers": [
          {
              "visibility": "on"
          },
          {
              "color": "#ffffff"
          },
          {
              "lightness": 16
          }
      ]
  },
  {
      "featureType": "all",
      "elementType": "labels.icon",
      "stylers": [
          {
              "visibility": "off"
          }
      ]
  },
  {
      "featureType": "administrative",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "color": "#fefefe"
          },
          {
              "lightness": 20
          }
      ]
  },
  {
      "featureType": "administrative",
      "elementType": "geometry.stroke",
      "stylers": [
          {
              "color": "#fefefe"
          },
          {
              "lightness": 17
          },
          {
              "weight": 1.2
          }
      ]
  },
  {
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#f5f5f5"
          },
          {
              "lightness": 20
          }
      ]
  },
  {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#f5f5f5"
          },
          {
              "lightness": 21
          }
      ]
  },
  {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#dedede"
          },
          {
              "lightness": 21
          }
      ]
  },
  {
      "featureType": "road.highway",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "color": "#ffffff"
          },
          {
              "lightness": 17
          }
      ]
  },
  {
      "featureType": "road.highway",
      "elementType": "geometry.stroke",
      "stylers": [
          {
              "color": "#ffffff"
          },
          {
              "lightness": 29
          },
          {
              "weight": 0.2
          }
      ]
  },
  {
      "featureType": "road.arterial",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#ffffff"
          },
          {
              "lightness": 18
          }
      ]
  },
  {
      "featureType": "road.local",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#ffffff"
          },
          {
              "lightness": 16
          }
      ]
  },
  {
      "featureType": "transit",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#f2f2f2"
          },
          {
              "lightness": 19
          }
      ]
  },
  {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#e9e9e9"
          },
          {
              "lightness": 17
          }
      ]
  }
];
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8AC2wa1fuwpYTfc3LIPywipXzBi0DiYQ&callback=initMap"
async defer></script> -->
<?php

get_footer();
