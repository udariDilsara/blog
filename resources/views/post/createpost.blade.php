<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class= "text-left">
           <h1> Blog</h1>
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
                <div class="row">

                    <div class="col-md-12">
                        <form method="post" action="{{route('post.store')}}">
                            @csrf
                            @method('post')
                            <input type="text" class="form-control " name="post_title" placeholder="Post title">
                            <input type="text" class="form-control " name="post_body" placeholder="Post Body">
                            <input type="submit" class="btn btn-primary" value="SAVE">
                            <input type="reset" class="btn btn-warning" value="CLEAR">
                        </form>

                           
                    </div>
                </div>
        </div>

    </div>
</body>
</html>