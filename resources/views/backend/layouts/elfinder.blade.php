<!DOCTYPE html>
<html>
<head>
	<title>Media Library</title>
	<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="{{ helper()->elfinder() }}css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="{{ helper()->elfinder() }}css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="{{ helper()->elfinder() }}js/elfinder.min.js"></script>

	
		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : '{{ helper()->elfinder() }}php/connector.minimal.php', // connector URL (REQUIRED)
					getFileCallback : function(file){
						$('#image_display', window.parent.document).html("<img src = '"+ file.url +"' width = '150' height = '150' />");
						$("#image" , window.parent.document).val(file.url);
						$("#elfinder_close" , window.parent.document).trigger("click");
					}  
					// , lang: 'ru'                    // language (OPTIONAL)
				});

				$("#media-library").elfinder({
					url : '{{ helper()->elfinder() }}php/connector.minimal.php', // connector URL (REQUIRED)
				});
			});
		</script>
    
</head>
<body>
	@yield('content')

</body>
</html>