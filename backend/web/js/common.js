$('#question-form').on('beforeSubmit', function(event, jqXHR, settings) { //  Qusetion form ajax submit 
	var form = $(this);
	if (form.find('.has-error').length) {
		return false;
	}
	$.ajax({
		url : form.attr('action'),
		type : 'post',
		data : form.serialize(),
		success : function(data) {
			if (data.length !== 0) {
				$('#question-question_id').val(data.qid);
				$('#options-question_id').val(data.qid);
				$('#answers-question_id').val(data.qid);
				$('#solution-question_id').val(data.qid);
				$("#add_question_submit").html('create');
				$('.nav-tabs a[href="#option-tab"]').attr('data-toggle','tab');
				$('.nav-tabs a[href="#option-tab"]').parent('li').removeClass('disabled').addClass('enabled');
				$('.nav-tabs a[href="#option-tab"]').tab('show');
			}
			return false;
		}
	});

	return false;
});

$('#video_form').on('beforeSubmit', function(event, jqXHR, settings) {
	var form = $(this);
	$('#options-act').val() === "addmore";
	if (form.find('.has-error').length) {
		return false;
	}
	$.ajax({
		url : form.attr('action'),
		type : 'post',
		data : form.serialize(),
		success : function(data) {
			alert(data);
						return false;
		}
	});

	return false;
});


$('#option_form').on('beforeSubmit', function(event, jqXHR, settings) {
	var form = $(this);	
	var opttext = $('#options-options').val();
	$('#options-act').val() === "addmore";
	if (form.find('.has-error').length) {
		return false;
	}
	$.ajax({
		url : form.attr('action'),
		type : 'post',
		data : form.serialize(),
		success : function(data) {
			$('.nav-tabs a[href="#answer-tab"]').attr('data-toggle','tab');
			$('.nav-tabs a[href="#answer-tab"]').parent('li').removeClass('disabled').addClass('enabled');
			$('.nav-tabs a[href="#solutions-tab"]').attr('data-toggle','tab');
			$('.nav-tabs a[href="#solutions-tab"]').parent('li').removeClass('disabled').addClass('enabled');
			
			
			if(data.optionid != 0){
			$('#option_display').append("<li><span id='s-"+data.optionid+"'>"+opttext+"</span>" +
					"<a href='#' onClick='optionUpdate("+data.optionid+")'> <i class='fa fa-pencil' aria-hidden='true'></i></a>" +
					" <a href='#' onClick='optionDelete("+data.optionid+")'><i class='fa fa-times' aria-hidden='true'></i></a></li>");
			}else{
				 var opid = $('#options-option_id').val();
				 $("#s-"+opid).html(opttext);				 
			}
			
			
			if ($('#options-act').val() === "addmore") {				
				$("#options-options").val('');				
				$('.nav-tabs a[href="#option-tab"]').tab('show');
			} else if ($('#options-act').val() === "add") {
				$('.nav-tabs a[href="#answer-tab"]').click();

			}
			return false;
		}
	});

	return false;
});
$('.nav-tabs a[href="#answer-tab"]').on('click', function(e) {
	var target = $(e.target).attr("href") // activated tab
	$('#ans-container').empty();
	if (target === "#answer-tab") {
		$.ajax({
			url : baseurl + '?r=answers/ansoptions',
			type : 'post',
			data : {
				'qid' : $('#answers-question_id').val()
			},
			success : function(data) {
				$.each(data.qid, function(i, j) {
					addCheckbox(i, j);
				});
				return false;
			}
		});
	}
});

function addCheckbox(id, cklabel) {
	var container = $('#ans-container');
	$('<input />', {
		type : 'checkbox',
		id : id,
		value : id,
		name:'chk_grp',
		class:'grp_chk',
		onClick:'chkother('+id+')'
		
	}).appendTo(container);
	$('<label />', {
		'for' : 'lbk' + id,
		text : cklabel
	}).appendTo(container);
	$('<br/>').appendTo(container);
}

function actionTabShow(params1, params2, params3) {	
		$('.nav-tabs a[href="#' + params2 + '"]').tab('show');

}

$('#question_submit').on('click', function(e) {
	e.preventDefault();
	$('#options-act').val('addmore');
	$('#option_form').submit();
	return false;

});

$('#add').on('click', function(e) {
	e.preventDefault();
	$('#options-act').val('add');
	$('#option_form').submit();
	return false;

});
function chkother(params) {
	if ($('#' + params).prop("checked") == true) {
		$('#ans-container input:checked').each(function() {
			$(this).prop('checked', false);
			
		});
		$('#' + params).prop("checked",true);
		$("#answers-option_id").val(params);
	}

}

$('#answer-form').on('beforeSubmit', function(event, jqXHR, settings) { //  Qusetion form ajax submit 
	var form = $(this);
	if (form.find('.has-error').length) {
		return false;
	}
	$.ajax({
		url : form.attr('action'),
		type : 'post',
		data : form.serialize(),
		success : function(data) {
			if (data.length !== 0) {				
				$('.nav-tabs a[href="#solutions-tab"]').tab('show');
			}
			return false;
		}
	});

	return false;
});


