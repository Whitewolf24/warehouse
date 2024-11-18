<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product</title>
   <link href="https://warehouse-riwu.onrender.com/css/style.css" rel="stylesheet">
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

      <main id="main_content_add">
         <div id="product_desc">
            <span id="size_desc" class="description">Please, provide size in MB for DVD</span><br>
            <span id="weight_desc" class="description">Please, provide weight for Book</span><br>
            <span id="hwl_desc" class="description">Please, provide dimensions in HxWxL format for Furniture</span><br>
         </div>

         <div id="main_content_add_grid">
            <!-- SKU Field -->
            <div class="form-group">
               <label for="sku">SKU</label>
               <input type="text" name="sku" id="sku" value="{{ old('sku') }}" required>
               @error('sku') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Product Name Field -->
            <div class="form-group">
               <label for="name">Product Name</label>
               <input type="text" name="name" id="name" value="{{ old('name') }}" required>
               @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Price Field (with decimal formatting) -->
            <div class="form-group">
               <label for="price">Price</label>
               <input type="text" name="price" id="price" value="{{ old('price') }}" required>
               @error('price') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Product Type and Dropdown Side by Side -->
            <div class="form-group">
               <label for="productType">Product Type:</label>
               <select name="productType" id="productType" required>
                  <option value="val1">DVD</option>
                  <option value="val2">Book</option>
                  <option value="val3">Furniture</option>
               </select>
               @error('productType') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div id="attrib_form">
               <!-- Size Field (Visible only for DVD) -->
               <div class="form-group" id="size-field" style="display: none;">
                  <label for="size">Size (MB)</label>
                  <input type="number" name="size" id="size" value="{{ old('size') }}">
                  @error('size') <div class="error">{{ $message }}</div> @enderror
               </div>

               <!-- Weight Field (Visible only for Book) -->
               <div class="form-group" id="weight-field" style="display: none;">
                  <label for="weight">Weight (KG)</label>
                  <input type="number" name="weight" id="weight" value="{{ old('weight') }}">
                  @error('weight') <div class="error">{{ $message }}</div> @enderror
               </div>

               <!-- Dimensions Fields (Visible only for Furniture) -->
               <div class="form-group" id="dimensions-field" style="display: none;">
                  <label for="height">Height (CM)</label>
                  <input type="number" name="height" id="height" value="{{ old('height') }}">
                  @error('height') <div class="error">{{ $message }}</div> @enderror

                  <label for="width">Width (CM)</label>
                  <input type="number" name="width" id="width" value="{{ old('width') }}">
                  @error('width') <div class="error">{{ $message }}</div> @enderror

                  <label for="length">Length (CM)</label>
                  <input type="number" name="length" id="length" value="{{ old('length') }}">
                  @error('length') <div class="error">{{ $message }}</div> @enderror
               </div>
            </div>
         </div>
      </main>
   </form>

</body>

</html>