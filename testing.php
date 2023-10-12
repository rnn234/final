<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#autocomplete").autocomplete({
                source: "fetch.php",
                select: function(event, ui) {
                    // Set the selected item's ID as the value of the hidden input field
                    $("#selectedItemId").val(ui.item.id);
                }
            });
        });
    </script>
</head>
<body>

            <label for="id_ruang">pilih ruangan</label>
            <div class="lokasi">
            <input type="text" name="" id="autocomplete" >
            <input type="hidden" name="id_ruang" id="selectedItemId" value="">            
            </div>
             
</body>
</html>