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
   /* Styling the footer and its elements */
   footer {
      border-top: solid rgb(100, 100, 100) 2px;
      font-size: max(2.2vmin, 85%);
      left: 2em;
      position: relative;
      width: 92%;
   }

   footer p {
      margin-top: 1.5em;
      text-align: center;
   }

   /* -------------------------------------------- */
   /* Styling the main content of both pages */

   /* First page */
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

   /* Second page */
   /* Grid for the 1st part of the form */
   /* #main_content_add {
  font-size: max(2.2vmin, 90%);
  margin-top: 2em;
  margin-inline: 2em;
}

#main_content_add span {
  margin-inline: 2em;
  width: 90%;
}

#main_content_add input:not(#price) {
  margin-bottom: 1em;
}

#main_content_add select {
  font-size: max(2.1vmin, 85%);
  grid-area: options;
  height: 35%;
  justify-self: center;
  left: 2em;
  margin-bottom: 3em;
  position: relative;
  top: 3.1em;
  width: 60%;
}

#main_content_add_grid {
  display: grid;
  gap: 0.5em;
  grid-template-areas: "skuspan skufield skuerror" "namespan namefield nameerror" "pricespan pricefield priceerror" "types options ...";
  grid-template-columns: 5em 10em 15em;
  grid-template-rows: repeat(4, 0.5fr);
}

#main_content_add_grid span {
  align-self: center;
  width: 90%;
}

#main_content_add_grid input {
  height: 65%;
  top: 0.7em;
  border-radius: 5%;
  border: 1.5px black solid;
  justify-self: right;
  left: 1em;
  position: relative;
  width: 80%;
} */

   /* Grid for the different types*/
   #attrib_form {
      display: grid;
      gap: 0.5em;
      grid-template-areas: "first_attr_span first_attr_field first_attr_error" "product_descr product_descr ...";
      grid-template-columns: 5em 10em 15em;
      grid-template-rows: repeat(4, 0.5fr);
      margin-top: 2.3em;
   }

   #attrib_form span {
      align-self: center;
      width: 125%;
   }

   #attrib_form input {
      align-self: center;
      /*   height: 55%; */
      top: 0.5em;
      border-radius: 5%;
      border: 1.5px black solid;
      justify-self: right;
      left: 1em;
      position: relative;
      width: 80%;
      height: 3rem;
      transition: visibility 0s, height 0.3s ease-out;
   }



   /* Grid assign*/
   #sku_span {
      grid-area: skuspan;
   }

   #sku {
      grid-area: skufield;
   }

   #sku_error {
      grid-area: skuerror;
   }

   #name_span {
      grid-area: namespan;
   }

   #name {
      grid-area: namefield;
   }

   #name_error {
      grid-area: nameerror;
   }

   #price_span {
      grid-area: pricespan;
   }

   #price {
      grid-area: pricefield;
   }

   #price_error {
      grid-area: priceerror;
   }

   #types {
      grid-area: types;
      margin-block: 1em;
      position: relative;
      top: 1em;
   }

   #size_span,
   #height_span,
   #weight_span {
      grid-area: first_attr_span;
   }

   #size,
   #height,
   #weight {
      grid-area: first_attr_field;
   }

   .size_error,
   .height_error,
   .weight_error {
      grid-area: first_attr_error;
   }

   #size_desc {
      bottom: 0.3em;
      position: relative;
   }

   #width_span {
      grid-area: widthspan;
   }

   #width {
      grid-area: widthfield;
   }

   .width_error {
      grid-area: widtherror;
   }

   #length_span {
      grid-area: lengthspan;
   }

   #length {
      grid-area: lengthfield;
   }

   .length_error {
      grid-area: lengtherror;
   }

   #product_desc {
      grid-area: product_descr;
      margin-top: 1em;
   }

   #product_desc span:not(#size_desc) {
      bottom: 1.6em;
      position: relative;
   }
</style>