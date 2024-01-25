
$(document).ready(function () {
	var dropZone = $('#upload-container');
	var uploadedCarousel = $('.uploaded-carousel'); // Слайдер

	$('#file-input').change(function () {
		let files = this.files;
		sendFiles(files);
	});


	dropZone.on('drag dragstart dragend dragover dragenter dragleave drop', function (event) {
		event.preventDefault();
	});

	dropZone.on('dragover dragenter', function () {
		dropZone.addClass('dragover');
	});

	dropZone.on('dragleave', function (e) {
		let dx = e.pageX - dropZone.offset().left;
		let dy = e.pageY - dropZone.offset().top;
		if ((dx < 0) || (dx > dropZone.width()) || (dy < 0) || (dy > dropZone.height())) {
			dropZone.removeClass('dragover');
		}
	});

	dropZone.on('drop', function (e) {
		e.preventDefault();
		dropZone.removeClass('dragover');
		let files = e.originalEvent.dataTransfer.files;
		sendFiles(files);
	});

	function sendFiles(files) {
		let maxFileSize = 5242880;
		let Data = new FormData();

		$(files).each(function (index, file) {
			if ((file.size <= maxFileSize) && ((file.type == 'image/png') || (file.type == 'image/jpeg'))) {
				Data.append('images[]', file);
				let reader = new FileReader();
				reader.onload = function (e) {
					// Создаем элемент изображения и добавляем его в слайдер
					var imgElement = $('<img class="uploaded-image">');
					imgElement.attr('src', e.target.result);
					uploadedCarousel.append(imgElement);
				};
				reader.readAsDataURL(file);
			};
		});
		$.ajax({
			url: dropZone.attr('action'),
			type: dropZone.attr('method'),
			headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
			data: Data,
			contentType: false,
			processData: false,
			success: function (data) {
				$('.success').fadeIn();
			}
		});
		initSlider();
	}
	function initSlider() {
        uploadedCarousel.slick({
            slidesToShow: 3, // Количество отображаемых слайдов одновременно
            slidesToScroll: 1, // Количество прокручиваемых слайдов
            infinite: true, // Бесконечная прокрутка
            arrows: true, // Показывать стрелки навигации
            dots: true // Показывать точки навигации
        });
    }
});

