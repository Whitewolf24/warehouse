<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
   <title>Warehouse</title>
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
               <p class="fields product-size">{{ $product->size}}</p>
               <p class="fields product-weight">{{ $product->weight}}</p>
               <p class="fields product-furniture">{{ $product->height}}{{ $product->width}}{{ $product->length}}</p>
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
.box,.buttons button{border:2px solid #000}.buttons button,.fields,header{position:relative}.alert-error,.alert-success,.fields{text-align:center}*,::after,::before{box-sizing:border-box}body,html{border:0;font-family:"Open Sans",sans-serif;height:100vh;margin:0;min-height:100vh;padding:0}a{list-style:none;text-decoration:none}h1{height:.1em}header{align-content:center;border-bottom:2px solid #646464;padding-bottom:.5em;margin-top:2em;left:2em;width:92%}.buttons button{bottom:2.6em;display:block;filter:drop-shadow(2px 2px 2px #000);float:right;padding-block:5px;padding-inline:10px}header h1{margin-bottom:1.3em}#add-product-btn{right:11em}#delete-product-btn{left:3.5em}#save-product-btn{right:8em}#cancel-btn{left:3.7em}.alert-success{margin-top:2em;color:green}.alert-error{margin-top:2em;color:red}#main_content{display:flex;flex-wrap:wrap;gap:2em 2em;justify-content:center;margin-block:3em;margin-inline:13em}.box{font-size:max(2.2vmin, 90%);height:13em;min-height:13em;min-width:15em;width:15em}.delete-checkbox{height:10%;margin-left:1em;margin-top:1.5em;width:7%}.fields{bottom:1em}.fields p{line-height:.6}
</style>