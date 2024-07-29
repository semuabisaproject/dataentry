<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cara Membuat Datepicker dengan jQuery</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(function(){
	  $("#datepicker").datepicker();
	});
</script>
</head>
<body>
 
<div class="ui-widget">
  <label for="datepicker">Tanggal: </label>
  <input id="datepicker">
</div>
 
</body>
</html>