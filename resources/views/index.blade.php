<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Windy McWindface Logger</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Welcome to Windy McWindface Logger</h1>
    <div class="form-group text-center">
        <label for="getlogs">Get Logs</label>
        <input class="btn btn-sm btn-outline-primary" type="submit" value="Fetch" name="Fetch" id="getlogs">
        <br>
        <label for="clearlogs">Clear Logs</label>
        <input class="btn btn-sm btn-warning" type="submit" value="Remove" name="Remove" id="clearlogs">
    </div>
</div>
<div class="container">
    <h5 class="text-center">Logs</h5>
    <div class="logs">

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script>
  $(document).ready(function (){

 var displayLogs = function (data)
  {
      for(log in data.logs)
      {
          $('.logs').append('<div class="d-flex flex-sm-column mb-2 border border-info p-1"><p class="text-center">'+data.logs[log]+'</p></div>');
      }
  }

 $('#getlogs').click(function () {
     $.ajax({
         type: "POST",
         url: '{!! route('getlogs')!!}',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content') },
         success: function (data){
             displayLogs(data);
         },
         error: function ()
         {

         }
     });
 });

      $('#clearlogs').click(function (){
          $('.logs').empty();
      });
  });
</script>
</body>
</html>
