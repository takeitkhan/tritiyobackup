jQuery(document).ready(function ($) {
    //Body onload ready task
    var url_data = getUrlVars();
    if((url_data['classs']) && (url_data['section']) ){
        $('.result-generate').prop("disabled", false);
        $('.class-level').prop("disabled", false);
        $('.class-section').prop("disabled", false);
        $('.group-label').prop("disabled", false);
        $('.subject').prop("disabled", false);
        var level = url_data['classs'];
        if(level <= 8){
            $('.group-label').prop("disabled", true);
            var class_level = 1;
            $.ajax({
                type: "POST",
                dataType: 'text',
                url: baseurl + 'getclasswisesubject',
                data: {level:class_level},
                success: function (data) {
                    $('.subject').html(data);
                    $('.subject option[value="'+url_data['subject']+'"]').attr("selected", "selected");
                },
            });
        }else if(level >= 9 && level <= 10){
            $('.group-label').prop("disabled", false);
            $('.subject').prop("disabled", false);
            var class_level = 2;
            var group = url_data['groupp'];
             $.ajax({
                type: "POST",
                dataType: 'text',
                url: baseurl + 'getclasswisesubject',
                data: {level:class_level,group:group},
                success: function (data) {
                    $('.subject').html(data);
                    $('.subject option[value="'+url_data['subject']+'"]').attr("selected", "selected");
                    $('.subject').prop("disabled", false);
                },
            });
        }else{
            $('.group-label').prop("disabled", false);
            $('.subject').prop("disabled", false);
            var class_level = 3;
            var group = url_data['groupp'];
             $.ajax({
                type: "POST",
                dataType: 'text',
                url: baseurl + 'getclasswisesubject',
                data: {level:class_level,group:group},
                success: function (data) {
                    $('.subject').html(data);
                    $('.subject option[value="'+url_data['subject']+'"]').attr("selected", "selected");
                    $('.subject').prop("disabled", false);
                },
            });
        }

        //Get Specific Subject Marks Validation Check in input field
        var written_max = $('.written').attr('max');
        if(parseInt(written_max) == 0)
            $('.written').prop("disabled", true);
        var mcq_max = $('.mcq').attr('max');
        if(parseInt(mcq_max) == 0)
            $('.mcq').prop("disabled", true);
        var practical_max = $('.practical').attr('max');
        if(parseInt(practical_max) == 0)
            $('.practical').prop("disabled", true);

        //Particuler Student Absent check then disable field and remove marks when uncheck enable it
        $( "input[type=checkbox]" ).on( "click",function() {
            if($('.absent').is(":checked")){
                var dataid = $(this).attr('data-id');
                var stdid = $('#stdid_' + dataid).val();
                var isabsval = 1;

                $('#written_' + dataid).prop("disabled", true);
                $('#mcq_' + dataid).prop("disabled", true);
                $('#practical_' + dataid).prop("disabled", true);
                var validWritten = $('#written_' + dataid).val(0);
                var validMcq =  $('#mcq_' + dataid).val(0);
                var validPractical =  $('#practical_' + dataid).val(0);

                var urlVal = baseurl + 'marksinput' + '/' + stdid + '?dataid=' + dataid + '&absent=' + isabsval + '&written=' + validWritten +'&mcq=' + validMcq + '&practical=' + validPractical;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: urlVal,
                    cache: false,
                    //data: dataid,
                    success: function (data) {
                        var custommsg = 'Mark of ' + stdid + ' modified successfully.';
                        $('#marksmodified').html(custommsg);
                    },
                    error: function () {
                        $('#marksmodified').html('Something Went Wrong');
                    }
                });
            }else{
                
                var dataid = $(this).attr('data-id');
                var stdid = $('#stdid_' + dataid).val();
                $('#written_' + dataid).prop("disabled", false);
                $('#mcq_' + dataid).prop("disabled", false);

                var practical_max = $('.practical').attr('max');
                if(parseInt(practical_max) == 0){
                    $('#practical_' + dataid).prop("disabled", true);
                }
                else{
                    $('#practical_' + dataid).prop("disabled", false);
                }
                var validWritten = $('#written_' + dataid).val(0);
                var validMcq =  $('#mcq_' + dataid).val(0);
                var validPractical =  $('#practical_' + dataid).val(0);
                var isabsval = 2;

                var urlVal = baseurl + 'marksinput' + '/' + stdid + '?dataid=' + dataid + '&absent=' + isabsval + '&written=' + validWritten +'&mcq=' + validMcq + '&practical=' + validPractical;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: urlVal,
                    cache: false,
                    //data: dataid,
                    success: function (data) {
                        var custommsg = 'Mark of ' + stdid + ' modified successfully.';
                        $('#marksmodified').html(custommsg);
                    },
                    error: function () {
                        $('#marksmodified').html('Something Went Wrong');
                    }
                });

            }
        });
    }else{
        $('.result-generate').prop("disabled", true);
        $('.class-level').prop("disabled", true);
        $('.class-section').prop("disabled", true);
        $('.group-label').prop("disabled", true);
        $('.subject').prop("disabled", true);
    }
   
    $('.exam-name').change(function(){
        $('.class-level').prop("disabled", false);
    });
    $('.class-level').change(function(){
        $('.class-section').prop("disabled", false);
       var level = $(this).val();
       if(level <= 8){
            $('.group-label').prop("disabled", true);
            var class_level = 1;
            $.ajax({
                type: "POST",
                dataType: 'text',
                url: baseurl + 'getclasswisesubject',
                data: {level:class_level},
                success: function (data) {
                    $('.subject').html(data);
                },
            });
       }else if(level >= 9 && level <= 10){
            $('.group-label').prop("disabled", false);
            $('.subject').prop("disabled", true);
            $('.group-label').change(function(){
                var class_level = 2;
                var group = $(this).val();
                 $.ajax({
                    type: "POST",
                    dataType: 'text',
                    url: baseurl + 'getclasswisesubject',
                    data: {level:class_level,group:group},
                    success: function (data) {
                        $('.subject').html(data);
                        $('.subject').prop("disabled", false);
                    },
                });
            });
       }else{
            $('.group-label').prop("disabled", false);
            $('.subject').prop("disabled", true);
            $('.group-label').change(function(){
                var class_level = 3;
                var group = $(this).val();
                 $.ajax({
                    type: "POST",
                    dataType: 'text',
                    url: baseurl + 'getclasswisesubject',
                    data: {level:class_level,group:group},
                    success: function (data) {
                        $('.subject').html(data);
                        $('.subject').prop("disabled", false);
                    },
                });
            });
       }
    });
    $('.class-section').change(function(){
        $('.subject').prop("disabled", false);
    });

    $(".subject").on('change click', function() {
        var resultYear = $('.result-year').val();
        var examName = $('.exam-name').val();
        var classLevel = $('.class-level').val();
        var classSection = $('.class-section').val();
        var classSubject = $('.subject').val();
        // alert('Y='+ resultYear+'Ex='+ examName +'CL='+ classLevel+'Sec='+ classSection +'Sub='+ classSubject);
        if(resultYear != '' && examName != 0 && classLevel != 0 && classSection != 0  && classSubject != ''){
            $('.result-generate').prop("disabled", false);
            // alert('ok')
        }
    });

    function getUrlVars(){
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }
});