$('#solution-form').on('beforeSubmit', function(event, jqXHR, settings) {
	var form = $(this);	
	if (form.find('.has-error').length) {
		return false;
	}
	$.ajax({
		url : form.attr('action'),
		type : 'post',
		data : form.serialize(),
		success : function(data) {
			$('.nav-tabs a[href="#answer-tab"]').attr('data-toggle','tab');
			$('.nav-tabs a[href="#answer-tab"]').parent('li').removeClass('disabled').addClass('enabled');
			$('.nav-tabs a[href="#solutions-tab"]').attr('data-toggle','tab');
			$('.nav-tabs a[href="#solutions-tab"]').parent('li').removeClass('disabled').addClass('enabled');
			if ($('#options-act').val() === "addmore") {				
				$("#options-options").val('');				
				$('.nav-tabs a[href="#option-tab"]').tab('show');
			} else if ($('#options-act').val() === "add") {
				$('.nav-tabs a[href="#answer-tab"]').click();

			}
			return false;
		}
	});

	return false;
});



$(document).on('ready pjax:success', function() {
$('#create_years_grid').on('click',function(e){
	var url  = baseurl + '?r=years/create';
	$('#pModal').modal('show')
    .find('.modal-content')
    .load(url);
	
});
});

$(document).on('ready pjax:success', function() {
	$('#semester_create_grid').on('click',function(e){
		var url  = baseurl + '?r=semesters/create';
		$('#sModal').modal('show')
	    .find('.modal-content')
	    .load(url);
		
	});
	});
$(document).on('ready pjax:success', function() {
	$('#subject_create_grid').on('click',function(e){
		var url  = baseurl + '?r=subjects/create';
		$('#subModal').modal('show')
	    .find('.modal-content')
	    .load(url);
		
	});
	});

$(document).on('ready pjax:success', function() {
	$('#chapter_create_grid').on('click',function(e){
		var url  = baseurl + '?r=chapters/create';
		$('#cModal').modal('show')
	    .find('.modal-content')
	    .load(url);
		
	});
	});

$(document).on('ready pjax:success', function() {
	$('#topics_create_grid').on('click',function(e){
		var url  = baseurl + '?r=topics/create';
		$('#tModal').modal('show')
	    .find('.modal-content')
	    .load(url);
		
	});
	});


function topicChangesemdrp(params){	
	var sem = $(params).val(); 
	$.ajax({
	url : baseurl + '?r=topics/semandsub',
	type : 'post',
	data : {
		'sem_id' : sem,
	},
	beforeSend:function(){
	//	$(this).prop('disabled',true);
	},
	success : function(data) {
		$('#topics-sub_id').html('<option value="">Select Subject</option>');
		$('#topics-chapter_id').html('<option value="">Select Chapter</option>');
		$('#topics-parent_id').html('<option value="">Select Parent</option>');
		$.each(data.outsub, function(i, value) {				
            $('#topics-sub_id').append($('<option>').text(value).attr('value', i));
        });
		$.each(data.outchap, function(i, value) {				
            $('#topics-chapter_id').append($('<option>').text(value).attr('value', i));
        });
		$.each(data.outparenttopic, function(i, value) {				
            $('#topics-parent_id').append($('<option>').text(value).attr('value', i));
        });
		return false;
		
	}
	
});
	return false;
}

function topicChangesubdrp(params){
	var sub = $(params).val(); 
	$.ajax({
	url : baseurl + '?r=topics/chapters',
	type : 'post',
	data : {
		'sub_id' : sub,
	},
	beforeSend:function(){
	//	$(this).prop('disabled',true);
	},
	success : function(data) {
		$('#topics-chapter_id').html('<option value="">Select Subject</option>');	
		$('#topics-parent_id').html('<option value="">Select Parent</option>');
		$.each(data.outchap, function(i, value) {				
            $('#topics-chapter_id').append($('<option>').text(value).attr('value', i));
        });
		$.each(data.outparenttopic, function(i, value) {				
            $('#topics-parent_id').append($('<option>').text(value).attr('value', i));
        })
		
		return false;
		
	}
});
return false;
}

function topicChangechadrp(params){
	var cha = $(params).val(); 
	$.ajax({
	url : baseurl + '?r=topics/drptopics',
	type : 'post',
	data : {
		'cha' : cha,
	},
	beforeSend:function(){
	//	$(this).prop('disabled',true);
	},
	success : function(data) {
		$('#topics-parent_id').html('<option value="">Select Parent</option>');			
		$.each(data.outparenttopic, function(i, value) {				
            $('#topics-parent_id').append($('<option>').text(value).attr('value', i));
        });
		
		return false;
		
	}
});
return false;
}

function optionUpdate(params){	
	if(params !==''){		
		$("#options-options").val($("#s-"+params).text());
		$("#options-option_id").val(params);
		$('#question_submit').html('Update+');
		$('#add').html('Update');
		return false;
	}else{
		alert("Missing parameter");
		return false;
	}
}


