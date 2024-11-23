$(document).ready(function () {
    // Define form elements
    const size_desc = $("#size_desc");
    const weight_desc = $("#weight_desc");
    const hwl_desc = $("#hwl_desc");

    // Function to toggle visibility of attributes based on selected product type
    function toggleAttributes() {
        var productType = $("#productType").val();

        // Reset all fields first
        $('#size-field').removeClass('show').hide();
        $('#weight-field').removeClass('show').hide();
        $('#dimensions-field').removeClass('show').hide();
        $('#size_desc').hide();
        $('#weight_desc').hide();
        $('#hwl_desc').hide();

        // Show/Hide attributes based on selected product type
        if (productType === "val1") { // DVD
            $('#size-field').addClass('show').show();  // Show size field
            $('#size_desc').show();
        } else if (productType === "val2") { // Book
            $('#weight-field').addClass('show').show(); // Show weight field
            $('#weight_desc').show();
        } else if (productType === "val3") { // Furniture
            $('#dimensions-field').addClass('show').show(); // Show dimensions fields
            $('#hwl_desc').show();
        }
    }

    // Initially show the correct attributes based on the default product type (e.g., DVD)
    toggleAttributes();

    // Listen for change in product type selection and update input fields visibility
    $("#productType").change(function () {
        toggleAttributes(); // Adjust visibility based on dropdown selection
    });

    // Formatting functions (price, size, etc.) remain the same
    $("#price").on('blur', function () {
        var price = $(this).val();
        price = price.replace(/[^0-9.]/g, ''); // Remove any non-numeric or non-period characters
        if (price) {
            var formattedPrice = parseFloat(price).toFixed(2);
            $(this).val(formattedPrice);
        } else {
            $(this).val('0.00');
        }
    });

    $("#size").on('blur', function () {
        let size = $(this).val();
        size = size.replace(/[^0-9.]/g, '');  // Remove any non-numeric characters except dot

        if (size) {
            // Format to remove trailing zeros, but keep one decimal if needed
            let formattedSize = parseFloat(size);
            // This will convert the number to a string without unnecessary trailing zeros
            $(this).val(formattedSize.toString());
        } else {
            $(this).val('0');
        }
    });

    // Apply decimal formatting to other fields as well
    function formatDecimalField(selector, decimalPlaces) {
        $(selector).on('blur', function () {
            var value = $(this).val();
            value = value.replace(/[^0-9.]/g, '');
            if (value) {
                var formattedValue = parseFloat(value).toFixed(decimalPlaces);
                $(this).val(formattedValue);
            } else {
                $(this).val('0.00');
            }
        });
    }

    formatDecimalField("#weight", 2);
    formatDecimalField("#height", 2);
    formatDecimalField("#width", 2);
    formatDecimalField("#length", 2);
});
