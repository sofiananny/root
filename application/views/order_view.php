<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
$url=base_url().'assets/img';
$script="    $('#duration').val({$_SESSION['order']['duration']});\n";
?>
  <div class="blue">
    <div class="white-container container">
      <center style="margin: 40px 0">
        <div class="wizard row">
          <a class="col-xs-3-" onclick="next(1)"><div><span class="badge hidden-xs">1</span> Адрес</div></a>
          <a class="col-xs-3-" onclick="next(2)"><div><span class="badge hidden-xs">2</span> Дата и час</div></a>
          <a class="col-xs-3-" onclick="next(3)"><div><span class="badge hidden-xs">3</span> Бавачка</div></a>
          <a class="col-xs-3_" onclick="next(4)"><div><span class="badge hidden-xs">4</span> Поръчай</div></a>
        </div>
      </center>
      <form id="order_data" action="order/validate">
        <div id="step1" class="step">
          <center style="margin: 40px 0"><h1>Къде искате да ви посети нашата Nanny?</h1></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Град</label>
                <select id="city" class="form-control" name="city" disabled>
                  <option class="form-control" value="1" selected>София</option>
                </select>
                </div>
              </div>
             <br/>
             <br/>
             <br/><br/>
             <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Квартал</label>
                <select id="district" class="form-control" name="district">
<?php echo $districts; ?>
                </select>
                 </div>
                <label class="control-label">Адрес</label>
                <input id="street" class="form-control" type="text" name="street" placeholder="Улица / булевард"
                       value="<?php echo htmlspecialchars($_SESSION['order']['street']); ?>"/>
                       <br/>
              <table id="adr-table">
                <tr>
                  <td class="form-group">
                    <input id="number" class="form-control" type="text" name="number" placeholder="N"
                           value="<?php echo htmlspecialchars($_SESSION['order']['number']); ?>"/>
                  </td>
                  <td class="form-group">
                    <input id="building" class="form-control" type="text" name="building" placeholder="Блок"
                           value="<?php echo htmlspecialchars($_SESSION['order']['building']); ?>"/>
                  </td>
                  <td class="form-group">
                    <input id="gate" class="form-control" type="text" name="gate" placeholder="Вход"
                           value="<?php echo htmlspecialchars($_SESSION['order']['gate']); ?>"/>
                  </td>
                  <td class="form-group">
                    <input id="floor" class="form-control" type="text" name="floor" placeholder="Етаж"
                           value="<?php echo htmlspecialchars($_SESSION['order']['floor']); ?>"/>
                  </td>
                  <td class="form-group">
                    <input id="apartment" class="form-control" type="text" name="apartment" placeholder="Ап."
                           value="<?php echo htmlspecialchars($_SESSION['order']['apartment']); ?>"/>
                  </td>
                </tr>
              </table>
              <div class="form-group">
                <label class="control-label">Допълнително описание</label>
                <textarea id="note" class="form-control" name="note" style="resize: none;"><?php echo $_SESSION['order']['note']; ?></textarea>
              </div>
            </div>
           <!--  <div class="col-md-6">
              <br/>
             <div id="map-canvas" class="size-map" style="height: 350px; border: 1px solid #000;"></div> 
            </div>-->
          </div>
        </div>
        <div id="step2" class="step">
          <center style="margin: 40px 0"><h1>Дата и час на посещението</h1></center>
          <div class="row">
            <div class="col-md-7">
              <div class="col-sm-6 form-group">
                <label class="col-sm-4 control-label">Дата</label>
                <div class="col-sm-8 input-group input-append date">
                  <input id="date" type="text" class="form-control" name="date" readonly value="<?php echo $_SESSION['order']['date']; ?>"/>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <span class="help-block pull-right">Изберете дата!</span>
              </div>
              <div class="col-sm-6 form-group">
                <label class="col-lg-6 col-sm-5 col-sm-offset-1 control-label">Начален час</label>
                <div class="col-lg-5 col-sm-6 input-group clockpicker" data-placement_="" data-align="top" data-autoclose="true">
                  <input id="time" class="form-control" type="text" name="time" readonly value="<?php echo $_SESSION['order']['time']; ?>"/>
                  <span class="input-group-addon" onclick="$('#time').focus()" style="cursor: pointer">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
                <span class="help-block pull-right">Посочете час!</span>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="col-lg-5 col-md-6 col-sm-4 control-label" style="margin-left: 15px; margin-right: -15px;">Продължителност</label>
                <div class="col-lg-7 col-md-6 col-sm-8">
                  <select id="duration" class="form-control" type="text" name="duration" style="padding-right: 0;">
                    <option class="form-control" style="display: none;" value="0"></option>
                    <option class="form-control" value="1">1 час</option>
                    <option class="form-control" value="2">2 часа</option>
                    <option class="form-control" value="3">3 часа</option>
                    <option class="form-control" value="4">4 часа</option>
                    <option class="form-control" value="5">5 часа</option>
                    <option class="form-control" value="6">6 часа</option>
                  </select>
                </div>
                <span class="help-block pull-right" style="padding-right: 15px;">Изберете продължителност!</span>
              </div>
            </div>
          </div>
        </div>
        <div id="step3" class="step">
          <center style="margin: 40px 0"><h1>Изберете своята бавачка</h1></center>
          <div class="row">

          </div>
        </div>
        <div id="step4" class="step">
          <div class="row">
            <div class="col-md-6">
              <center style="margin: 20px 0"><h3>Условия на поръчката</h3></center>
              <div id="order_prop"></div>
            </div>
            <div class="col-md-6">
              <div id="pay_prop"></div>
              <br/>
              <!--<label class="form-group">
                <input id="agree" type="checkbox" name="agree">
                <label class="control-label">&nbsp;Прочетох и се съгласявам с условията и цената</label><br/>
                <span class="help-block">Моля, потвърдете!</span>
              </label>-->
