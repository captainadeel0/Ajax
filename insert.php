<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<!-- view categories container -->
<div class="mt-5 offset-3 col-lg-6 bg-white shadow p-4">
<div class="offset-4 col-lg-4 mb-4">
                <label for=""></label>

                <button class="btn btn-info text-white btn-lg mt-2 w-100"> User Information</button>
            </div>

            
    <div class="form-container">

            <div class="col-lg-8 offset-2 mb-2">
                <label class="form-label" for="email">Email <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter here..." required>
            </div>


            <div class="col-lg-8 offset-2 mb-2">
                <label class="form-label" for="password">Password <span class="text-danger">*</span>
                </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter here..." required>
            </div>

    

            <div class="offset-4 col-lg-4 mb-2">
                <label for=""></label>

                <button class="btn btn-info text-white btn-lg mt-2 w-100"  id="submit" value="submit">Submit</button>
            </div>
          


    
</body>
</html>