<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('worker_templates/wheader');
$month=array('','Януари','Февруари','Март','Април','Май','Юни','Юли','Август','Септември','Октомври','Ноември','Декември');
function prep_month($ym,&$periods){
  $week=array('Нд','Пн','Вт','Ср','Чт','Пт','Сб');
  $c=date('t',strtotime($ym."-01"));
  $l=date('Y-m-d',strtotime(date('Y-m-d')." + 2days"));
  for ($i=1; $i<=$c; $i++){
    $d=date('w',strtotime($ym.'-'.$i));
    if ($d==0 || $d==6) { $class='holiday'; } else { $class=''; }
    if ($ym.'-'.str_pad($i,2,"0",STR_PAD_LEFT)<$l){ $class.=' locked'; }
    if ($class) { $class=' class="'.$class.'"'; }
    echo "        <tr$class><td>$i ({$week[$d]})</td>";
    $class='';
    for ($j=0; $j<48; $j++){
      $input='';
      if ($j % 2) { $tit=intval($j/2).':30'; } else { $tit=intval($j/2).':00'; }
      $tit=str_pad($tit,5,"0",STR_PAD_LEFT);
      if (isset($periods["begin_".$ym."-".str_pad($i,2,"0",STR_PAD_LEFT)."_".$tit])) { 
        $class=' class="on"';
        $val=explode('_',$periods["begin_".$ym."-".str_pad($i,2,"0",STR_PAD_LEFT)."_".$tit]);
        $input='<input type="text" readonly style="width: '.($val[0]*21).'px" value="'.$val[1].'"/>';
        $tit='';
      }
      if (isset($periods["end_".$ym."-".str_pad($i,2,"0",STR_PAD_LEFT)."_".$tit])) { $class=''; }
      echo "<td title='$tit'$class>$input</td>";
    }
    echo "</tr>\n";
  }
}
?>
  <center>
    <div class="fixed_div">
      <table class="sch_tit" style="border-bottom: 1px solid #000; background-color: #FFF;">
        <tr>
          <td colspan="49" align="center">
            <h2>
              <div id="m1">
                <?php echo $month[date('n',strtotime($ym."-01"))]."\n"; ?>
                <img alt="arrow_right" src="<?php echo base_url(); ?>assets/img/arrow_right.png" onclick="$('#m1,#m2,#s1,#s2').toggle()"/>
              </div>
              <div id="m2" style="display: none">
                <img alt="arrow_left" src="<?php echo base_url(); ?>assets/img/arrow_left.png" onclick="$('#m1,#m2,#s1,#s2').toggle()"/>
                <?php echo $month[date('n',strtotime($ym."-01 +1month"))]."\n"; ?>
              </div>
              <button id="save" class="btn btn-warning pull-right" style="margin-top: -33px">Запиши</button>
            </h2>
          </td>
        </tr>
        <tr class="tr_tit"><td></td><?php for ($i=1; $i<24; $i++) { echo "<td>$i<sup>00</sup></td>"; } ?><td></td></tr>
      </table>
    </div>
    <form id="schedule_months" action="schedule/save">
      <table id="s1" class='schedule'>
<?php prep_month($ym,$periods); ?>
      </table>
      <table id="s2" class='schedule' style="display: none;">
<?php prep_month(date('Y-m',strtotime($ym."-01 +1month")),$periods); ?>
      </table>
    </form>
    <table class="sch_tit" style="border-top: 1px solid #000; margin-top: 1px;">
      <tr class="tr_tit"><td></td><?php for ($i=1; $i<24; $i++) { echo "<td>$i<sup>00</sup></td>"; } ?><td></td></tr>
      <tr>
        <td colspan="49" style="padding-top: 10px;">
          <div style="float: left">
            За да зявите период кликнете върху началния час и изберете продължителност.<br/>
            За да коригирате заявен период кликнете върху него.<br/>
            <sup style="color: red">*</sup>Не можете да заявявате период с начален час след 20.00 часа.
          </div>
        </td>
      </tr>
    </table>
  </center>
  <div id="div-sel">
    <div class="title"><img alt="close" src="<?php echo base_url(); ?>assets/img/close.gif" onclick="close_div()"/></div>
    <center style="padding: 10px;">
      <p id="start" style="width: 100%; font-weight: bold"></p>
      <select id="selector" size="8" style="width: 100%;"></select><br/>
      <button id="clr" style="margin-top: 5px;">Изтрии периода</button>
    </center>
  </div>
