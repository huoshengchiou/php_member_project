<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>

<input type="text" id="keyin">
<div id="target"></div>




<script>

$('#keyin').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'response.php',
    beforeSend:function(){
        // append可以實現字串內的html
        $('#target').append('<div id="load">loading</div>');
    },
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{ keyin:$('#keyin').val()},
    success:function(data){
     $('#target').html(data);
    },
    fail:function(){
        $('#target').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});




</script>
</body>
</html>
