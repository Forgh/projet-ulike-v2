$(document).ready(function () {
  var validateUsername = $('.validateObjet');

  $('#nom_objet').keyup(function () {
    var t = this; 
    if (this.value != this.lastValue) {
      if (this.timer) clearTimeout(this.timer);
      validatObjet.removeClass('error').html('<img src="images/ajax-loader.gif" height="16" width="16" /> Recherche de la disponibilité...');
      
      this.timer = setTimeout(function () {
        $.ajax({
          url: 'controleurs/check_objet.php',
          data: 'action=check_objet&objet=' + t.value,
          dataType: 'json',
          type: 'post',
          success: function (j) {
            validateObjet.html(j.msg);
          }
        }); 
      }, 200);
      
      this.lastValue = this.value;
    }
  });
  
});