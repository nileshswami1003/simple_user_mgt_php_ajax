<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body{
            font-family: arial;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    User Management
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row mt-2 mb-2">
        <div class="offset-2 col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add User</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="addUserForm">
                        <input type="hidden" name="userId" value="" id="userId">
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" id="btnSave" value="Save" class="btn btn-dark float-right">
                    </form>
                </div>
                <div class="card-footer" id="message">
                    <!-- registration message goes here -->
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="offset-2 col-8">
            <div class="card">
                <div class="card-header">
                    <h3>All Users List</h3>
                </div>
                <div class="card-body">
                    
                    <table class="table table-sm table-bordered" id="userListTable">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody id="userList">
                            <tr>
                                <!-- table data goes here -->
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<!-- custom javascript -->
<script src="script.js"></script>

</body>
</html>