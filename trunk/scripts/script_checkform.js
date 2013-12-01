$(document).ready(function () {
  var validateUsername = $('.validateUsername');
  var validateEmail = $('.validateEmail');
   
  $('.pseudo').keyup(function () {
    var t = this; 
    if (this.value != this.lastValue) {
      if (this.timer) clearTimeout(this.timer);
      validateUsername.removeClass('error').html('<img src="images/ajax-loader.gif" height="16" width="16" /> Recherche de la disponibilité...');
      
      this.timer = setTimeout(function () {
        $.ajax({
          url: 'controleurs/check_username.php',
          data: 'action=check_username&username=' + t.value,
          dataType: 'json',
          type: 'post',
          success: function (j) {
            validateUsername.html(j.msg);
          }
        });
      }, 200);
      
      this.lastValue = this.value;
    }
  });
  
    $('.email').keyup(function () {
    var t = this; 
    if (this.value != this.lastValue) {
      if (this.timer) clearTimeout(this.timer);
      validateEmail.removeClass('error').html('<img src="images/ajax-loader.gif" height="16" width="16" /> Recherche de la disponibilité...');
      
      this.timer = setTimeout(function () {
        $.ajax({
          url: 'controleurs/check_email.php',
          data: 'action=check_email&email=' + t.value,
          dataType: 'json',
          type: 'post',
          success: function (j) {
            validateEmail.html(j.msg);
          }
        });
      }, 200);
      
      this.lastValue = this.value;
    }
  });
});