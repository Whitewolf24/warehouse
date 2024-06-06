$(document).ready(function () {

    const form = $("#product_form");
    var attrib_form = $("#attrib_form");
    const size_desc = $("#size_desc");
    let weight_desc = $("#weight_desc");
    let hwl_desc = $("#hwl_desc");
    const sku_field = $("#sku");
    const name_field = $("#name");
    const price_field = $("#price");
    let size_field = $("#size");
    let weight_field = $("#weight");
    let width_field = $("#width");
    let height_field = $("#height");
    let length_field = $("#length");
    let size_span = $("#size_span");
    let weight_span = $("#weight_span");
    let width_span = $("#width_span");
    let height_span = $("#height_span");
    let length_span = $("#length_span");
    let size_error = $(".size_error");
    let weight_error = $(".weight_error");
    let width_error = $(".width_error");
    let height_error = $(".height_error");
    let length_error = $(".length_error");
    let errors = $(".errors");
    const no_space = $(".no_space");
    const whitespace = /\s/;
    /* const price_check = /^[0-9]*\.?[0-9]*$/;
    const character_check = /^[0-9]*[0-9]*$/; 
    */

    // Prevent spaces in the inputs //
    for (var i = 0; i < no_space.length; i++) {
        no_space.on("keypress", function (ev) {
            if (whitespace.test(ev.key)) {
                ev.preventDefault();
            }
        });
    }

    /*    $("body").on('beforeunload', function () {
           if ($("#productType").val() == "val1") {
               sessionStorage.setItem("dvd", "true");
               sessionStorage.setItem("book", "false");
               sessionStorage.setItem("furn", "false");
           }
           else if ($("#productType").val() == "val2") {
               $("#productType").val() == "val2"
               sessionStorage.setItem("dvd", "false");
               sessionStorage.setItem("book", "true");
               sessionStorage.setItem("furn", "false");
           }
           else if ($("#productType").val() == "val3") {
               $("#productType").val() == "val3"
               sessionStorage.setItem("dvd", "false");
               sessionStorage.setItem("book", "false");
               sessionStorage.setItem("furn", "true");
           }
           type_check();
       }); */

    // Call func to change values according to type - Store pointers in order to have selector memory on a refresh/bad submit //
    $("#productType").change(function () {
        //type_value = type.options[type.selectedIndex].value;
        if ($("#productType").val() == "val1") {
            sessionStorage.setItem("dvd", "true");
            sessionStorage.setItem("book", "false");
            sessionStorage.setItem("furn", "false");
        }
        else if ($("#productType").val() == "val2") {
            sessionStorage.setItem("dvd", "false");
            sessionStorage.setItem("book", "true");
            sessionStorage.setItem("furn", "false");
        }
        else if ($("#productType").val() == "val3") {
            sessionStorage.setItem("dvd", "false");
            sessionStorage.setItem("book", "false");
            sessionStorage.setItem("furn", "true");
        }
        type_check();
    });


    // Show or hide elements according to selector history //
    if (sessionStorage.getItem("dvd") == "true") {
        $("#productType").val("val1");
        size_desc.show();
        weight_desc.hide();
        hwl_desc.hide();
        size_field.show();
        weight_field.hide();
        width_field.hide();
        height_field.hide();
        length_field.hide();
        size_span.show();
        weight_span.hide();
        width_span.hide();
        height_span.hide();
        length_span.hide();
        attrib_form.css("grid-template-areas",
            `"first_attr_span first_attr_field first_attr_error"
    "product_descr product_descr ..."`);
        attrib_form.css("grid-template-rows", "repeat(2, 0.5fr)");
        width_error.hide();
        height_error.hide();
        length_error.hide();
        weight_error.hide();
        size_error.show();
    }
    else if (sessionStorage.getItem("book") == "true") {

        $("#productType").val("val2");
        size_desc.hide();
        weight_desc.show();
        hwl_desc.hide();
        size_field.hide();
        weight_field.show();
        width_field.hide();
        height_field.hide();
        length_field.hide();
        size_span.hide();
        weight_span.show();
        width_span.hide();
        height_span.hide();
        length_span.hide();
        attrib_form.css("grid-template-areas",
            `"first_attr_span first_attr_field first_attr_error"
    "product_descr product_descr ..."`);
        attrib_form.css("grid-template-rows", "repeat(2, 0.5fr)");
        width_error.hide();
        height_error.hide();
        length_error.hide();
        weight_error.show();
        size_error.hide();
    }
    else if (sessionStorage.getItem("furn") == "true") {
        $("#productType").val("val3");
        size_desc.hide();
        weight_desc.hide();
        hwl_desc.show();
        size_field.hide();
        weight_field.hide();
        width_field.show();
        height_field.show();
        length_field.show();
        size_span.hide();
        weight_span.hide();
        width_span.show();
        height_span.show();
        length_span.show();
        attrib_form.css("grid-template-areas",
            `"first_attr_span first_attr_field first_attr_error"
    "widthspan widthfield widtherror"
    "lengthspan lengthfield lengtherror"
    "product_descr product_descr product_descr"`);
        attrib_form.css("grid-template-rows", "repeat(4, 0.5fr)");
        width_error.show();
        height_error.show();
        length_error.show();
        weight_error.hide();
        size_error.hide();
    }

    // Show or hide elements according to selector type //
    function type_check() {
        if ($("#productType").val() == "val1") {
            size_desc.show();
            weight_desc.hide();
            hwl_desc.hide();
            size_field.show();
            weight_field.hide();
            width_field.hide();
            height_field.hide();
            length_field.hide();
            size_span.show();
            weight_span.hide();
            width_span.hide();
            height_span.hide();
            length_span.hide();
            attrib_form.css("grid-template-areas",
                `"first_attr_span first_attr_field first_attr_error"
        "product_descr product_descr ..."`);
            attrib_form.css("grid-template-rows", "repeat(2, 0.5fr)");
            width_error.hide();
            height_error.hide();
            length_error.hide();
            weight_error.hide();
            size_error.show();
        }
        else if ($("#productType").val() == "val2") {
            size_desc.hide();
            weight_desc.show();
            hwl_desc.hide();
            size_field.hide();
            weight_field.show();
            width_field.hide();
            height_field.hide();
            length_field.hide();
            size_span.hide();
            weight_span.show();
            width_span.hide();
            height_span.hide();
            length_span.hide();
            attrib_form.css("grid-template-areas",
                `"first_attr_span first_attr_field first_attr_error"
        "product_descr product_descr ..."`);
            attrib_form.css("grid-template-rows", "repeat(2, 0.5fr)");
            width_error.hide();
            height_error.hide();
            length_error.hide()
            weight_error.show();
            size_error.hide();
        }
        else if ($("#productType").val() == "val3") {
            size_desc.hide();
            weight_desc.hide();
            hwl_desc.show();
            size_field.hide();
            weight_field.hide();
            width_field.show();
            height_field.show();
            length_field.show();
            size_span.hide();
            weight_span.hide();
            width_span.show();
            height_span.show();
            length_span.show();
            attrib_form.css("grid-template-areas",
                `"first_attr_span first_attr_field first_attr_error"
        "widthspan widthfield widtherror"
        "lengthspan lengthfield lengtherror"
        "product_descr product_descr product_descr"`);
            attrib_form.css("grid-template-rows", "repeat(4, 0.5fr)");
            width_error.show();
            height_error.show();
            length_error.show();
            weight_error.hide();
            size_error.hide();
        }
    }

    // Fade errors //
    errors.delay(4500).fadeOut(1000);

    // Clear field history on cancel //
    $("#cancel-btn").click(function () {
        sessionStorage.clear();
    });

    // Get session values//
    let sku_memory = sessionStorage.getItem('sku_sess');
    let price_memory = sessionStorage.getItem('price_sess');
    let name_memory = sessionStorage.getItem('name_sess');
    let size_memory = sessionStorage.getItem('size_sess');
    let weight_memory = sessionStorage.getItem('weight_sess');
    let height_memory = sessionStorage.getItem('height_sess');
    let width_memory = sessionStorage.getItem('width_sess');
    let length_memory = sessionStorage.getItem('length_sess');

    // Populate fields with session //
    if (sessionStorage.getItem('sku_sess') == "null") {
        $("#sku").val("");
    } else {
        $("#sku").val(sku_memory);
    }

    if (sessionStorage.getItem('price_sess') == "null") {
        $("#price").val("");
    } else {
        $("#price").val(price_memory);
    }

    if (sessionStorage.getItem('name_sess') == "null") {
        $("#name").val("");
    } else {
        $("#name").val(name_memory);
    }

    if (sessionStorage.getItem('size_sess') == "null") {
        $("#size").val("");
    } else {
        $("#size").val(size_memory);
    }

    if (sessionStorage.getItem('weight_sess') == "null") {
        $("#weight").val("");
    } else {
        $("#weight").val(weight_memory);
    }

    if (sessionStorage.getItem('height_sess') == "null") {
        $("#height").val("");
    } else {
        $("#height").val(height_memory);
    }

    if (sessionStorage.getItem('width_sess') == "null") {
        $("#width").val("");
    } else {
        $("#width").val(width_memory);
    }

    if (sessionStorage.getItem('length_sess') == "null") {
        $("#length").val("");
    } else {
        $("#length").val(length_memory);
    }
});