<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<div class="dropdown">
					  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown button
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						@foreach($categories as $category)
							<li href="#" value="{{$category->id}}" class="dropdown-item" id="category{{$category->id}}">{{$category->name}}</li>
						@endforeach
					  </div>
					</div>
					<br>
					<label>Category</label>
					<select class="form-control" name = "category">
						<option value="0">Please Select Category</option>
						@foreach($categories as $category)
							<option class="text-red" value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6">
					<label>Products</label>
					<select class="form-control" name = "product">
						<option value="0">Please Select Product</option>
						@foreach($products as $product)
						<option value="{{$product->id}}">{{$product->name}}</option>
						@endforeach
	 
					</select>
					<br>
					
					<button type="button">Click Here</button>
					<p id="demo"></p>
				</div>
			</div>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
			@foreach($categories as $category)
			  $("#category{{$category->id}}").click(function(){
				var cat = $("#category{{$category->id}}").val();
				alert(cat);
			  });
			@endforeach
		});
	</script>

  </body>
</html>



