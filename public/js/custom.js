jQuery(document).ready(function () {

	$('#depature').datetimepicker();
	$('#arrival').datetimepicker();

	$('#bus_id').select2();

	$('#remove_location').hide();
	var i = 0;
	var location_collection = $('#location_collection').val();
	var locations = JSON.parse(location_collection);

	if($('#location_selected').val()) {
		var selected_collection = $('#location_selected').val();
		var selected = JSON.parse(selected_collection);
		var location_collection = $('#location_collection').val();
		var locations = JSON.parse(location_collection);   	

	    $(selected).each(function (r) { 
	    	if (i > 0) {
	    		$('#remove_location').show();
	    	}
	    	i +=1;
	    	$('#loc').append('<div id="loc_main'+i+'"><select id="location'+i+'" name="location[]" class="form-control"></div>')
	    	$("#location"+i).html("");
	    	$(locations).each(function (l) {
	    		var $option = $("<option value="+locations[l].id+">"+locations[l].name+"</option>");
	    		// $("#location"+i).append("<option value="+locations[l].id+">"+locations[l].name+"</option>");
	    		if (selected[r].id === locations[l].id) {
	    			$option.attr('selected', 'selected');
	    		}
	    		$('#location'+i).append($option);
	    	}) 
	        
	    });

	    $('#location'+i).select2();
	}

	function getSelected(selected, location) {
		if (selected == location) {
			return true;
		}
		return false;
	}

    $('.alert').delay(3000).hide(0); 

    $(document).on('click', '#add_location', function () {
    	i +=1;

    	if (i > 0) {
    		$('#remove_location').show();
    	}

    	$('#loc').append('<div id="loc_main'+i+'"><select id="location'+i+'" name="location[]" class="form-control"></div>')
    	$("#location"+i).html(""); 
	    $(locations).each(function (r) { 
	        $("#location"+i).append("<option value="+locations[r].id+">"+locations[r].name+"</option>");
	    });

	    $('#location'+i).select2();

    });

    $(document).on('click', '#remove_location', function () {
    	$('#loc_main'+i).remove();
    	i -= 1;
    	
    	if (i === 0) {
    		$('#remove_location').hide();
    	}
    });

});



