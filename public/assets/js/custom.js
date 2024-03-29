$(window).on('load', function(){
    $('.loading').fadeOut(500);
});

$(document).ready(function () {
    $("#categoryModal").on("show.bs.modal", function () {
        $("#category-select-button").prop("disabled", true);
    });

    // Category
    $(".category-option").click(function () {
        if ($(this).data('category') != '') {
            $(".category-option").removeClass("selected");
            $(this).addClass("selected");
            $("#category-select-button").prop("disabled", false);
        }
    });
    $("#category-select-button").click(function () {

        var selectedCategory = $(".selected").data("category");
        $("#categoryModalButton").text(selectedCategory);
        $("#categoryModalButton").attr("data-selected", selectedCategory);
        $("#categoryModalButton").addClass("selected-text-color");
        $('.categoryValue').val($(".selected").data("value"));
        // $(".category-option").removeClass("selected"); 
    });



    $("#userModal").on("show.bs.modal", function () {

        $("#user-select-button").prop("disabled", true);
    });
    $(".user-option").click(function () {
        $(".user-option").removeClass("selectedUser").removeClass("selected");
        $(this).addClass("selectedUser").addClass('selected');
        $("#user-select-button").prop("disabled", false);
    });



    $("#cityModal").on("show.bs.modal", function () {

        $("#city-select-button").prop("disabled", true);
    });
    $(".city-option").click(function () {
        if ($(this).data('district') == "") {
            $(".city-option").removeClass("selected");
            $(this).addClass("selected");
            $("#city-select-button").prop("disabled", false);
        }

    });


    $(".district-option").click(function () {
        $(".district-option").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".status-option").click(function () {
        $(".status-option").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".vip-status-option").click(function () {
        $(".vip-status-option").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".main-page-banner-option").click(function () {
        $(".main-page-banner-option").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".adv-page-banner-option").click(function () {
        $(".adv-page-banner-option").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".category-page-banner-option").click(function () {
        $(".category-page-banner-option").removeClass("selected");
        $(this).addClass("selected");
    });


    $("#category-select-button").click(function () {
       
        var selectedCategory = $(".category-option.selected").data("name");
        $("#categoryModalButton").text(selectedCategory);
        $("#categoryModalButton").attr("data-selected", selectedCategory);
        $("#categoryModalButton").addClass("selected-text-color");
        $('.categoryValue').val($(".category-option.selected").data("value"));
        // $(".category-option").removeClass("selected"); 
       
    });
    $("#user-select-button").click(function () {
        var selectedUser = $(".selectedUser").data("name");
        $("#userModalButton").text(selectedUser);
        $("#userModalButton").attr("data-selected", selectedUser);
        $("#userModalButton").addClass("selected-text-color");
        $('.userValue').val($(".selectedUser").data("value"));
        $(".user-option").removeClass("selectedUser").removeClass("selected");
    });
    $("#city-select-button").prop("disabled", true);

    $("#city-select-button").click(function () {
        var selectedCity = $(".selected").data("name");
        $("#cityModalButton").text(selectedCity);
        $("#cityModalButton").attr("data-selected", selectedCity);
        $("#cityModalButton").addClass("selected-text-color");
        $(".city-option").val(".selected").data("name");
        $('.cityValue').val(selectedCity);
    });
    $("#icon-select-button").click(function () {
        var selectedIcon = $(".ti.selected").data("value");
        $("#iconModalButton").text(selectedIcon);
        $("#iconModalButton").attr("data-selected", selectedIcon);
        $("#iconModalButton").addClass("selected-text-color");
        $(".icon-option").removeClass("selected");
        $('.iconValue').val(selectedIcon);
    });



    $(".status-option").click(function () {
        var selectedStatus = $(this).data("name");
        var accordionButton = $("#statusAccordion").find(".accordion-button");
        accordionButton.text(selectedStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.statusValue').val($(this).data("value"));
    });

    $(".vip-status-option").click(function () {
        var selectedVipStatus = $(this).data("name");
        var accordionButton = $("#vipStatusAccordion").find(".accordion-button");
        accordionButton.text(selectedVipStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.vipStatusValue').val($(this).data("value"));
    });

    $(".district-option").click(function () {
        var selectedDistrict = $(this).data("name");
        var accordionButton = $("#districtAccordion").find(".accordion-button");
        accordionButton.text(selectedDistrict);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.districtValue').val($(this).data("value"));
    });
    $(".main-page-banner-option").click(function () {
        var selectedStatus = $(this).data("name");
        var accordionButton = $("#mainPageBannerAccordion").find(".accordion-button");
        accordionButton.text(selectedStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.mainPageBannerValue').val($(this).data("value"));
    });
    $(".adv-page-banner-option").click(function () {
        var selectedStatus = $(this).data("name");
        var accordionButton = $("#advPageBannerAccordion").find(".accordion-button");
        accordionButton.text(selectedStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.advPageBannerValue').val($(this).data("value"));
    });
    $(".category-page-banner-option").click(function () {
        var selectedStatus = $(this).data("name");
        var accordionButton = $("#categoryBannerAccordion").find(".accordion-button");
        accordionButton.text(selectedStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.categoryBannerValue').val($(this).data("value"));
    });



    $('.navbar-toggler').click(function () {
        $('#navbarNav').toggleClass('show');
    });


    $('.close-sidebar-button').click(function () {
        $('#navbarNav').removeClass('show');
    });



    var selectedIconValue = null;
    var iconsLoaded = false;

    function displayIcons() {

        var iconContainer = $('.icon-list');
        var iconModalButton = $('#iconModalButton');
        var iconSelectButton = $('#icon-select-button');
        var iconValue = $('#iconValue');
        var preloader = $('#preloader');

        iconSelectButton.prop('disabled', true);

        if (!iconsLoaded) {
            preloader.show();
        }

        $.ajax({
            url: '/fetch-files',
            method: 'POST',
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
            success: function (response) {
                iconContainer.empty();
                for (var i = 0; i < response.length; i++) {
                    var iconHTML = '<i class="fs-2 ti ti-' + response[i] + '"></i>';
                    iconContainer.append(iconHTML);
                }

                preloader.hide();
                iconsLoaded = true;

                iconContainer.off('click').on('click', 'i', function () {
                    iconContainer.find('i').removeClass('selected');
                    $(this).addClass('selected');

                    selectedIconValue = response[$(this).index()];
                    iconModalButton.html('<i class="ti ti-' + selectedIconValue + '"></i>');
                    iconSelectButton.prop('disabled', false);

                    iconValue.val(selectedIconValue);
                });
            },
            error: function (xhr, status, error) {
                console.error("Ошибка при выполнении запроса:", status, error);
            }
        });
    }

    $('#iconModalButton').on('click', function () {
        // Вызываем функцию только если иконки еще не загружены
        if (!iconsLoaded) {
            displayIcons();
        }
    });

    $('#icon-select-button').on('click', function () {
        $('#iconModal').modal('hide');
    });

});

$('.goToSub').click(function () {
    var categParent = $(this).parent().data('category');
    // console.log(categParent);
    // if (categParent == '2') {
        $('.category-body').fadeOut(10);
        $('.sub-category-body').fadeIn(10);
        $('.sub-category-body').removeClass('d-none');
        $.ajax({
            type: 'POST',
            url: "/getSubCategory",
            headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
            data: { id: categParent },
            dataType: 'json',
            success: function(sub){
                let subContent = '<div class="back-to-categ-btn" style="margin-left:20px;cursor:pointer"><i class="ti ti-chevron-left"></i></div>';
                console.log(sub);
                sub.forEach(s => {
                    subContent += '<p class="category-option" data-value="'+s['id']+'" data-name="'+s['ru_name']+'">'+s['ru_name']+'</p>';
                });
                $('.sub-category-body').html(subContent);
                $("#category-select-button").prop("disabled", true)
                $(".category-option").click(function () {
                    $(".category-option").removeClass("selectedCategory");
                    $(this).addClass("selectedCategory");
                    $("#category-select-button").prop("disabled", false);
                });

                $("#category-select-button").click(function () {
                    var selectedCategory = $(".selectedCategory").data("name");
                    $("#categoryModalButton").text(selectedCategory);
                    $("#categoryModalButton").attr("data-selected", selectedCategory);
                    $("#categoryModalButton").addClass("selected-text-color");
                    $('.categoryValue').val($(".selectedCategory").data("value"));
                    $('.sub-category-body').addClass('d-none');
                    $('.category-body').fadeIn(10);
                    $('.sub-category-body').fadeOut(10);
                });
                $('.back-to-categ-btn').click(function () {
                    $('.sub-category-body').addClass('d-none');
                    $('.category-body').fadeIn(10);
                    $('.sub-category-body').fadeOut(10);
                });
            }
        });
    // }
});

$('.goToCity').click(function () {
    var district = $(this).parent().data('district');
    // console.log(district);
    // if (district == 'ashabat') {
        $('.district-body').fadeOut(10);
        $('.city-body').fadeIn(10);
        $('.city-body').removeClass('d-none');
        $.ajax({
            type: 'POST',
            url: "/getCities",
            headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
            data: { id: district },
            dataType: 'json',
            success: function(cities){
                let cityContent = '<div class="back-to-district-btn" style="margin-left:20px;cursor:pointer"><i class="ti ti-chevron-left"></i></div>';
                cities.forEach(cc => {
                    cityContent += '<p class="city-option" data-value="'+cc['id']+'" data-name="'+cc['ru_name']+'">'+cc['ru_name']+'</p>';
                });
                $('.city-body').html(cityContent);
                $("#city-select-button").prop("disabled", true)
                $(".city-option").click(function () {
                    $(".city-option").removeClass("selectedCity");
                    $(this).addClass("selectedCity").addClass("selected");
                    $("#city-select-button").prop("disabled", false);
                });
                $("#city-select-button").click(function () {
                    var selectedCity = $(".selectedCity").data("name");
                    $("#cityModalButton").text(selectedCity);
                    $("#cityModalButton").attr("data-selected", selectedCity);
                    $("#cityModalButton").addClass("selected-text-color");
                    $('.cityValue').val($(".selectedCity").data("value"));
                    $('.city-body').addClass('d-none');
                    $('.district-body').fadeIn(10);
                    $('.city-body').fadeOut(10);
                });
                $('.back-to-district-btn').click(function () {
                    $('.city-body').addClass('d-none');
                    $('.district-body').fadeIn(10);
                    $('.city-body').fadeOut(10);
                });
            }
        });
    // }
});

$('.user_search').on('input', function(e){
    $.ajax({
        type: 'POST',
        url: "/getUsers",
        headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
        data: { search: e.target.value },
        dataType: 'json',
        success: function(user){
            let userContent = '';
            user.forEach(u => {
                userContent += '<p class="user-option" data-value="'+u['id']+'" data-name="'+u['phone']+'">'+u['phone']+'</p>';
            });
            $('.users_list').html(userContent);
            $(".user-option").click(function () {
                $(".user-option").removeClass("selectedUser").removeClass("selected");
                $(this).addClass("selectedUser").addClass("selected");
                $('.userValue').val($(".selectedUser").data("value"));
                $("#user-select-button").prop("disabled", false);
            });
            $("#user-select-button").click(function () {
                // $('.userValue').val($(".selectedUser").data("value"));
                $("#userModalButton").text(selectedUser);
                $("#userModalButton").attr("data-selected", selectedUser);
                $("#userModalButton").addClass("selected-text-color");
                $(".user-option").removeClass("selectedUser");
            });
        }
    });
    // console.log(e.target.value);
});

$('.date_vip').val($('.date_vips').val());
$('.sucureCheckBox').click(function(){
    if($(this).attr('checked') != undefined){
        $('.sucureCheckBox').removeAttr('checked', 'checked');
        $('.secureStatus').val('0');
    } else {
        $('.sucureCheckBox').attr('checked', 'checked');
        $('.secureStatus').val('1');
    }
});

$('.old_image').click(function(){
    $(this).parent().parent().append('<input type="hidden" name="removeImage[]" value="'+$(this).attr('link')+'">');
});
