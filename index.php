<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>Test Confabulate Document</title>
	<!--CSS Foundation: (also partially aggegrated in reset-fonts-grids.css; does not include base.css)-->
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset/reset-min.css" />
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/base/base-min.css" />
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/fonts/fonts-min.css" />
        <link href="css/style.css" type="text/css" rel="stylesheet" />
	<link href="css/jstools.overlay.css" type="text/css" rel="stylesheet" />

    </head>

    <body>
	<div id="header">
	    <h1>Confabulate</h1>
	</div>
	<div id="body">
	    <div id="content">

	    </div>
	    <div id="sub-content">
		<a class="overlay-link" href="" rel="#overlay">Add a new Interest</a>
		<div id="server_feedback" ></div>
		<ul id="interest_list"></ul>
	    </div>
	</div>
	<div id="footer">

	</div>


	<!-- overlayed element, which is styled with external stylesheet -->
	<div class="overlay" id="overlay">

	    <!-- here is the content for overlay, can be anything -->
	    <h2 style="margin:10px 0">Add a new Interest</h2>
	    <form id="upload_form" action="" style="float:left;" accept-charset="utf8" enctype="multipart/form-data" method="post">
		<p><label>Name<input name="interest[name]" id="interest_name" type="text" /></label></p>
		<p><label>Label<input name="interest[label]" id="interest_label" type="text" /></label></p>
		<p><label>File<input name="interest[item]" id="interest_item" type="file" /></label></p>
		<p><input name="submit" id="interest_submit" type="submit" value="submit" /></p>
	    </form>
	    <p>
		Give your interest a name and select the file to upload.
	    </p>

	</div>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js" charset="utf8"></script>
	<script type="text/javascript" src="js/jquery.tools.min.js" charset="utf8"></script>
	<script type="text/javascript" src="js/edit_in_place.js" charset="utf8"></script>
        <script type="text/javascript" src="js/confabulate.js" charset="utf8"></script>
        <script type="text/javascript">
	    $(document).ready(function(){
		$(".overlay-link[rel]").overlay();
		$('#upload_form').attr('action',confab.rcrd_server+'/interest.json?_method=add');
		$('#upload_form').append('<input type="hidden" name="meta[return_uri]" value="'+window.location.protocol+'//'+window.location.host+'interest.php?id=?"/>');
		// get the list of interests
		$.getJSON(confab.rcrd_server+"/interest?_method=get&jsoncallback=?",
		    function(data){
			var interests = data['interest'];
			for(interest_index in interests) {
			    $('#interest_list').append(edit_in_place.label_element(interests[interest_index].id, interests[interest_index].name));
			}
		    }
		);
            });
        </script>
    </body>
</html>