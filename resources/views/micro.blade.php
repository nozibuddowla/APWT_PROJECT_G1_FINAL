a<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Microservice | Hotel Manage</title>
  </head>
  <body>
    
  <div class="container mt-5">
    <h4 class="mt-5 text-primary">Hotel Manager | Microservice</h4>
    <h4 class="mb-5 d-inline">Welcome, {{session('profile.name')}} </h4>
  

    <h5 class="mt-5"></h5>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item ">
        <a class="nav-link" href="/employeeHome">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/micro">See Food List<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/pdf">Invoice</a>
      </li>
     
    </ul>
  </div>
</nav>


    <!-- <a href="{{route('products.employee.create')}}"><i class="fa fa-briefcase h3" aria-hidden="true"></i>Post new room</a>
    <a href="/pdf"><i class="fa fa-briefcase h3" aria-hidden="true"></i>Invoice</a> -->
    <!-- <input id="searchKey" name="searchKey" class="form-control col-3 float-right mt-0 mb-3" type="text" placeholder="Search by name"> -->
    <table class="table table-hover">
    <thead class="thead-dark">
        <tr>
          <th scope="col">id</th>
          <th scope="col">Meal Title</th>
          <th scope="col">Food Name</th>
          <th scope="col">Price</th> 
          <th scope="col">Description</th>
          <th scope="col">Tag</th>
          <th scope="col">Stock</th>          
        </tr>
      </thead>
   

      <tbody id='table-body'>
        @for($i=0; $i< count($product); $i++)
        <tr>
          <td> {{($product[$i]["pid"])}}</td>

          <td>  {{($product[$i]["ptitle"])}} </td>

          <td>  {{($product[$i]["rname"])}} </td>

          <td>{{($product[$i]["rprice"])}} </td>

          <td> {{($product[$i]["rdesc"])}} </td>

          <td> {{($product[$i]["tag"])}} </td>
          <td> {{($product[$i]["avail"])}} </td>
        
        </tr>
        @endfor

        
      </tbody>
      
      
    </table>
    
    




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  

    </body>
</html>
