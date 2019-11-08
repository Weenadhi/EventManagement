<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading" style="background: #2e6da4; color: white;">Add event to calendar</div>
            <div class="panel-body">
    <h1> TasK: Add data</h1>
        <form method="POST" action="{{action('EventController@store')}}">
        {{ csrf_field()}}
                <label for="">Enter name of event</label>
                <input type="text" class="form-control" name="title" placeholder="Enter the name" /><br /><br />
                <label for="">Enter colour</label>
                <input type="color" class="form-control" name="color" placeholder="Enter the color" /><br /><br />
                <label for="">Enter start date of the event</label>
                <input type="datetime-local" class="form-control" name="start_date" class="date" placeholder="Enter start date" /><br /><br />
                <label for="">Enter end date of the event</label>
                <input type="datetime-local" class="form-control" name="end_date" class="date" placeholder="Enter end date" /><br /><br />
                <input type="submit" name="submit" class="btn btn-primary" value="Add event data" />
</form>
</div>
</div>
</div>
</div>
</div>


   
</body>
</html>