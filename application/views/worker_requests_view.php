<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('worker_templates/wheader');
$obj['lat']=42.70;
$obj['lng']=23.33;
?>
  <div class="container container-main">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
      <li class="active"><a href="#current" data-toggle="tab">Настоящи</a></li>
      <li><a href="#upcoming" data-toggle="tab">Предстоящи</a></li>
    </ul>
    <div id="tab-content" class="tab-content">
      <div class="tab-pane active" id="current">
        <div class="row">
          <div class="col-md-6" style="height: 450px; margin-bottom: 20px;">
            <div id="map-canvas" class="size-map col-xs-12" style="height: 100%; border: 1px solid #000;"></div>
          </div>
          <div class="col-md-6">
            <h3>Адрес</h3>
            <br/><br/><br/><br/>
            <h3>Телефони за контакт</h3>
            <br/><br/><br/><br/>
            <h3>Моята заплата по тази поръчка</h3>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="upcoming">
        <div style="height: 300px"></div>
      </div>
    </div>
  </div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
  <script type="text/javascript">
    var geocoder;
    var map;
    function initialize() {
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(<?php echo $obj['lat'] ?>,<?php echo $obj['lng'] ?>);
      var z=15;
      var mapOptions = {
        zoom: z,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      placeLocation(latlng);
    }
    function placeLocation(LatLng) {
      var image='<?php echo base_url(); ?>assets/img/small_pin.png';
      map.setCenter(LatLng);
      var marker = new google.maps.Marker({
        map: map,
        position: LatLng,
        icon: image,
        title: '',
        draggable: false
      });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
<?php
$this->load->view('worker_templates/wfooter');
?>
