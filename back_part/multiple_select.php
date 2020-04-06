<?php

//資料表連線
require_once('./db.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<input id="inputNick" name="inputNick" type="text" value="" placeholder="inputNick">



<input id="inputEmail" name="inputEmail" type="text" value="" placeholder="inputEmail">


<input id="inputBd" name="inputBd" type="text" value="" placeholder="inputBd">



 <div id="showData"></div>   


<script>

// inputNick_li
$('#inputNick').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'multiple.php',
    beforeSend:function(){
        // append可以實現()內的html
        $('#showData').append('<div id="load">loading</div>');
    },
    // timeout:6000,
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{ 
        // 抓取既有的值
        inputNick:$('#inputNick').val(),
        inputEmail:$('#inputEmail').val(),
        inputBd:$('#inputBd').val()
        
        },
    success:function(data){
     $('#showData').html(data);
    },
    fail:function(){
        $('#showData').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});


// inputEmail_li
$('#inputEmail').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'multiple.php',
    beforeSend:function(){
        // append可以實現()內的html
        $('#showData').append('<div id="load">loading</div>');
    },
    // timeout:6000,
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{ 
          // 抓取既有的值
        inputNick:$('#inputNick').val(),
        inputEmail:$('#inputEmail').val(),
        inputBd:$('#inputBd').val()},
    success:function(data){
     $('#showData').html(data);
    },
    fail:function(){
        $('#showData').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});


// inputBd_li
$('#inputBd').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'multiple.php',
    beforeSend:function(){
        // append可以實現()內的html
        $('#showData').append('<div id="load">loading</div>');
    },
    // timeout:6000,
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{  // 抓取既有的值
        inputNick:$('#inputNick').val(),
        inputEmail:$('#inputEmail').val(),
        inputBd:$('#inputBd').val()},
    success:function(data){
     $('#showData').html(data);
    },
    fail:function(){
        $('#showData').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});





</script>













</body>
</html>





