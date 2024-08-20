<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
    <link rel="stylesheet" href="postblogstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>`

</head>
<body>
    <div class="leader">
        <form action="insert.php"  method="post">
           
            <div class="title">
              <label for="exampleInputPassword1" class="form-label">Title</label>
              <input type="text" class="form" name="title" id="exampleInputPassword1">
            </div>
            <div class="title">
              <label for="exampleInputPassword1" class="form-label">Post Blog</label>
              <textarea class="form-control textarea" name="blog" id="exampleInputPassword1"></textarea>
            </div>
            <div class="mb-3 form-check">
         
            
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>