
$(document).on('click', '#exampleCheck1', function() {
    $(".leads").prop("checked", this.checked);
});
$(document).on('click', '.leads', function() {
    if ($('.leads:checked').length == $('.leads').length) {
      $('#exampleCheck1').prop('checked', true);
    } else {
      $('#exampleCheck1').prop('checked', false);
    }
});

