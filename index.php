<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .loader {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="loader spinner-border text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="m-2">
            <input type="text" id="searchInput" placeholder="type to search" class="form-control w-50" />
        </div>
        
    </div>
    
<!-- view categories container -->
<div class="mt-5  col-lg-10 offset-1 bg-white shadow p-4">


<!-- view categories container -->

    <h3 class=" mt-2 text-success"> User Information</h3>
   
    <hr>

    
    <div class="form-container">
        <form  class="row">

            <div class="col-lg-6 mb-2">
                <label class="form-label"><h6>Name</h6></label>
                <input type="text" class="form-control" id="fname"   placeholder="Enter here..." required>
            </div>


            <div class="col-lg-6 mb-2">
                <label class="form-label"><h6>Price</h6></label>
                <input type="number" class="form-control" id="price"  placeholder="Enter here..." required>
            </div>
            
            <div class="col-lg-6 mb-2">
                <label class="form-label"><h6>Description</h6></label>
                <input type="text" class="form-control" id="description"  placeholder="Enter here..." required>
            </div>
             
            
            <div class="offset-8 col-lg-4 ">
                

                <button class="btn btn-success text-white btn-lg mt-1 w-100" id="send" name="submit" >Submit</button>
            </div>

            



</form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="POST">
                <input type="hidden" id="item_id" value="" />
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Product title" required autocomplete="off">
                        </div>
                    <div class="alert alert-success" style="display: none"; id="messages"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="data_table">

</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var btn = $("#send");

            // insert data function 
            btn.click(function() {
                var name = $("#name").val();
                var price = $("#price").val();
                 var description = $("#description").val();

                // send data on insert query page
                $.ajax({
                    url: "./insert-query.php",
                    type: "POST",
                    data: {
                        name: name,
                        price: price,
                        description: description
                    },
                    success: function(response) {
                        alert(response);

                        $("#name").val("");
                        $("#price").val("");
                        $("#description").val("");
                    }
                })


            })

        })
 // search data function
        $(document).ready(function() {

            function loadData(query = null) {
                $.ajax({
                    url: "./ajax.php",
                    type: "GET",
                    data: {
                        query: query
                    },
                    success: function(response) {
                        $('#data_table').html(response);
                        $(".loader").hide();
                    },
                    beforeSend: function(xhr) {
                        $(".loader").show();
                    },

                    error: function(err) {
                        console.log(err);
                    }
                });
            }

            loadData();


            // edit  task 
            $(document).on("click", '.editBtn', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "./show-data-query.php",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // console.log(res);
                        let data = JSON.parse(res);
                       $("#name").val(data.name);
                       $("#item_id").val(data.id);
                        $("#exampleModal").modal("show");
                        // console.log(data.name)
                    }
                })
            });

            // update item
            $("#updateBtn").on("click",  function(e) {
                e.preventDefault();
                $.ajax({
                    url: "./update.php",
                    type: "POST",
                    data: {
                        name: $("#name").val(),
                        id: $("#item_id").val()
                    },
                    success: function(res) {
                        $("#messages").html(res).show();
                        setTimeout(() => {
                            $("#messages").hide();
                            $("#exampleModal").modal("hide");
                        }, 2000)
                    }
                })
            })


            // hide modal event
            const myModalEl = document.getElementById('exampleModal')
            myModalEl.addEventListener('hidden.bs.modal', event => {
                loadData();
            });

            // search / filter
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                if(value.length > 2) {
                    loadData(value);
                } else {
                    loadData();
                }
            });
        })
    </script>
</body>

</html>