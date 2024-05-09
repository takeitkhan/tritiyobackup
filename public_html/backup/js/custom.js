jQuery(document).ready(function ($) {
    $('input#search_key').keyup(function () {
        _refresh_product_list();
    });
});

function _refresh_product_list()
{
    var search_key = jQuery('input#search_key').val();
    jQuery('#load-more-product-btn').data('nextpage', 1);

    jQuery.ajax({
        url: baseurl + 'get_products',
        method: 'GET',
        data: {search_key: search_key, type: 'html'},
        success: function (data) {
            if (data.type == 'html')
                jQuery('#product-list tbody').html(data.html);

            if (jQuery('#product-list tbody tr').size() >= data.total)
                jQuery('#load-more-product-btn').hide();
            else
                jQuery('#load-more-product-btn').show();
        }
    });
}

jQuery(document).ready(function ($) {
    $(document).on('click', '.delete-product', function () {
        ajaxRemoveFn({id: $(this).data('id')}, 'delete_product', function () {
            _refresh_product_list();
        });
    });

});