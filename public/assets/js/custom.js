$(document).ready(function () {
    $(".category-option").click(function () {
        $(".category-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });
    $(".user-option").click(function () {
        $(".user-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });
    $(".city-option").click(function () {
        $(".city-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });
    $(".district-option").click(function () {
        $(".district-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });
    $(".status-option").click(function () {
        $(".status-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });
    $(".vip-status-option").click(function () {
        $(".vip-status-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });
    $(".main-page-banner-option").click(function () {
        $(".main-page-banner-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });
    $(".adv-page-banner-option").click(function () {
        $(".adv-page-banner-option").removeClass("selected"); // Удаляем класс с предыдущего выбора
        $(this).addClass("selected"); // Добавляем класс к текущему выбору
    });


    $("#category-select-button").click(function () {
        var selectedCategory = $(".selected").data("value");
        $("#categoryModalButton").text(selectedCategory);
        $("#categoryModalButton").attr("data-selected", selectedCategory);
        $("#categoryModalButton").addClass("selected-text-color"); // Добавляем класс для цвета текста кнопки
        $(".category-option").removeClass("selected"); // Удаляем класс после выбора
        $('.categoryValue').val(selectedCategory);
    });
    $("#user-select-button").click(function () {
        var selectedUser = $(".selected").data("value");
        $("#userModalButton").text(selectedUser);
        $("#userModalButton").attr("data-selected", selectedUser);
        $("#userModalButton").addClass("selected-text-color"); // Добавляем класс для цвета текста кнопки
        $(".user-option").removeClass("selected"); // Удаляем класс после выбора
        $('.user').val(selectedUser);
    });
    $("#city-select-button").click(function () {
        var selectedCity = $(".selected").data("value");
        $("#cityModalButton").text(selectedCity);
        $("#cityModalButton").attr("data-selected", selectedCity);
        $("#cityModalButton").addClass("selected-text-color"); // Добавляем класс для цвета текста кнопки
        $(".city-option").removeClass("selected"); // Удаляем класс после выбора
        $('.cityValue').val(selectedCity);
    });
    $("#icon-select-button").click(function () {
        var selectedIcon = $(".selected").data("value");
        $("#iconModalButton").text(selectedIcon);
        $("#iconModalButton").attr("data-selected", selectedIcon);
        $("#iconModalButton").addClass("selected-text-color"); // Добавляем класс для цвета текста кнопки
        $(".icon-option").removeClass("selected"); // Удаляем класс после выбора
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
        var selectedDistrict = $(this).data("value");
        var accordionButton = $("#districtAccordion").find(".accordion-button");
        accordionButton.text(selectedDistrict);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.districtValue').val(selectedDistrict);
    });
    $(".main-page-banner-option").click(function () {
        var selectedStatus = $(this).data("value");
        var accordionButton = $("#mainPageBannerAccordion").find(".accordion-button");
        accordionButton.text(selectedStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.mainPageBannerValue').val(selectedStatus);
    });
    $(".adv-page-banner-option").click(function () {
        var selectedStatus = $(this).data("value");
        var accordionButton = $("#advPageBannerAccordion").find(".accordion-button");
        accordionButton.text(selectedStatus);
        accordionButton.css("color", "#2b2b35");
        accordionButton.trigger("click");
        $('.advPageBannerValue').val(selectedStatus);
    });



    $('.navbar-toggler').click(function () {
        $('#navbarNav').toggleClass('show');
    });

    // Закрывать сайдбар по клику на кнопку "Закрыть"
    $('.close-sidebar-button').click(function () {
        $('#navbarNav').removeClass('show');
    });


    // Функция для создания и отображения иконок
    function displayIcons() {
        var iconContainer = $('.icon-list'); // Элемент, в котором будут отображаться иконки

        // $.ajax({
        //     url: '/fetch-files',
        //     method: 'POST',
        //     headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
        //     success: function(response) {
        //         var files = JSON.parse(response);
        //         var fileList = $('#fileList');
        //         fileList.empty();
        //         console.log(files);
        //         for (var i = 0; i < files.length; i++) {
        //             var iconName = files[i].replace('.svg', '');
        //             var iconHTML = '<i class="ti ti-' + iconName + '"></i>';
        //             iconContainer.append(iconHTML);

                   
        //             // var iconCopy = $(iconHTML);
        //             // iconCopy.addClass('modal-icon'); // Добавляем класс для стилизации
                  
        //         }
        //     },
        //     error: function(xhr, status, error) {
        //         console.error("Ошибка при выполнении запроса:", status, error);
        //     }
            
        // });
        $('#iconModal').on('click', function() {
            $.ajax({
                url: '/fetch-files',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
                success: function(response) {
                    var files = JSON.parse(response);
                    var fileList = $('.icon-list');
                    fileList.empty();
                    for (var i = 0; i < files.length; i++) {
                        fileList.append('<li>' + files[i] + '</li>');
                    }
                },
                error: function() {
                    alert('Произошла ошибка при загрузке файлов.');
                }
            });
        });
    }

    $('#iconModalButton').on('click', function() {
        displayIcons();
    });
    

})

