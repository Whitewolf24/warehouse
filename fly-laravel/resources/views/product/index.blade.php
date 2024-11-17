<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
   <title>Product List</title>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
   <form action="{{ route('product.massDelete') }}" method="POST">
      @csrf
      <header id="header">
         <h1>Product List</h1>
         <div class="buttons">
            <a href="{{ route('product.add') }}">
               <button id="add-product-btn" type="button">ADD</button>
            </a>
            <button id="delete-product-btn" type="submit" name="massdelete" onclick="return confirm('Are you sure you want to delete selected products?')">MASS DELETE</button>
         </div>
      </header>

      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @elseif(session('error'))
      <div class="alert alert-error">{{ session('error') }}</div>
      @endif

      <main id="main-content">
         <div id="main_content" class="main-content">
            @if(count($products) > 0)
            @foreach($products as $product)
            <div class="box product-box">
               <!-- Checkbox field outside the fields class -->
               <input type="checkbox" name="ids[]" value="{{ $product->id }}" class="delete-checkbox">

               <!-- Product fields directly inside the product box -->
               <!-- Use the exact attribute names from dd() -->
               <p class="fields product-sku">{{ $product->SKU }}</p>
               <p class="fields product-name">{{ $product->Name }}</p>
               <p class="fields product-price">{{ $product->Price }}</p>
            </div>
            @endforeach
            @else
            <p>No products available</p>
            @endif
         </div>
      </main>
   </form>
</body>

</html>