<?php if (!isset($_SESSION['userid'])) { ?>
              <div id="log_me" class="alert alert-danger">
<?php } else { ?>
              <div id="log_me" class="alert alert-danger" style="display: none;">
<?php } ?>                
                За да завършите поръчката 
                <label data-toggle="modal" data-target="#nannyLoginModal" onclick="showLogin('login-div')">
                  <u>влезте в профила си</u>
                </label>.<br/>
                Ако нямате регистрация може да я направите
                <label data-toggle="modal" data-target="#nannyLoginModal" onclick="showLogin('regist')">
                  <u>тук</u>
                </label>.
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="row">
        <center style="height: 15px; margin-top: 10px">
          <span id="cyrillic" class="help-block">Моля, пишете на кирилица!</span>
        </center>
        <hr/>
</div>
      <a id="next" class="btn btn-login fw pull-right" onclick="next(2);" style="width: 200px;">продължи</a>
      <a id="pay" class="btn btn-warning btn-lg pull-right" style="display: none;" onclick="agree()">поръчай</a>
    </div>
  </div>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.css">
  <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/locales/bootstrap-datepicker.bg.min.js" charset="UTF-8"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css" type="text/css"/>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
  <script>
    var geocoder;
    var map;
    var map_ini=false;
    var markersArray=[];
    function initialize() {
      geocoder = new google.maps.Geocoder();
      if ($('#district').val()==0){
        var latlng = new google.maps.LatLng(42.71,23.33);
        var z=11;
      }
      else{ $('#district').change(); }
      var mapOptions = {
        zoom: z,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      
    }
    function placeLocation(LatLng) {
      var image='<?php echo base_url(); ?>assets/img/small_pin.png';
      map.setCenter(LatLng);
      if (markersArray) { for (var i=0; i<markersArray.length; i++) { markersArray[i].setMap(null); } }
      var marker = new google.maps.Marker({
        map: map,
        position: LatLng,
        icon: image,
        title: '',
        draggable: true
      });
      markersArray.push(marker);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    $('#district').change(function(){
      var adr=$("#district option:selected").text()+',София,България';
      geocoder.geocode( { 'address': adr}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          LatLng=new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
          map.setCenter(LatLng);
          map.setZoom(15);
          placeLocation(LatLng);
        }
      });
    });

    $("#to_order").attr("onclick","");
    $('.input-append.date').datepicker({
      format: "dd/mm/yyyy",
      startDate: <?php echo '"'.date('d/m/Y').'"'; ?>,
      weekStart: 1,
      endDate: "+1m",
      language: "bg",
      clearBtn: true,
      autoclose: true,
      todayHighlight: true
    });
    $(function() {
      $('#time').timepicker({
        timeFormat: 'HH:mm',
        minTime: '7:00',
        maxTime: '22:00',
        scrollbar: false,
        dynamic: false
      });
     });
    function next(step){
      $(window).scrollTop(0);
      $('#cyrillic').hide(300);
      if (step<5 && !$(".wizard a:nth-child("+step+")").hasClass("current")) {
        if (step>0) { json_sbm($("#order_data").attr("action"),$('#order_data').serialize()+'&step='+step); }
        else {
          $('#step1').show(600);
          $(".wizard a:nth-child(0)").addClass('current');
          $('#next').attr("onclick","next(1)");
        }
      }
    }
    function show_step(step,order_prop,pay_prop){
      if (!$(".wizard a:nth-child("+step+")" ).hasClass("current")) {
        $('.step').hide(600);
        $('.current').removeClass('current');
        $('#step'+step).show(600);
        $(".wizard a:nth-child("+step+")" ).addClass('current');
        if (step<4) {
          if (step==1 && map_ini==false) { 
            setTimeout(function(){ initialize(); map_ini=true; }, 600);
            //google.maps.event.trigger(map, "resize");
          }
          step++;
          $('#next').attr("onclick","next("+step+")");
          $('#next').show();
          $('#pay').hide();
        }
        else {
          $('#next').hide();
          $('#pay').show();
          $('#order_prop').html(order_prop);
          $('#pay_prop').html(pay_prop);
        }
      }
    }
    function agree(){
      $('.has-error').removeClass('has-error');
      $('.help-block').hide(300);
      if ($("#log_me").is(":hidden")) {
        if ($("#agree").is(":checked")) { window.location.href='payment'; }
        else { 
          $("#agree").parent().addClass('has-error');
          $('.help-block',$("#agree").parent()).show(600);
        }
      }
    }
    $('#number,#building,#gate,#floor,#apartment').on('input', function() { 
      if ($(this).val()=='') { $(this).css('text-transform','none'); }
      else { $(this).css('text-transform','uppercase'); }
    });
    $( document ).ready(function() {
<?php
    echo "      $('#duration').val({$_SESSION['order']['duration']});\n";
    if (isset($_SESSION['order']['step']) && $_SESSION['order']['step']>1) { 
      echo "      next({$_SESSION['order']['step']});\n"; 
    }
    else {
      echo "      $('#step1').show();\n      $(\".wizard a:nth-child(1)\").addClass('current');\n       map_ini=true\n";
    }
?>
    });
  </script>
<?php
//var_dump($_SESSION);
$this->load->view('templates/footer');
?>