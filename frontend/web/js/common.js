                 $(window).scroll(function () {
                    var body = $("html, body");

                    var threshold = 90;
                    if ($(window).scrollTop() <= threshold)
                        $('#static_cnt').removeClass('dropup');
                    else
                        $('#static_cnt').addClass('dropup').addClass('fadeInDown animated m3');
                });
        
        
                jQuery(document).ready(function () {
                    $(window).scroll(function () {

                        var body = $("html, body");

                        var threshold = 90;
                        if ($(window).scrollTop() <= threshold)
                            $('#static_cnts').removeClass('dropup');

                        else
                            $('#static_cnts').addClass('dropup');

                    });


                });



                jQuery(window).scroll(function () {
                    var scrlTop = jQuery(window).scrollTop();


                    $window = jQuery(window);

                    function myanimations(doelement, doclass) {
                        $element = jQuery(doelement);

                        $element.each(function () {
                            $thisone = jQuery(this);
                            if ($thisone.offset().top + 200 < ($window.height() + $window.scrollTop()) &&
                                    ($thisone.offset().top + $element.outerHeight()) + 170 > $window.scrollTop())
                            {
                                $thisone.removeClass('fadeOut');
                                $thisone.addClass('animated');
                                $thisone.addClass(doclass);
                            } else {
                                $thisone.removeClass(doclass);
                                $thisone.addClass('fadeOut');
                            }
                        });
                    }

                    //        myanimations('.ui-mains h1', 'fadeInUp');
                    //        myanimations('.ui-mains p', 'fadeInUp m2');

                });

                jQuery(document).ready(function ($) {
                    $('.smobitrigger').smplmnu();
                });

       
                (function ($) {
                    $(document).ready(function () {
                        $('#cssmenu ul ul li:odd').addClass('odd');
                        $('#cssmenu ul ul li:even').addClass('even');
                        $('#cssmenu > ul > li > a').click(function () {
                            $('#cssmenu li').removeClass('active');
                            $(this).closest('li').addClass('active');
                            var checkElement = $(this).next();
                            if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                                $(this).closest('li').removeClass('active');
                                checkElement.slideUp('normal');
                            }
                            if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                                $('#cssmenu ul ul:visible').slideUp('normal');
                                checkElement.slideDown('normal');
                            }
                            if ($(this).closest('li').find('ul').children().length == 0) {
                                return true;
                            } else {
                                return false;
                            }
                        });
                    }); 
                })(jQuery);

$('.sub-links').on('click',function(e){
    e.preventDefault();     
   $('#list_sub_heading').text($(this).attr('href'));
    var sem_id = $(this).attr('semid');
    $.ajax({
        url : baseurl + '?r=subjects/list-subjects-by-id',
        type : 'POST',
	data : {'sub' : $(this).attr('id'),'sem_id':sem_id},
        success : function(data) {
            $(this).closest("li").addClass('active');
            $('#list_sub_heading').text($(this).attr('href'));
            $("#partialview").html(data);
           return false;             
         }
    });
    return false;
});

$('#studying-year').on('change',function(e){   
	var year = $(this).val(); 
		$.ajax({
		url : baseurl + '?r=students/semester',
		type : 'post',
		data : {
			'year' : year
		},
		beforeSend:function(){
		//	$(this).prop('disabled',true);
		},
		success : function(data) {
			$('#studying-sem').html('<option value="">Select Parent</option>');			
			$.each(data.sem, function(i, value) {				
	                   $('#studying-sem').append($('<option>').text(value).attr('value', i));
	        });
			
			return false;
			
		}
	});
	return false;
});

$('.startstudy').on('click',function(e){
    e.preventDefault();  
      window.location.replace(baseurl + '?r=students/start-studying');
    
});


$(".chaptertopichref").on('click',function(e){
    e.preventDefault();
    var topicid = $(this).attr('id').split('-')[1];
     $.ajax({
        url:baseurl + '?r=subjects/render-topic-by-id',
        type:'POST',
        data:{'topicView':topicid},
        success:function(data){
            $('#topicViewById-div').html(data);
            return false;
        }        
    });   
    return false;
});