$(window).on('load', function(){
    $('.loading').fadeOut(500);
});

$(document).ready(function () {
    $("#categoryModal").on("show.bs.modal", function () {
        $("#category-select-button").prop("disabled", true);
    });
    $(".category-option").click(function () {
        $(".category-option").removeClass("selected"); 
        $(this).addClass("selected"); 
        $("#category-select-button").prop("disabled", false);
    });



    $("#userModal").on("show.bs.modal", function () {
        
        $("#user-select-button").prop("disabled", true);
    });
    $(".user-option").click(function () {
        $(".user-option").removeClass("selected"); 
        $(this).addClass("selected");
        $("#user-select-button").prop("disabled", false);
    });



    $("#cityModal").on("show.bs.modal", function () {
        
        $("#city-select-button").prop("disabled", true);
    });
    $(".city-option").click(function () {
        $(".city-option").removeClass("selected"); 
        $(this).addClass("selected"); 
        $("#city-select-button").prop("disabled", false);
       
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
        var selectedCategory = $(".selected").data("name");
        $("#categoryModalButton").text(selectedCategory);
        $("#categoryModalButton").attr("data-selected", selectedCategory);
        $("#categoryModalButton").addClass("selected-text-color"); 
        $('.categoryValue').val($(".selected").data("value"));
        // $(".category-option").removeClass("selected"); 
    });
    $("#user-select-button").click(function () {
        var selectedUser = $(".selected").data("value");
        $("#userModalButton").text(selectedUser);
        $("#userModalButton").attr("data-selected", selectedUser);
        $("#userModalButton").addClass("selected-text-color"); 
        $(".user-option").removeClass("selected"); 
        $('.user').val(selectedUser);
    });
    $("#city-select-button").prop("disabled", true);
    
    $("#city-select-button").click(function () {
        var selectedCity = $(".selected").data("value");
        $("#cityModalButton").text(selectedCity);
        $("#cityModalButton").attr("data-selected", selectedCity);
        $("#cityModalButton").addClass("selected-text-color"); 
        $(".city-option").removeClass("selected"); 
        $('.cityValue').val(selectedCity);
    });
    $("#icon-select-button").click(function () {
        var selectedIcon = $(".selected").data("value");
        $("#iconModalButton").text(selectedIcon);
        $("#iconModalButton").attr("data-selected", selectedIcon);
        $("#iconModalButton").addClass("selected-text-color"); 
        $(".icon-option").removeClass("selected"); 
        $('.iconValue').val(selectedIcon);
    });



    $(".status-option").click(function () {
        var selectedStatus = $(this).data("value");
        var accordionButton = $("#statusAccordion").find(".accordion-button");

        accordionButton.text(selectedStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.statusValue').val(selectedStatus);
    });

    $(".vip-status-option").click(function () {
        var selectedVipStatus = $(this).data("value");
        var accordionButton = $("#vipStatusAccordion").find(".accordion-button");
        accordionButton.text(selectedVipStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.vipStatusValue').val(selectedVipStatus);
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
            success: function(response) {
                iconContainer.empty();
                for (var i = 0; i < response.length; i++) {
                    var iconHTML = '<i class="fs-2 ti ti-' + response[i] + '"></i>';
                    iconContainer.append(iconHTML);
                }

                preloader.hide();
                iconsLoaded = true; 

                iconContainer.off('click').on('click', 'i', function() {
                    iconContainer.find('i').removeClass('selected');
                    $(this).addClass('selected');

                    selectedIconValue = response[$(this).index()];
                    iconModalButton.html('<i class="ti ti-' + selectedIconValue + '"></i>');
                    iconSelectButton.prop('disabled', false);

                    iconValue.val(selectedIconValue);
                });
            },
            error: function(xhr, status, error) {
                console.error("Ошибка при выполнении запроса:", status, error);
            }
        });
    }

    $('#iconModalButton').on('click', function() {
        // Вызываем функцию только если иконки еще не загружены
        if (!iconsLoaded) {
            displayIcons();
        }
    });

    $('#icon-select-button').on('click', function() {
        $('#iconModal').modal('hide');
    });


});








