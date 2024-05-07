<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajax</title>
       <!-- bootstrap links -->
       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .loader {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container w-75 shadow mx-auto mt-5 p-5">

        <h3 class=" p-1 mb-2">Add <span class="text-primary"> User</span> Information</h3>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <!-- alert for success -->
                <div class="alert alert-success alert-dismissible fade show msg credErr" id="success" role="alert" style="display: none;">

                </div>
                <!-- alert for error -->
                <div class="alert alert-danger alert-dismissible fade show msg" id="error" role="alert" style="display: none;">
                </div>
            </div>
        </div>

        <!-- form to get data from user -->
        <div class="row ">
            <div class="col-md-4 px-3 mt-2">
                <label class="form-label"> Name</label>
                <input type="text" class="form-control  mb-3" id="name" placeholder="Enter here..."  required/>
            </div>

            <div class="col-md-4 px-3 mt-2">
                <label class="form-label">Price</label>
                <input type="number" class="form-control mb-3" id='price' placeholder="Enter here..." required/>
            </div>
            <div class="col-md-4 px-3 mt-2">
                <label class="form-label">Description</label>
                <input type="text" class="form-control mb-3" id='description' placeholder="Enter here..." required/>
            </div>
            <div class="col-md-4 mt-3 mx-auto">
                <label class="form-label"></label>
                <input type="submit" id="send" class="btn btn-primary w-100" name="submit" value="Submit" />
            </div>
        </div>
<!-- delete model -->


<!-- Modal -->
<div class="modal fade" id="deleteModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <input type="hidden" id="del_id" value="" />
      <div class="modal-body">
    Are you sure , Do you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="deleteConfirm">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- end deleted -->
 <!-- edit  Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <input type="hidden" id="item_id" value="" />
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST">
                        <div class="mb-3">
                            <label for="name2" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name2" placeholder="Enter here" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="price2" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price2" placeholder="Enter here" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="description2" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description2" placeholder="Enter here" required autocomplete="off">
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



    <div class="container">
        <div class="loader spinner-border text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <!-- search input -->
        <div class="mt-5 ">
            <input type="text" id="searchInput" placeholder="type to search" class="form-control w-50" />
        </div>
<!-- show data -->
        <div id="data_table" class="mt-2">

        </div>

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
                // send data on insert qry page
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
                        loadData();
                     
                    }
                })


            })
// show data

function loadData(query) {
                $.ajax({
                    url: "./ajax.php",
                    type: "GET",
                    data: {
                        query : query
                    },
                    success: function(response) {
                        $('#data_table').html(response);
                       
                        
                    },
                   

                    error: function(err) {
                        console.log(err);
                    }
                });
            }

            loadData();
            // edit data
            $(document).on("click", '.editBtn', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "./show-data-query.php",
                    type: "GET",
                    data: {
                        id: id
                    },
                    
                    success: function(res) {
                        
                        let data = JSON.parse(res);
                       $("#name2").val(data.name);
                       $("#price2").val(data.price);
                       
                       $("#description2").val(data.description);
                   
                       $("#item_id").val(data.id);
                        $("#editModal").modal("show");
                        // console.log(data.name)
                    }
                })
            });
            //update item
            $("#updateBtn").on("click",  function(e) {
                e.preventDefault();
                $.ajax({
                    url: "./update.php",
                    type: "POST",
                    data: {
                        name: $("#name2").val(),
                        price: $("#price2").val(),
                        description: $("#description2").val(),
                        id: $("#item_id").val()
                    },
                    success: function(res) {
                        $("#messages").html(res).show();
                        setTimeout(() => {
                            $("#messages").hide();
                            $("#editModal").modal("hide");
                        }, 2000)
                    }
                })
//
            
            })

            
             // delete data

         $(document).on("click", '.deleteBtn', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "./show-data-query.php",
                    type: "GET",
                    data: {
                        id: id
                    },
                    
                    success: function(res) {
                        
                        let data = JSON.parse(res);
            
                       $("#del_id").val(data.id);
                        $("#deleteModal").modal("show");
                        // console.log(data.name)
                    }
                })
            });


           //update item
           $("#deleteConfirm").on("click",  function() {
            
            console.log($("#del_id").val())

                $.ajax({
                    url: "./delete.php",
                    type: "GET",
                    data: {
                        id: $("#del_id").val()
                    },
                    success: function(res) {
                        console.log(res)
                        $("#success").html(res).show();
                        setTimeout(() => {
                            $("#messages").hide();
                            $("#deleteModal").modal("hide");
                        }, 1000)
                        loadData()
                    }
                })
//
            
            })

            
            



      

            // hide modal event
            const myModalEl = document.getElementById('editModal')
            myModalEl.addEventListener('hidden.bs.modal', event => {
                loadData();
            })



    

  
            // search inputs

        // search / filter
        $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                if(value.length > 1) {
                    loadData(value);
                } else {
                    loadData();
                }
            });
            })
    
    </script>
</body>

</html>