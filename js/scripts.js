$(function(){

	$('.fancybox').fancybox();

	function DataTableUsers() {
		$('#users-table').DataTable();
	}
	function DataTableToys() {
		$('#toys-table').DataTable();
	}

	function resizeBlock() {
		if( $(window).width() > 768 ){
			var h = $("#gallery").height();
			if( h < 600 ){
				$("#main").css("margin-bottom","130px");
			}else{
				$("#main").css("margin-bottom",h*0.92+"px");
			}
		}
	}

	function galleryJScrollPane() {
		$("#gallery .grid .item .img").each(function(index, el) {
			var h = $(this).children('img').height();
			if( h < 274 ){
				$(this).css("min-height",'240px');
			}else{
				$(this).css("min-height",'');
			}
		});

		$('#gallery .grid').jScrollPane({
			animateDuration: 150,
			autoReinitialise: true,
			animateScroll: false,
			horizontalGutter: 0,
			hideFocus: true,
			contentWidth: "0px",
			contentWidth: "0px",
		});

		$(".vote").on('click', function(event) {
			event.preventDefault();
			var _this = $(this);
			var formData = new FormData();
			var id = _this.attr('data');
			if( id == "openmodal" ){
				$(".rememeber").fadeIn(300).children().on('click', function(event) {
					event.preventDefault();
					$(this).parent().fadeOut(300);
				});
			}else{
				var vote = _this.siblings('.price').text();
				vote = parseInt(vote);
				formData.append('id', id);
				formData.append('vote', vote);
				$.ajax({
						url: "/services/vote.php",
						type: 'POST',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						success: function(r) {
							if( r != true ){
								swal({
									text: 'Error',
									type: 'error',
									confirmButtonColor: '#fb8f22',
								});
							}else{
								_this.siblings('.price').text((vote+100)+' puntos');
								swal({
									text: 'Gracias por votar',
									type: 'success',
									confirmButtonColor: '#fb8f22',
								});
							}
						}
				});
			}

		});
	}

	function readURL(input,el) {
    if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function (e) {
	      el.attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
    }
	}

	function getBase64Image(img) {
		var canvas = document.createElement("canvas");
		var scale = 1;
		if( $(window).width() < 768 ){
			scale = 1.25;
		}
		var w = img.naturalWidth / scale;
		var h = img.naturalHeight / scale;

		canvas.width = w;
		canvas.height = h;
		var ctx = canvas.getContext("2d");
		ctx.drawImage(img, 0, 0, w, h);
		var dataURL = canvas.toDataURL("image/jpeg", 0.98);
		dataURL = dataURL.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
		return dataURL;
	}

	$("#form .form form .field .file").on('change',function(event) {

		if( typeof this.files[0] != 'undefined' ){
			var f = this.files[0];
			readURL(this,$(this).siblings('img'));
			console.log(f);
		}
	});






	function formValidation($form) {

		$form.formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				nametoy: {
					validators: {
						notEmpty: {
							message: ' '
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
					}
				},
				nameCliente: {
					validators: {
						notEmpty: {
							message: ' '
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
					}
				},
				lastnameClient: {
					validators: {
						notEmpty: {
							message: ' '
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
					}
				},
				identification: {
					validators: {
						notEmpty: {
							message: ' '
						},
						numeric: {
							message: ' ',
							thousandsSeparator: '',
						}
					}
				},
				phone: {
					validators: {
						notEmpty: {
							message: ' '
						},
						numeric: {
							message: ' ',
							thousandsSeparator: '',
						}
					}
				},
				mail: {
					validators: {
						notEmpty: {
							message: ' '
						},
						regexp: {
							regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
							message: 'Error'
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
					}
				},
				country: {
					validators: {
						notEmpty: {
							message: ' '
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
					}
				},
				nametoy: {
					validators: {
						notEmpty: {
							message: ' '
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
					}
				},
				bill: {
					validators: {
						notEmpty: {
								message: ' '
						},
						file: {
								extension: 'jpeg,jpg,png',
								type: 'image/jpeg,image/png',
								maxSize: 2097152,   // 2048 * 1024
								message: 'The selected file is not valid'
						}
					}
				},
				toy: {
					validators: {
						notEmpty: {
								message: ' '
						},
						file: {
								extension: 'jpeg,jpg,png',
								type: 'image/jpeg,image/png',
								maxSize: 2097152,   // 2048 * 1024
								message: 'The selected file is not valid'
						}
					}
				},
				terms: {
					validators: {
						notEmpty: {
								message: ' '
						}
					}
				}
			}
		}).on('success.form.fv', function(e) {

			var $form    = $(e.target),
					formData = new FormData();

			$form.find('input.form-control').each(function(index, el) {
				var v = $(this).val();
				if( v != '' ){
					formData.append($(this).attr('name'), v);
				}
			});
			$form.find('input.file').each(function(index, el) {
				if( typeof this.files[0] != 'undefined' ){
					formData.append($(this).attr('name'), getBase64Image($(this).siblings('img')[0]));
				}
			});
			swal({
				title: 'Cargando..',
				showCancelButton: false,
				showConfirmButton: false,
				showCloseButton: false,
			});
			$.ajax({
			    url: "services/upload-form.php",
			    type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
			    success: function(r) {
						$.get( "includes/gallery.php", function( data ) {
							$( "#gallery" ).replaceWith( data );
							setTimeout(function () {
								galleryJScrollPane();
								resizeBlock();
							},1000);
						});
						$form.removeClass('load');
						swal({
						  title: 'Felicitaciones',
						  text: 'Tu juguete se ha publicado exitosamente!',
							type: 'success',
							confirmButtonColor: '#fb8f22',
						});
						$form.find('input.form-control').each(function(index, el) {
							$(this).val("");
						});
						$form.find('input.file').each(function(index, el) {
							$(this).val("");
							$(this).siblings('img').attr("src","");
						});
						$form.find(".btn-sb").prop('disabled', false).removeClass('disabled');
						$form.data('formValidation').destroy();
						formValidation($form);
			    }
			});
		});
	}

	formValidation($('#form .form'));
	DataTableUsers();
	DataTableToys();
	resizeBlock();

	$(window).on('load', function(event) {
		galleryJScrollPane();
		resizeBlock();
	});



	$("#header .links .nav #main-menu ul li").on('click', function(event) {
		event.preventDefault();
		var $el = $("html, body");
		if( $(this).attr('data') == 1 ){
			var top = 0;
			$el.stop().animate({scrollTop: top}, '600', 'swing');
		}else if( $(this).attr('data') == 2 ){
			var top = $("#steps").offset().top - 200;
			$el.stop().animate({scrollTop: top}, '600', 'swing');
		}else if( $(this).attr('data') == 3 ){
			var top = $("#form").offset().top - 200;
			$el.stop().animate({scrollTop: top}, '600', 'swing');
		}else if( $(this).attr('data') == 4 ){
			var top = $("#gallery").offset().top - 200;
			$el.stop().animate({scrollTop: top}, '600', 'swing');
		}
	});














































	function formValidation_Login($form) {
		console.log($form);

		$form.formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				user: {
					validators: {
						notEmpty: {
							message: ' '
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
						regexp: {
							regexp: /^[a-zA-Z0-9_\.]+$/,
							message: 'Error'
						}
					}
				},
				pwd: {
					validators: {
						notEmpty: {
							message: ' '
						},
						stringLength: {
							min: 3,
							max: 30,
							message: ' '
						},
						regexp: {
							regexp: /^[a-zA-Z0-9_\.]+$/,
							message: 'Error'
						}
					}
				},

			}
		}).on('success.form.fv', function(e) {
			e.preventDefault();

			var $form    = $(e.target),
					formData = new FormData();

			$form.find('input.form-control').each(function(index, el) {
				var v = $(this).val();
				if( v != '' ){
					formData.append($(this).attr('name'), v);
				}
			});
			$.ajax({
					url: "/services/loginuserProcess.php",
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					success: function(r) {
						console.log(r);
						$form.find(".btn").prop('disabled', false).removeClass('disabled');
						$form.data('formValidation').destroy();
						formValidation_Login($form);
						window.location.href = "/";
						// swal({
						// 	title: 'Felicitaciones',
						// 	text: 'Se ha guardado tu informacion correctamente',
						// 	type: 'success',
						// 	confirmButtonColor: '#fb8f22',
						// });
					}
			});
		});
	}
	formValidation_Login($('.login.loginuser .formlogin form'));











	function AdminEnableDisable() {

		$(".tables .btn").on('click', function(event) {
			event.preventDefault();
			var _this = $(this);
			var id = $(this).attr('data');
			var state = $(this).parents('tr').first().attr('data');
			var formData = new FormData();
			var text = "";
			var text2 = "";

			if( state == 0 ){
				state = 1;
				text = "Activo";
				text2 = "Inhabilitar";
			}else if( state == 1 ){
				state = 0;
				text = "Inactivo";
				text2 = "Habilitar";
			}

			formData.append('id', id);
			formData.append('state', state);

			$.ajax({
					url: "/services/disabledEnable.php",
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					success: function(r) {
						console.log(r);
						if( r == 'true' ){
							_this.parents('tr').first().attr('data',state).find('.state').text(text);
							_this.text(text2);
							_this.attr("value",text2);
							swal({
								title: 'Felicitaciones',
								text: 'Se ha guardado tu informacion correctamente',
								type: 'success',
								confirmButtonColor: '#fb8f22',
							});
						}else{
							swal({
								title: 'Error',
								text: 'No se pudo guardar tu informacion. Intente mas tarde.',
								type: 'error',
								confirmButtonColor: '#fb8f22',
							});
						}

					}
			});
		});

	}

	AdminEnableDisable();

});
