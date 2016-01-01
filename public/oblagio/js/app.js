$(function(){


	
});

function oblagioValidate()

{
	model = $("#model-generate").text();
	
	id = $("#unique").text();

	inputs = $("#oblagio-form").serialize();
	
	allData = inputs + '&model=' + model + '&unique_id=' + id;

	$.ajax({
		url : '/form-validation',
		type : "get",
		data : allData,
		beforeSend:function(){
			
		},
		success : function(data)
		{
			if(data.status == 'true')
			{
				$("#oblagio-form").submit();
			}else{
				errorAll = '<div style = "text-align:left;margin-left:20%;color:red;"><ul>';
				$.each(data.errors , function(key , value){
					errorAll += '<li>'+ value +'</li>';
				});

				errorAll += '</ul></div>';

				swal({
				  title: "",
				  type : "error",
				  text: errorAll,
				  html: true
				});
			}
		}
	});
}

function cekAllChildToAction(child , action)
{
	if($('#'+child).is(":checked"))
	{
		$( "input[id^='"+action+"']" ).prop('checked', true);  
	}else{
		$( "input[id^='"+action+"']" ).prop('checked', false);  
	}
		
}

function cekAllParentToChild(parent , child , action)

{
	if($('#'+parent).is(":checked"))
	{
		$( "input[id^='"+child+"']" ).prop('checked', true); 
		$( "input[id^='"+action+"']" ).prop('checked', true);  
	}else{
		$( "input[id^='"+child+"']" ).prop('checked', false);
		$( "input[id^='"+action+"']" ).prop('checked', false);  
	}


}

function cekAll(id)

{
	if($('#'+id).is(":checked"))
	{
		$( "input[id^='parent']" ).prop('checked', true); 
		$( "input[id^='action']" ).prop('checked', true);
		$( "input[id^='child']" ).prop('checked', true); 
		
	}else{
		$( "input[id^='parent']" ).prop('checked', false); 
		$( "input[id^='action']" ).prop('checked', false);
		$( "input[id^='child']" ).prop('checked', false);  
	}
}

function addElfinder()

{
	
}