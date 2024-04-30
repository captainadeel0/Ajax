<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
 <script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- view categories container -->
<div class="mt-5  col-lg-10 offset-1 bg-white shadow p-4">


        <!-- view categories container -->
        
            <h3 class=" mt-2 text-success"> User Information</h3>
           
            <hr>

            
            <div class="form-container">
                <form  class="row">

                    <div class="col-lg-6 mb-2">
                        <label class="form-label"><h6>First Name </h6></label>
                        <input type="text" class="form-control" id="fname"  placeholder="Enter here..." required>
                    </div>


                    <div class="col-lg-6 mb-2">
                        <label class="form-label"><h6>Last Name </h6></label>
                        <input type="text" class="form-control" id="lname"  placeholder="Enter here..." required>
                    </div>
                    <div class="offset-8 col-lg-4 ">
                        

                        <button class="btn btn-success text-white btn-lg mt-1 w-100" id="send" > Add User</button>
                    </div>

                    

        <!-- view categories container -->
        <div class="container mt-3 bg-white p-4">
            <h3 class="text-success">  View Users</h3>
            <hr>


            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


</form>

</div>

 <!-- js links -->
    <script src="./jquery/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function() {

            var btn = $("#send");

            // insert data function 
            btn.click(function() {
                var fname = $("#fname").val();
                var lname = $("#lname").val();

                // send data on insert qry page
                $.ajax({
                    url: "./insert-query.php",
                    type: "POST",
                    data: {
                        firstName: fname,
                        lastName: lname
                    },
                    success: function(response) {
                        alert(response);

                        $("#fname").val("");
                        $("#lname").val("");
                    }
                })


            })

        })
    </script>

          


    
</body>
</html>