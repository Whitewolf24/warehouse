<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product</title>
   <!--  <link href="https://warehouse-riwu.onrender.com/css/style.css" rel="stylesheet"> -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <script src="https://warehouse-riwu.onrender.com/js/script.js"></script>
</head>

<body>
   <form method="POST" action="{{ route('product.store') }}">
      @csrf
      <header>
         <h1>Add Product</h1>
         <div class="buttons">
            <button type="submit" id="save-product-btn">Save</button>
            <button type="button" id="cancel-btn" onclick="window.location='/';">Cancel</button>
         </div>
      </header>

      <main>

         <div id="form">
            <!-- SKU Field -->
            <div>
               <label for="sku">
                  <p id="sku_label">SKU</p>
               </label>
               <input type="text" name="sku" id="sku" value="{{ old('sku') }}" required>
               @error('sku') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Name Field -->
            <div id="name_div">
               <label for="name">
                  <p id="name_label">Product Name</p>
               </label>
               <input type="text" name="name" id="name" value="{{ old('name') }}" required>
               @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Price Field -->
            <div>
               <label for="price">
                  <p id="price_label">Price</p>
               </label>
               <input type="text" name="price" id="price" value="{{ old('price') }}" required>
               @error('price') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div id="product_div">
               <!-- Product Type Dropdown -->
               <label for="productType" id="productType_label">Product Type:</label>
               <select name="productType" id="productType" required>
                  <option value="val1">DVD</option>
                  <option value="val2">Book</option>
                  <option value="val3">Furniture</option>
               </select>
               @error('productType')
               <div class="error">{{ $message }}</div> @enderror

               <div id="type_fields">
                  <!-- DVD -->
                  <div id="size-field" style="display: none;">
                     <label for="size">Size (MB)</label>
                     <input type="text" name="size" id="size" value="{{ old('size') }}">
                     @error('size') <div class="error">{{ $message }}</div> @enderror
                  </div>

                  <!-- Book -->
                  <div id="weight-field" style="display: none;">
                     <label for="weight">Weight (KG)</label>
                     <input type="text" name="weight" id="weight" value="{{ old('weight') }}">
                     @error('weight') <div class="error">{{ $message }}</div> @enderror
                  </div>

                  <!-- Furniture -->
                  <div id="dimensions-field" style="display: none;">
                     <label for="height">Height (CM)</label>
                     <input type="text" name="height" id="height" value="{{ old('height') }}">
                     @error('height') <div class="error">{{ $message }}</div> @enderror

                     <label for="width">Width (CM)</label>
                     <input type="text" name="width" id="width" value="{{ old('width') }}">
                     @error('width') <div class="error">{{ $message }}</div> @enderror

                     <label for="length">Length (CM)</label>
                     <input type="text" name="length" id="length" value="{{ old('length') }}">
                     @error('length') <div class="error">{{ $message }}</div> @enderror
                  </div>

                  <div id="product_desc">
                     <span id="size_desc" class="description">Please, provide size in MB for DVD</span><br>
                     <span id="weight_desc" class="description">Please, provide weight for Book</span><br>
                     <span id="hwl_desc" class="description">Please, provide dimensions in HxWxL format for Furniture</span><br>
                  </div>
               </div>
            </div>
         </div>
      </main>
   </form>

</body>

</html>

<style>
#form input:not(#sku),#productType_label{top:.5em}#name_label,#sku_label,#type_fields{bottom:1em;position:relative}#form input,#name_div,#name_label,#price_label,#productType,#productType_label,#product_desc,#product_div,#size_desc,#sku_label,#type_fields,#type_fields label,.buttons button,header{position:relative}*,::after,::before{box-sizing:border-box}body,html{border:0;font-family:"Open Sans",sans-serif;margin:0;padding:0}a{list-style:none;text-decoration:none}h1{height:.1em}header{align-content:center;border-bottom:2px solid #646464;padding-bottom:.5em;margin-top:2em;left:2em;width:92%}.buttons button{border:2px solid #000;bottom:.5em;display:block;filter:drop-shadow(2px 2px 2px #000);float:right;padding-block:5px;padding-inline:10px}#add-product-btn{right:11em}#delete-product-btn{left:3.5em}#save-product-btn{right:8em}#cancel-btn{left:3.7em}#form{display:grid;grid-template-columns:repeat(3,0.3fr);grid-template-rows:repeat(3,0.2fr);grid-row-gap:35px;margin-top:10em;margin-left:4em;text-align:center}@media only screen and (max-width:1000px) and (min-width:800px){#form{margin-left:1em}}@media only screen and (max-width:800px){#form{margin-left:-3em}}@media only screen and (max-height:520px) and (min-height:470px){#form{margin-top:6em}}@media only screen and (max-height:470px){#form{margin-top:4em}}#form input{height:25px;border-radius:5%;border:1.5px solid #000;width:150px}#sku{bottom:2em}#name_label{margin-bottom:-1em}#price_label{bottom:1.1em;margin-bottom:-1.05em}#name_div{right:4em}#product_div{display:flex;left:15em}#productType{left:1em;height:30px;top:1.6em}#type_fields{left:5em}@media only screen and (min-width:1500px){#product_div{left:19em}#type_fields{left:15em}}@media only screen and (min-width:1650px){#product_div{left:24em}#productType_label{top:1.5em}#type_fields{left:15em}}@media only screen and (min-width:1850px){#product_div{left:29em}#type_fields{left:20em}}#type_fields label{top:.4em}#type_fields input{margin-block:1em;margin-left:5em}#type_fields input:not(){margin-left:.5em}#dimensions-field,#size-field,#weight-field{display:flex;flex-direction:column}#size_desc{bottom:.3em}#product_desc{margin-top:1.5em;width:32ch}#product_desc span:not(#size_desc){bottom:1.6em;position:relative}#width{margin-left:1em}
</style>