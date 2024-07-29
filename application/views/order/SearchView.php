<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter Search from Database Example</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h3>CodeIgniter Autocomplete Demo</h3>
    <select id="kelurahan" name="kelurahan" class="itemName form-control" style="width:300px" ></select>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    
    <script type="text/javascript">
    $('#kelurahan').select2({
        placeholder: '-Select kelurahan-',
        minimumInputLength: 1,
        ajax: {
            url: "<?php echo base_url();?>index.php/Search/search",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    </script>
</body>
</html>