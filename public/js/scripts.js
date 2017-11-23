jQuery(document).ready(function ($) {

    var busy = null;
    if ($('#submit').length > 0 ){
        var busy = null;
        $('#submit').click(function (e) {
            e.preventDefault();

            var error = false;
            form = $('form');

            form.find('[required]').each( function () {

                if ($.trim($(this).val()) == '') {
                    $(this).css('border-color', '#FF0000');
                    error = true;

                } else {
                    $(this).css('border-color', '#CDCDCD');

                }
            });
            var formElement = document.getElementById("form");
            var myForm = new FormData(formElement);
            myForm.append('action', 'vidw_response_action');
            if (!error ) {

                if (busy)
                    busy.abort();
                busy = $.ajax({
                    type: 'POST',
                    url: js_content.ajaxurl,
                    data: myForm,
                    contentType: false,
                    processData: false,
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        $('#info').attr('class', 'text-center').html(data);

                        if (data === 'success'){
                            form[0].reset();
                            $('#noty').attr('class', 'alert alert-success').html(js_content.success_msg);
                            $('#info').attr('class', 'text-center').html(js_content.info_msg);
                        }
                        if (data === 'error'){
                            $('#noty').attr('class', 'alert alert-warning').html(js_content.notic_msg);
                        }

                    },

                });

            }else {
                $('#noty').attr('class', 'alert alert-danger').html(js_content.wrong_msg);
            }
            $('#noty').slideDown();
            $('#noty').delay(5000).slideUp();
            return false;
        });



    }


});
