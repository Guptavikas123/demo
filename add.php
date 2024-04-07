<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   
<form action="<?php echo !empty($result) ? base_url().'master/master/add/'.$result->id : base_url().'master/master/add/' ?>" method="POST">

Country 
<select name="country" id="country_id" onchange="get_state()">
<option value="">select Country</option>
    <?php  foreach($result as $cname){?>
 <option value="<?php echo $cname->id ?>"><?php echo $cname->name; ?></option>   
 <?php }?>
</select>
<select name="state" id="state_id">
<option value="">select state</option>
</select>
<button name="save" id="save_id">save</button>
</form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function get_state() {
    var country_id = $('#country_id').val();
    alert(country_id);
    $.ajax({
        type: 'post',
        data: { country_id: country_id },
        url: '<?php echo base_url(); ?>/master/master/get_state',
        success: function(result) {
            $('#state_id').html(result);
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });
}
</script>