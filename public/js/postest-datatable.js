(function(){
    
    $(window).on('load', function(){
        $('#cover').fadeOut(1000);    
        $('#forminline').hide();
    })

	$(function(){
	    $('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();

		var table = $('#postest-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: "api/product",
		columns: [
		{data: 'kd_barang', name: 'kd_barang'},
		{data: 'nama_roti', name: 'nama_roti'},
		{data: 'harga',
					render: function ( data, type, row ) {
				        return 'Rp'+ ' ' + data + ' ' + ',-';
				    }, 
					name: 'harga'},
		{data: 'action', name: 'action', orderable: false, searchable: false}
		],
		language: {
			"sProcessing":   "<i class='fas fa-spinner fa-spin fa-5x'></i>",
			"sLengthMenu":   "Tampilkan _MENU_ entri",
			"sZeroRecords":  "Tidak ditemukan data yang sesuai",
			"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
			"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
			"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",

			"sInfoPostFix":  "",
			"sSearch":       "Cari:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "Pertama",
				"sPrevious": '<i class="fas fa-angle-double-left fa-lg"></i>',
				"sNext":     '<i class="fas fa-angle-double-right fa-lg"></i>',
				"sLast":     "Terakhir"
			}
		},
		searchDelay: 500,
	});
		
		$('#laporan').on('click',function(event) {
			/* Act on the event */
			
			setTimeout(function(){
				$('#forminline').css({'z-index': '5', width: 350}).show('200');
			}, 400);

			$('#datadata #form1, #form2, #laporan').each(function(index) {
				setTimeout(function(){
					$('#datadata #form1, #form2, #laporan').eq(index).hide('100');
				}, 200 * index+1);
			});
			
			$('#datadata').css({
				left: '280',
				transition: 'all 0.3s ease-in',
			});
		});

		$('#tutuplaporan').on('click',function(event) {
			/* Act on the event */
			setTimeout(function(){
				$('#forminline').css({zIndex: '-10', width: 0}).hide('200');
			}, 400);

			$('#datadata #form1, #form2, #laporan').each(function(index) {
				setTimeout(function(){
					$('#datadata #form1, #form2, #laporan').eq(index).show('100');
				}, 200 * index+1);
			});
			
			$('#datadata').css({
				left: '295',
				transition: 'all 0.3s ease-out'
			});
		});

		$('#postest-table').on('click', '#getdata', function(event) {
			/* Act on the event */
			event.preventDefault();
			var id = $(this).attr('rel');	
			save_method = 'edit';
			$('input[name=_method]').val('PATCH');
			$('#modal-form').modal('show');
			$('#form-contact').show();
			$('#form-inputbarang').hide();
			$('.modal-dialog').attr('class', 'modal-dialog modal-sm');
			$('#formcontain1').attr('class', 'col-md-12');
			$('#tableinmodal').attr('class', '');
			$('#typeahead').hide();
			$('.form-control.tt-hint, #typeahead').css('display', 'none');
			$('#nama_roti').show();
			$('#modal-form form')[0].reset();
			$('#nama_roti').val('Roti ');
			$('#nm_rotilabel').text('Nama Roti');
			$('#hargalabel').text('Harga');
			$('.modal-title').text('Edit Produk');
			$('#tableinmodal').hide();
			$('#inputhitung').hide();
			$('#modalfooter').show();
			$.ajax({
				url: "product" + '/' + id + "/edit",
				method : "GET",
				dataType: "JSON",
				success: function(data) {
					$('#id').val(data[0]['id']);
					$('#nama_roti').val(data[0]['nama_roti']);
					$('#harga').val(data[0]['harga']);

				},
				error : function() {
					alert("Gagal Data");
				}
			});
		});

		$('#formcontain2').on('submit', '#forminputbarang', function(event) {
			/* Act on the event */
			event.preventDefault();
			if ( $('#jumbel').val() == '') {
				$('#error-block').html('Tolong Isi');
			}
			else
			{
				$.ajax({
	                url : "transaksidetail",
	                method : "POST",
	                data: new FormData($(this)[0]),
	                contentType: false,
	                processData: false,
	                success : function(data) {
						$('#the_table').load('loadcart');
						console.log(data.message);
					},
					error : function (data) {
						console.log('error');
					}
	            });
	        }
		});

		$('#bayar').click(function(event) {
			/* Act on the event */
			event.preventDefault();
			swal({
				title: 'Yakin tidak ingin belanja lagi?',
				type: 'warning',
				showCancelButton: true,
				cancelButtonColor: '#3085d6',
				confirmButtonColor: '#ddd',
				cancelButtonText: 'Belanja Lagi',
				confirmButtonText: 'Selesai Belanja',
				reverseButtons: true
			}).then(function () {
				$.ajax({
		                url : "transaksi",
		                method : "POST",
		                data: new FormData($('#forminputbarang')[0]),
		                contentType: false,
		                processData: false,
		                success : function(data) {
		                	$.ajax({
								beforeSend: function(xhrObj) {
					                xhrObj.setRequestHeader("Content-Type","application/json");
									xhrObj.setRequestHeader("Accept","application/json");
								},
								url: "transaksidetail",
								method : "GET",
								contentType: "application/json",
								success: function(data) {
									$('#id_transaksi').val(data);
									$('#kdotomatis').html(data);
								},
								error : function() {
									alert("Gagal Data");
								}
							});
							$('#the_table').load('loadcart');
						},
						error : function (data) {
							console.log('error');
						}
		            });
			});
		});

		$('#tableinmodal').on('click', '#hapushitungan', function(event) {
			/* Act on the event */
			event.preventDefault();
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			var id = $(this).attr('rel');	
			$.ajax({
					url : "transaksidetail/" + id,
					method : "POST",
					data : {'_method' : 'DELETE', '_token' : csrf_token},
					success : function(data) {
						$('#the_table').load('loadcart');
						console.log(data.message);
					},
					error : function (data) {
						console.log('error');
					}
				});
		});

		$('#postest-table').on('click', '#deletedata', function(event) {
			/* Act on the event */
			event.preventDefault();
			var id = $(this).attr('rel');	
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			swal({
				title: 'Ingin menghapus data?',
				type: 'warning',
				showCancelButton: true,
				cancelButtonColor: '#ddd',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Hapus'
			}).then(function () {
				$.ajax({
					url : "product/" + id,
					method : "POST",
					data : {'_method' : 'DELETE', '_token' : csrf_token},
					success : function(data) {
						table.ajax.reload();
						swal({
							title: 'Success!',
							text: data.message,
							type: 'success',
							timer: '1500'
						})
					},
					error : function (data) {
						swal({
							title: 'Oops...',
							text: data.message,
							type: 'error',
							timer: '1500'
						})
					}
				});
			});
		});

		$('#form1').click(function(e) {
			save_method = "add";
			$('input[name=_method]').val('POST');
			$('#modal-form').modal('show');
			$('#form-contact').show();
			$('#form-inputbarang').hide();
			$('.modal-dialog').attr('class', 'modal-dialog modal-sm');
			$('#formcontain1').attr('class', 'col-md-12');
			$('#tableinmodal').attr('class', '');
			$('#typeahead').hide();
			$('.form-control.tt-hint, #typeahead').css('display', 'none');
			$('#nama_roti').show();
			$('#modal-form form')[0].reset();
			$('#nama_roti').val('Roti ');
			$('#nm_rotilabel').text('Nama Roti');
			$('#hargalabel').text('Harga');
			$('.modal-title').text('Tambah Produk');
			$('#tableinmodal').hide();
			$('#modalfooter').show();
			$('#inputhitung').hide();
		});

		$('#form2').click(function(e) {
			$('input[name=_method]').val('POST');
			$('#modal-form').modal('show');
			$('#form-contact').hide();
			$('#form-inputbarang').show();
			$('#the_table').load('loadcart');		
			$('.modal-dialog').attr('class', 'modal-dialog modal-lg');
			$('#formcontain2').attr('class', 'col-md-3 col-sm-12');
			$('#tableinmodal').attr('class', 'col-md-9 table-responsive-sm').show();
			$('#nama_roti').hide();
			$('.form-control.tt-hint, #nama_roti').css('display', 'none');
			$('#typeahead').show();
			$('#modal-form form')[0].reset();
			$('#nm_rotilabel').text('Kode Produk');
			$('#hargalabel').text('Jumlah Pembelian');
			$('.modal-title').text('Hitung Produk');
			$('#modalfooter').hide();
			$('#inputhitung').show();
			$.ajax({
				beforeSend: function(xhrObj) {
	                xhrObj.setRequestHeader("Content-Type","application/json");
					xhrObj.setRequestHeader("Accept","application/json");
				},
				url: "transaksidetail",
				method : "GET",
				contentType: "application/json",
				success: function(data) {
					$('#id_transaksi').val(data);
					$('#kdotomatis').html(data);
				},
				error : function() {
					alert("Gagal Data");
				}
			});
		});		

		$('#form-contact').on('submit', function (e) {
			if (!e.isDefaultPrevented()){
				var id = $('#id').val();
	            if (save_method == 'add') url = "product"; 
	            else url = "product/" + id;
	            $.ajax({
	                url : url,
	                method : "POST",
	                data: new FormData($(this)[0]),
	                contentType: false,
	                processData: false,
	                success : function(data) {
	                    $('#modal-form').modal('hide');
	                    table.ajax.reload();
	                    swal({
	                        title: 'Success!',
	                        text: data.message,
	                        type: 'success',
	                        timer: '1500'
	                    })
	                },
	                error : function(data){
	                    swal({
	                        title: 'Oops...',
	                        text: data.message,
	                        type: 'error',
	                        timer: '1500'
	                    })
	                }
	            });
	            return false;
	        }

	    });

	 	var  kd_barang = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.whitespace('kd_barang'),
				queryTokenizer: Bloodhound.tokenizers.whitespace,
				remote: {
				        url: '/cariproduk/%kd_barang',
				        wildcard: '%kd_barang'
				    }
		});

		kd_barang.initialize();

		$("#typeahead").typeahead({
			hint: true,
			highlight: true,
			minLength: 3
		},
		{
			source: kd_barang.ttAdapter(),
			// This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
			name: 'kd_barang',
			// the key from the array we want to display (name,id,email,etc...)
			displayKey: 'kd_barang',
			templates: {
				empty: [
				    '<div class="empty-message"><span class="notfoundata">tidak dapat menemukan data</span></div>'
				].join('\n'),			
				suggestion: function (data) {
				    return '<div class="kdbarangpostest"><span class="typeaheadfonting">'+ data.kd_barang +'<span></div>'
				}
			}
		});

	});
	// end of document ready

})(); 
// end of IIFE