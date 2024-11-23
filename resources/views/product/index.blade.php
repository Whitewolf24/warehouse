<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
   <title>Product List</title>
   <!--    <link href="https://warehouse-riwu.onrender.com/css/style.css" rel="stylesheet"> -->
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
               <input type="checkbox" name="ids[]" value="{{ $product->id }}" class="delete-checkbox">

               <p class="fields product-sku">{{ $product->sku}}</p>
               <p class="fields product-name">{{ $product->name}}</p>
               <p class="fields product-price">{{ $product->price}}</p>
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

<style>
   /* Styling some basic elements */
   *,
   *::before,
   *::after {
      box-sizing: border-box;
   }

   body,
   html {
      border: 0px;
      font-family: "Open Sans", sans-serif;
      height: 100vh;
      margin: 0px;
      min-height: -webkit-fill-available;
      min-height: 100vh;
      padding: 0px;
   }

   a {
      list-style: none;
      text-decoration: none;
   }

   h1 {
      height: 0.1em;
   }

   /* -------------------------------------------- */
   /* Styling the header and its elements */
   header {
      align-content: center;
      border-bottom: solid rgb(100, 100, 100) 2px;
      padding-bottom: 0.5em;
      margin-top: 2em;
      left: 2em;
      position: relative;
      width: 92%;
   }

   .buttons button {
      border: solid black 2px;
      bottom: 2.6em;
      display: block;
      filter: drop-shadow(2px 2px 2px #000);
      float: right;
      padding-block: 5px;
      padding-inline: 10px;
      position: relative;
   }

   header h1 {
      margin-bottom: 1.3em;
   }

   #add-product-btn {
      right: 11em;
   }

   #delete-product-btn {
      left: 3.5em;
   }

   #save-product-btn {
      right: 8em;
   }

   #cancel-btn {
      left: 3.7em;
   }

   /* -------------------------------------------- */
   /* Styling the main content */

   /* First page */

   .alert-success {
      text-align: center;
      margin-top: 2em;
      color: green;
   }

   .alert-error {
      text-align: center;
      margin-top: 2em;
      color: red;
   }

   #main_content {
      display: flex;
      flex-wrap: wrap;
      gap: 2em 2em;
      justify-content: center;
      margin-block: 3em;
      margin-inline: 13em;
   }


   .box {
      border: solid black 2px;
      font-size: max(2.2vmin, 90%);
      height: 13em;
      min-height: 13em;
      min-width: 15em;
      width: 15em;
   }

   .delete-checkbox {
      height: 10%;
      margin-left: 1em;
      margin-top: 1.5em;
      width: 7%;
   }

   .fields {
      bottom: 1em;
      position: relative;
      text-align: center;
   }

   .fields p {
      line-height: 0.6;
   }
</style>