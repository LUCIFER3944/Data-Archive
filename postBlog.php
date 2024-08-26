<?php
include("nav.php")


?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
   
    if(isset($_SESSION['login'])&& $_SESSION['login']=='true' ){
    $userid=$_SESSION['id'];}
    include('server.php');
     
    $title=$_POST['title'];
    $blog=$_POST['blog'];
    
   
        $sql="INSERT INTO `table`( `title`, `blog`, `userid`, `postedtime`) VALUES ('$title','$blog','$userid',CURRENT_TIMESTAMP())";
        if(mysqli_query($conn,$sql)){
            echo 'inserted';
            header("location:blog.php");
        }
    

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
    <link rel="stylesheet" href="postblogstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create a New Blog Post</h2>
                <form action="postBlog.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter your blog title" required>
                    </div>
                    <div class="mb-3">
                        <label for="blog" class="form-label">Post Blog</label>
                        <textarea class="form-control" name="blog" id="blog" rows="8" placeholder="Write your blog here..." required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
