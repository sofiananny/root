<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('worker_templates/wheader');
$obj['lat']=42.70;
$obj['lng']=23.33;


$unapproved_count = count($unapproved_orders);
$approved_count = count($approved_orders);
?>
  <div class="container container-main">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
      <li class="active"><a href="#waiting" data-toggle="tab">Чакащи <?php echo "($unapproved_count)"; ?></a></li>
      <li><a href="#current" data-toggle="tab">Настояща</a></li>
      <li><a href="#upcoming" data-toggle="tab">Предстоящи <?php echo "($approved_count)"; ?></a></li>
    </ul>
    <div id="tab-content" class="tab-content">
      <div class="tab-pane active" id="waiting"> 
         <!-- <div class="col-md-4" style="height: 450px; margin-bottom: 20px;">
            <div id="map-canvas" class="size-map col-xs-12" style="height: 100%; border: 1px solid #000; display:none"></div>
          </div>-->
          
          <?php
            foreach ($unapproved_orders as $value) {
              $order_address = "кв. $value[dist_name], ул. $value[street]  $value[street_number] вх. $value[gate] ап. $value[apartment]";
              $support = '-';
              if($value['nanny_id2'] > 0)
              {
                //which nannie is logged and which one is support
                //TOOD add links
                if($_SESSION['worker_id'] == $value['nanny_id1'])
                {
                  $support = $value['worker2'];
                }else
                {
                  $support = $value['worker1'];
                }
              }
              echo "
              <form method='post' action='requests/approve_order'>
              <input type='hidden' name='order_id' value='$value[order_id]'/>
              <input type='hidden' name='nanny_id1' value='$value[nanny_id1]'/>
              <input type='hidden' name='nanny_id2' value='$value[nanny_id2]'/>
              <div class='row'>
                <div class='col-md-3'>
                  <h5>Дата: $value[order_date]</h5>
                  <br/>
                  <h5>Начален час: $value[order_time]</h5>
                  <br/>
                  <h5>Продължителност: $value[duration]</h5>
                </div>
                <div class='col-md-5'>
                  <h5>Адрес: $order_address</h5>
                  <br/>
                  <h5>Брой Деца: $value[kids_count]</h5>
                  <br/>
                  <h5>Подкрепление: <a href='#'>$support </a></h5>
                </div>
                <div class='col-md-4'>
                  <br/><br/><br/><br/><br/><br/><br/><br/>";
                if($value['order_id'] > 0)
                {
                  echo "<button class='btn btn-success'>Потвърди</button>
                  <button class='btn btn-danger' onclick='decline()'>Отхвърли</button>";
                }
                echo '</div>
              </div>
              </form>';
            }
          ?>
      </div>
      <div class="tab-pane" id="current">
        <div>
          <div class="row">
            <div class="col-md-6">
              <!--Край от родител:
              <label class="checkbox-inline"><input type="checkbox" disabled data-toggle="toggle" data-size="small" data-on="Да" data-off="Не" data-width="70"></label>
              <br/><br/>-->
              <?php
                if(count($current_order) > 0)
                {
                  echo validation_errors();

                  echo 'Край от студент:&nbsp
                         <label class="checkbox-inline"><input type="checkbox" unchecked data-toggle="toggle" data-size="small" data-on="Да" data-off="Не" data-width="70"></label>
                         <br/><br/>
                         <form method="post" action="requests/parent_approve" id="form_parent_approve">
                           Парола на родител:
                           <input type="password" name="parent_password" id="parent_password">
                           <br/><br/>';

                  $order_id = $current_order[0]['order_id'];
                  $parent_pass = $current_order[0]['password'];
                  echo "<input type='hidden' name='order_id' id='order_id' value='$order_id'/>";
                  echo "<input type='hidden' name='p' id='p' value='$parent_pass'/>";
                  $current_address = 'кв. ' . $current_order[0]['dist_name'] . ', ул. ' . $current_order[0]['street'] . ' ' . $current_order[0]['street_number'] . ' вх. ' . $current_order[0]['gate'] . ' ап. ' . $current_order[0]['apartment'];
                  echo '<h5> Телефон на родител: ' . $current_order[0]['phone'] . '</h5>';
                  echo "<br/>
                        <h5>Адрес: $current_address</h5>";
                  
                  //echo "<input type='submit' name='approve' onclick='validate_parent_approve()' value='Потвърди' class='btn btn-success'/>";
                  echo "<span name='approve' onclick='validate_parent_approve()' class='btn btn-success'> Потвърди </span>";
                  echo '</form>';
                }else
                {
                  echo '<h5>Няма активни поръчки!</h5>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="upcoming">
        <div>
        <?php
            foreach ($approved_orders as $value) {
              $order_address = "кв. $value[dist_name], ул. $value[street]  $value[street_number] вх. $value[gate] ап. $value[apartment]";
              $support = '-';
              if($value['nanny_id2'] > 0)
              {
                //which nannie is logged and which one is support
                //TOOD add links
                if($_SESSION['worker_id'] == $value['nanny_id1'])
                {
                  $support = $value['worker2'];
                }else
                {
                  $support = $value['worker1'];
                }
              }
              echo "<div class='row'>
                      <div class='col-md-3'>
                        <h5>Дата: $value[order_date]</h5>
                        <br/>
                        <h5>Начален час: $value[order_time]</h5>
                        <br/>
                        <h5>Продължителност: $value[duration]</h5>
                      </div>
                      <div class='col-md-5'>
                        <h5>Адрес: $order_address</h5>
                        <br/>
                        <h5>Брой Деца: $value[kids_count]</h5>
                        <br/>
                        <h5>Подкрепление: $support</h5>
                      </div>
                    </div>";
            }
          ?>
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

    function decline()
    {
      confirm('Сигурни ли сте, че искате да отхвърлите тази поръчка? Обадете се на Биляна в този случай!');
    }

    function validate_parent_approve()
    {
      var parent_input_pass = $('#parent_password').val();

      if(!parent_input_pass)
      {
        alert('Родителят не е въвел парола!');
      }else if(md5(parent_input_pass) != $('#p').val())
      {
        alert('Паролата на родител не съвпада!');
      }else{
        //There are no errors => submit
        $('#form_parent_approve').submit();
      }
    }
  </script>
<?php
$this->load->view('worker_templates/wfooter');
?>