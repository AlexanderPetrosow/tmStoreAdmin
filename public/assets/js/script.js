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
					console.log('Изображение загружено:', e.target.result);
					// Создаем новый элемент изображения для каждой картинки
					var imgElement = document.createElement('img');
					imgElement.className = 'uploaded-image';
					imgElement.src = e.target.result;
	
					// Добавляем элемент изображения к контейнеру
					$('.uploaded-carousel .slick-track').append(imgElement);
	
					// Обновляем слайдер
					initSlider();
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
				$('.success').fadeIn();
			}
		});
	}
	
	// Инициализация слайдера
	function initSlider() {
		$('.uploaded-carousel').slick({
			slidesToShow: 3, // Количество отображаемых слайдов одновременно
			slidesToScroll: 1, // Количество прокручиваемых слайдов
			infinite: true,
			autoplay: true, // Бесконечная прокрутка
			arrows: true, // Показывать стрелки навигации
			dots: false, // Показывать точки навигации
			variableWidth: true
		});
	}
	
});
