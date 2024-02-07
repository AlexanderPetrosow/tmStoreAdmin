$(document).ready(function () {
	var dropZone = $('#upload-container');

	$('.delete-slide-button').click(function () {
		$(this).parent().remove();
	});

	$('#file-input').change(function () {
		let files = this.files;
		sendFiles(files, $(this).hasClass('oneImage'));
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
		if ($(this).hasClass('oneImage') && $('.uploaded-image').length > 0) {
			alert('В достигли максимально доступного количество изображений');
		} else {
			sendFiles(files);
		}
	});

	function sendFiles(files, oneImage) {
		let maxFileSize = 5242880;
		let Data = new FormData();
		let validFiles = $('.uploaded-image').length;


		if (oneImage && $('.uploaded-image').length > 0) {
			alert('Вы уже загрузили одно изображение.');
		} else {
			if (validFiles == 10) {
				alert('Превышено максимальное количество допустимых изображений (10). Лишние изображения будут удалены.');
				return false;
			} else {

				$(files).each(function (index, file) {
					if ((file.size <= maxFileSize) && ((file.type == 'image/png') || (file.type == 'image/jpeg'))) {
						if (validFiles < 10) {
							Data.append('images[]', file);
							validFiles++;
							let reader = new FileReader();
							reader.onload = function (e) {

								var slide = $('<div><img class="uploaded-image" src="' + e.target.result + '" alt="Изображение"><div class="delete-slide-button"><i class="ti ti-trash"></i></div><input type="hidden" name="images[]" value="' + e.target.result + '"></div>');
								$('.uploaded-carousel').slick('slickAdd', slide);

								slide.find('.delete-slide-button').on('click', function () {
									var currentSlide = $(this).closest('.slick-slide');
									$('.uploaded-carousel').slick('slickRemove', currentSlide.index());
								});puis

								if ($('#upload-container').hasClass('adverts-img')) {
									$('.uploaded-image').click(function () {
										$('.uploaded-image').removeClass('highlight');
										$('.main-image-hidden').remove();
										$('.main-photo-icon').remove();

										$(this).addClass('highlight');
										$(this).parent().append('<div class="main-photo-icon"><i class="ti ti-home"></i></div>');
										$(this).parent().append('<input type="hidden" class="main-image-hidden" name="main_image" value="' + e.target.result + '">');
									});
								}
							};
							reader.readAsDataURL(file);
						} else {
							alert('Превышено максимальное количество допустимых изображений (10). Лишние изображения будут удалены.');
							return false;
						}
					}
				});
			}

			if (validFiles <= 10) { 
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
		}
	}






	// Инициализация слайдера
	initSlider();

	function initSlider() {
		$('.uploaded-carousel').slick({

			slidesToShow: 4, // Количество отображаемых слайдов одновременно
			slidesToScroll: 2, // Количество прокручиваемых слайдов
			infinite: false,
			autoplay: false, // Бесконечная прокрутка
			centerPadding: false,
			arrows: true, // Показывать стрелки навигации
			dots: false, // Показывать точки навигации
			variableWidth: true,
			prevArrow: "<div></div>",
			nextArrow: "<i class='ti ti-chevron-right m-auto '></i>",
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
