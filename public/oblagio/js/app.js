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

