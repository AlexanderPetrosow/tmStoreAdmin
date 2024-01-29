$(document).ready(function () {
	var dropZone = $('#upload-container');

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

					var slide = $('<div><img class="uploaded-image" src="' + e.target.result + '" alt="Изображение"><div class="delete-slide-button"><i class="ti ti-trash"></i></div></div>');
					$('.uploaded-carousel').slick('slickAdd', slide);

					slide.find('.delete-slide-button').on('click', function() {
						var currentSlide = $(this).closest('.slick-slide'); // Получаем текущий слайд
						$('.uploaded-carousel').slick('slickRemove', currentSlide.index()); // Удаляем текущий слайд по его индексу
					});

					// console.log(e.target.result);
				};
				reader.readAsDataURL(file);
			}
		});
		$.ajax({
			url: dropZone.attr('action'),
			type: dropZone.attr('method'),
			headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
			data: Data,
			contentType: false,
			processData: false,
			success: function (data) {
				// $('.success').fadeIn();
			}
		});
	}




	// Инициализация слайдера
	initSlider();

	function initSlider() {
		$('.uploaded-carousel').slick({

			slidesToShow: 4, // Количество отображаемых слайдов одновременно
			slidesToScroll: 1, // Количество прокручиваемых слайдов
			infinite: false,
			autoplay: true, // Бесконечная прокрутка
			centerPadding: false,
			arrows: true, // Показывать стрелки навигации
			dots: false, // Показывать точки навигации
			variableWidth: true,
			prevArrow: "<div></div>",
			nextArrow: "<div class='next-arrow'><i class='ti ti-chevron-right'></i></div>",
			responsive: [
				{
					breakpoints: 768,
					setting: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			],
			mobileFirst: true,
		});
	}

	
});
