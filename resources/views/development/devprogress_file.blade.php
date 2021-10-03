<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Development Progress Document</title>
</head>
<body style="margin:0px;padding:0px;overflow:hidden">


    <div>
        @foreach($data as $a)
        <iframe src="{{url('storage/dev/developer/'.$a->dev_file)}}" frameborder="0" style="overflow:hidden;height:100%;width:100%;position:absolute;" height="100%" width="100%" ></iframe>
        @endforeach
    </div>
    
</body>
</html>