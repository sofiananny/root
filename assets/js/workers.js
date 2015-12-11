function json_sbm(url,data){
  $('.has-error').removeClass('has-error');
  $('.help-block,#email_busy,#no_user').hide(300);
  alert(url);
  alert(data.toString());
  $.ajax({
    type : "POST",
    dataType:'json',
    url: url,
    data: data,
    cache : false,
    success: function(response){
//      alert(response);
//      alert(response.success);
      if (response.success) {
        switch (url){
          case 'login/login_worker': location.href='requests'; break;
          case 'login/logout_worker': location.href='login'; break;
          case 'worker_account/newPass': 
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
            default: $('.help-block',el_parent).show(600);
          }
        }
      }
    }
  });
}
$('form').submit(function() {
  json_sbm($(this).attr("action"),$(this).serialize());
  return false;
});


