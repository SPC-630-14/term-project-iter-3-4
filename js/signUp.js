$('form').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    method: 'POST',
    url: 'php/signUpLogin/signUp.php',
    data: $('form').serialize(),
    success: function(response) {
      let res = JSON.parse(response);
      $('#responseContainer').removeClass('alert-danger');
      $('#responseContainer').addClass('alert-success');
      $('#responseContainer').html(res.msg);
      $('#responseContainer').show();
      
    },
    error: function (response) {
      let res = JSON.parse(response.responseText);
      $('#responseContainer').addClass('alert-danger');
      $('#responseContainer').removeClass('alert-success');
      $('#responseContainer').html(res.msg);
      $('#responseContainer').show();

    }
  });
});