<script>
  $(window).scroll(function(){
    $('.fixed_div').css('left',-$(window).scrollLeft());
  });
  var col=0;
  function td_hour(h){
    var r=parseInt((h)/2)+':';
    if ((h) % 2) { r += '30'; } else { r += '00'; }
    return r;
  }
  function hour_td(h){
    return h[0]*2+h[1]/30;
  }
  function last_td(){
    var end=$('.selected td:eq('+col+')').find("input").val().slice(-5).split(":");
    return end[0]*2+end[1]/30;
  }
  function remove_period(n){
    $('.selected td:eq('+n+')').html('');
    $('.selected td:eq('+n+')').attr('title',td_hour(n-1));
    while ($('.selected td:eq('+n+')').hasClass('on')){
      $('.selected td:eq('+n+')').removeClass('on');
      n++;
    }
  }
  function close_div(){
    $('.selected').removeClass('selected');
    $('#div-sel').hide();
  }
  $(".schedule td").click(function(){
    close_div();
    $(this).parent().addClass('selected');
    if ($(this).parent().hasClass('locked')) { alert('Не може да правите промени за тази дата!'); }
    else {                  
      if ($(this).index()==0){
        if (confirm("Заяви целия ден!")){
          for (var i=1; i<50; i++){ $('.selected td:eq('+i+')').html('').addClass('on').attr('title',td_hour(i-1)); }
          $('.selected td:eq(1)').html('<input type="text" readonly style="width: 1008px" value="0:00 ÷ 24:00"/>').attr('title','');
        }
      }
      else{
        if (!$(this).hasClass('on') && $(this).index()>41){ alert('Не можете да започнете период след 20.00 часа'); }
        else{
          var html='',cls;
          col=$(this).index();
          $('#start').html('от '+td_hour(col-1)+' ч.');
          for (var i=col+7; i<49; i++){
            if (i % 2) { cls='class="half"'; } else { cls=''; }
            html += '<option value="'+i+'"'+cls+'>до '+td_hour(i)+' ч.</option>';
          }
          $('#selector').html(html);
          if ($(this).parent().index()<15) { $('#div-sel').css('top',$(this).offset().top); }
          else { $('#div-sel').css('top',$(this).offset().top-215); }
          if ($(this).index()<25) { $('#div-sel').css('left',$(this).offset().left); }
          else { $('#div-sel').css('left',$(this).offset().left-128); }
          $('#div-sel').show();
        }
      }
    }
  });
  $('#selector').on('change', function() {
    var i,j,k=0,end=0,last=parseInt($('#selector').val());
    if ($('.selected td:eq('+col+')').hasClass('on')) { end=last_td(); }
    while ($('.selected td:eq('+(col-1)+')').hasClass('on')) { col--; } //Обедини с период отляво
    for (i=col; i<=last; i++){
      if ($('.selected td:eq('+i+')').html() != '') { remove_period(i); }
      $('.selected td:eq('+i+')').addClass('on');
      k++;
      if (i==last && $('.selected td:eq('+(i+1)+')').hasClass('on')){ //Обедини с период отдясно
        while ($('.selected td:eq('+(last+1)+')').hasClass('on')) { last++; }
      }
    }
    if (end>=i) {
      for (j=i; j<=end; j++) { $('.selected td:eq('+j+')').removeClass('on'); }
    }
    $('.selected td:eq('+col+')').html('<input type="text" readonly style="width: '+(k*21)+'px" value="'+td_hour(col-1)+' ÷ '+td_hour(col+k-1)+'"/>');
    $('.selected td:eq('+col+')').attr('title','');
    close_div();
  });
  $('#clr').click(function(){
    if ($('.selected td:eq('+col+')').hasClass('on')) {
      for (var i=col; i<=last_td(); i++){ $('.selected td:eq('+i+')').removeClass('on'); }
      $('.selected td:eq('+col+')').html('').attr('title',td_hour(col-1));
    }
    close_div();
  });
  $('#save').click(function(){
    $("#s1 :input").each(function(){ $(this).attr('name','current_month['+($(this).parent().parent().index()+1)+'][]'); });
    $("#s2 :input").each(function(){ $(this).attr('name','next_month['+($(this).parent().parent().index()+1)+'][]'); });
    json_sbm($('#schedule_months').attr("action"),$('#schedule_months').serialize());
    return false;
  });
</script>
<?php
$this->load->view('worker_templates/wfooter');
?>
