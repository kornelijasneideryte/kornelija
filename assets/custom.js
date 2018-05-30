$(document).ready(function () {
    $("#country").keyup(function () {
        $.ajax({
            type: "POST",
            url: "GetCountryName",
            data: {
                keyword: $("#country").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#country').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#country').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['miestas'] + '</a></li>');
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#country').val($(this).text());
    });


    $("#country2").keyup(function () {
        $.ajax({
            type: "POST",
            url: "GetCountryName2",
            data: {
                keyword: $("#country2").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry2').empty();
                    $('#country2').attr("data-toggle", "dropdown");
                    $('#DropdownCountry2').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#country2').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry2').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['miestas'] + '</a></li>');
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    });
    $('ul.txtcountry2').on('click', 'li a', function () {
        $('#country2').val($(this).text());
    });



});