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




  

})

