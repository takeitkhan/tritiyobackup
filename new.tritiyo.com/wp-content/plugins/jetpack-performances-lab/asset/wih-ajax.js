jQuery(document).ready(function($) {
    $('#wih-settings-form').on('submit', function(e) {
        e.preventDefault();
        $('#wih-overlay').show();
        var data = $(this).serialize();
        $.post(wih_ajax_object.ajax_url, data, function(response) {
            alert('Response: ' + response);
            $('#wih-overlay').hide();
        });
    });
});
