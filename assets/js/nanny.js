function json_sbm(url,data){
  $('.has-error').removeClass('has-error');
  $('.help-block,#email_busy,#no_user').hide(300);
//  alert(url);
//  alert(data);
  $.ajax({
    type : "POST",
    dataType:'json',
    url: 'index.php/'+url,
    data: data,
    cache : false,
    success: function(response){
//      alert(response);
      if (url=='order/validate') {
        show_step(response.step,response.order_prop,response.pay_prop);
        $('#price').html(response.price);
        $('#supprice').html(response.supprice);
      }
      if (response.success) {
        switch (url){
          case 'invite': 
            $('#invite').hide(600);
            $('#success-invite').show(600);
            break;
          case 'login/login_usr':
          case 'login/regist':
            $('#top_r').html(response.top_r);
            $('#nannyLoginModal').modal('hide');
            $('#log_me').hide();
            break;
          case 'login/logout': location.reload(); break;
          case 'login/forgot_password': $('#fpass,#success').toggle(600); break;
          case 'account/update': 
            $('#usr_names').html(response.username);
            $('#success_data').show(600);
            setTimeout(function(){ $('#success_data').hide(600); },5000);
            break;
          case 'account/newPass': 
            $('#success_pass').show(600);
            setTimeout(function(){ $('#success_pass').hide(600); },5000);
            break;
        }
      }
      else {
        for (var i=0;i<response.errors.length;i++) {
          var el=$('#'+response.errors[i]),el_parent=el.parent();
          if (!el_parent.hasClass("form-group")) { el_parent=el_parent.parent(); }
          el_parent.addClass('has-error');
          el.show(300);
          switch (response.errors[i]) {
            case 'no_user':
              setTimeout(function(){ el.hide(300); },5000);
              break;
            case 'flabel':
              $('#fpass').attr("disabled",false);
              el.html(response.msg);
              break;
            case 'email_busy': break;
            default: $('.help-block',el_parent).show(600);
          }
        }
      }
    }
  });
}
function showLogin(div){ // Показване на modal div-a ******************************
  $('#login-div,#forgot-password,#regist,#email_busy,#no_user,.help-block').hide();
  $('.has-error').removeClass('has-error');
  $('#'+div).show();
}
$('form').submit(function() {
  json_sbm($(this).attr("action"),$(this).serialize());
  return false;
});