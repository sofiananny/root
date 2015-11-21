<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('worker_templates/wheader');
$this->output->enable_profiler(TRUE);
$obj['lat']=42.70;
$obj['lng']=23.33;
?>
  <div class="container container-main">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
      <li class="active"><a href="#waiting" data-toggle="tab">Чакащи</a></li>
      <li><a href="#current" data-toggle="tab">Настояща</a></li>
      <li><a href="#upcoming" data-toggle="tab">Предстояща</a></li>
    </ul>
    <div id="tab-content" class="tab-content">
      <div class="tab-pane active" id="waiting"> 
         <!-- <div class="col-md-4" style="height: 450px; margin-bottom: 20px;">
            <div id="map-canvas" class="size-map col-xs-12" style="height: 100%; border: 1px solid #000; display:none"></div>
          </div>-->
          <div class="row">
          <div class="col-md-3">
            <h5>Дата:</h5>
            <br/>
            <h5>Начален час:</h5>
            <br/>
            <h5>Продължителност:</h5>
          </div>
          <div class="col-md-5">
            <h5>Адрес:</h5>
            <br/>
            <h5>Брой Деца:</h5>
            <br/>
            <h5>Подкрепление:</h5>
        </div>
        <div class="col-md-4">
            <br/><br/><br/><br/><br/><br/><br/><br/>
            <button>Отхвърли</button>
            <button style="background-color: blue">Потвърди</button>
        </div>
      </div>
      </div>
      <div class="tab-pane" id="current">
        <div>
        <div class="row">
          <div class="col-md-6">
           Край от студент:&nbsp
	  <label class="checkbox-inline"><input type="checkbox" unchecked data-toggle="toggle" data-size="small" data-on="Да" data-off="Не" data-width="70"></label>
            <br/><br/>
            <form>
            Парола на родител:
            <input type="password" name="parrent-password"> 
            <input type="submit" value="OK">
            <br/><br/>
            
           Край от родител:
	<label class="checkbox-inline"><input type="checkbox" disabled data-toggle="toggle" data-size="small" data-on="Да" data-off="Не" data-width="70"></label>
            <br/><br/>
            <h5> Телефон на родител:</h5>
            <br/>
            <h5>Адрес:</h5>
             <br/>
             <h5>Моята заплата за тази поръчка:

          </div>
      </div>
      </div>
      </div>
      <div class="tab-pane" id="upcoming">
        <div>
        <div class="row">
          <div class="col-md-3">
            <h5>Дата:</h5>
            <br/>
            <h5>Начален час:</h5>
            <br/>
            <h5>Продължителност:</h5>
          </div>
          <div class="col-md-5">
            <h5>Адрес:</h5>
            <br/>
            <h5>Брой Деца:</h5>
            <br/>
            <h5>Подкрепление:</h5>
        </div>
        </div>
        
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