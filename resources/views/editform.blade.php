<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
   <div class="container">
   <div class="jumbotron">
   <form action="{{action('EventController@update',$id)}}" method="POST">
            {{csrf_field()}}
            <div class="container">
                <div class="jumbotron" style="margin-top: 5%;">
                    <h1>Update your data</h1>
                    <hr>
                        <input type="hidden" name="_method" value="UPDATE" />
                <div class="form group">
                    <label>Name of event</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter name" value="{{$events->title}}">
                </div>
                <div class="form group">
                    <label>Event color</label>
                    <input type="color" class="form-control" name="color" placeholder="Enter color" value="{{$events->color}}">
                </div>
                <div class="form group">
                    <label>Start date of event</label>
                    <input type="date" class="form-control" name="start_date" placeholder="Enter start date" value="{{$events->start_date}}">
                </div>
                <div class="form group">
                    <label>End date of event</label>
                    <input type="date" class="form-control" name="end_date" placeholder="Enter end date" value="{{$events->end_date}}">
                </div>
                    {{method_field('PUT')}}
                    <button type="submit" name="submit" class="btn btn-success">Update data</button>


                </div>
                </div> 
         </form>
     </div>
   </div>
</body>
</html>