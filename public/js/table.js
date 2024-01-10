$(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#selectNomor').select2({
      theme: "bootstrap-5",
      placeholder: $( this ).data( 'placeholder' ),
    }).val("").trigger('change');

    $('#selectCabang').on('change', function () {
      $.get(routeGetNomorByCabor,{
          selectCabang: $('#selectCabang').val()
      })
      .done(function (response) {
          var opt = '<option value="" selected disabled>.: Pilih :.</option>'
          response.nomor.forEach(element => {
            opt += '<option value="'+element.id+'">'+element.name+'</option>'
          });
          $('#selectNomor').html(opt)
      })
    });

    $('#selectAtlet').select2({
      theme: "bootstrap-5",
      placeholder: $( this ).data( 'placeholder' ),
      closeOnSelect: false,
    });
    $('#selectNomor').on('change', function () {
      $.get(routeGetAtletByNomor,{
        selectNomor: $('#selectNomor').val()
      })
      .done(function (response) {
          var opt = ''
          response.atlet.forEach(element => {
            opt += '<option value="'+element.id+'">'+element.name+'</option>'
          });
          $('#selectAtlet').html(opt)
      })
    });

    $('#selectAtlet2').select2({
      theme: "bootstrap-5",
      placeholder: $( this ).data( 'placeholder' ),
    });
    $('#selectNomor').on('change', function () {
      $.get(routeGetAtletByNomor,{
        selectNomor: $('#selectNomor').val()
      })
      .done(function (response) {
          var opt = '<option value="" selected disabled>.: Pilih :.</option>'
          response.atlet.forEach(element => {
            opt += '<option value="'+element.id+'">'+element.name+'</option>'
          });
          $('#selectAtlet2').html(opt)
      })
    });

  ///////////////////////// cabor //////////////////////////////////
  // $('#create').click(function () {
  //   $.get('http://127.0.0.1:8000/cabor/create').done(function (res) {
  //     $('#modalArea').html(res);
  //   })
  // })

    $('#btnCabor').html('Submit');
    // var form = $('#createCabor');
    $('#btnCabor').click(function() {
      $('.error-messages').html('');
      var formData = new FormData($('#createCabor')[0]);
      
      $.ajax({
        url: routeCreateCabor,
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,

        success: function(response) {
          if(response) {
            $('#example').DataTable().draw();
            swal("Berhasil", response.success, "success")
            .then(function() {
              window.location = routeIndexCabor;
            })
          }
        },
        error: function(error) {
          if(error) {
            console.log(error.responseJSON.errors.nameCabor[0])
            $('#nameError').html(error.responseJSON.errors.nameCabor[0]);
          }
        }
      });
    });

    $('body').on('click', '.editButtonCabor', function () {
      var id = $(this).attr('data-id');
      var url = routeEditCabor.replace(':id', id);

      window.location = url;
    });

    $('body').on('click', '.delButtonCabor', function () {  
      var id = $(this).attr('data-id');
      var url = routeDeleteCabor.replace(':id',id);
      $.ajax({
        url: url,
        method: 'get',
        success: function (response) {
          $('#example').DataTable().draw();
          swal("Berhasil", response.success, "success");
        },
        error: function (error) {
          console.error(error);
        }
      });

    });

    $('#example').DataTable({
      // disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": [1] }
      ],
    processing: true,
      serverSide: true,
      ajax: routeIndexCabor,
        columns: [
            {
                data: 'name', name: 'name'
            },
            {
                data: 'aksi', name: 'aksi'
            },
        ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-select" >'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableCaborHome').DataTable({
    processing: true,
      serverSide: true,
      ajax: routeIndexCaborHome,
        columns: [
            {
                data: 'name', name: 'name'
            },
        ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-select" >'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });


    ///////////////////////// Nomor //////////////////////////////////
    $('#btnNomor').html('Submit');

    $('#btnNomor').click(function() {
      $('.error-messages').html('');
      var formData = new FormData($('#createNomor')[0]);
      
      $.ajax({
        url: routeCreateNomor,
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,

        success: function(response) {
          if(response) {
            swal("Berhasil", response.success, "success")
            .then(function() {
              window.location = routeIndexNomor;
            })
          }
        },
        error: function(error) {
          if(error) {
            console.log(error.responseJSON.errors.nameNomor[0] || error.responseJSON.errors.selectCabang[0])
            $('#nameErrorNomor').html(error.responseJSON.errors.nameNomor[0]);
            $('#cabangErrorNomor').html(error.responseJSON.errors.selectCabang[0]);
          }
        }
      });
    });

    $('body').on('click', '.editButtonNomor', function(){
      var id = $(this).attr('data-id');
      var url = routeEditNomor.replace(':id',id);
      console.log(id)

      window.location = url;

    });

    $('body').on('click', '.delButtonNomor', function () { 
      var id = $(this).attr('data-id');
      var url = routeDeleteNomor.replace(':id',id);
      console.log('ppp');
      $.ajax({
        url: url,
        method: 'get',
        success: function (response) {
          $('#tableNomor').DataTable().draw();
          swal("Berhasil", response.success, "success");
        },
        error: function(error) {
          console.error(error);
        }
      });

    });

    $('#tableNomor').DataTable({
      "columnDefs": [
        {"orderable":false, "targets":[2]}
      ],
      processing:true,
      serverSide:true,
      ajax:routeIndexNomor,
        columns: [
          {
            data: 'name', name: 'name'
          },
          { 
            data: 'cabor', name: 'cabor'
          },
          {
            data: 'aksi', name: 'aksi'
          },
        ],
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
          //customize pagination prev and next buttons: use arrows instead of words
          'paginate': {
            'previous': '<span class="fa fa-chevron-left"></span>',
            'next': '<span class="fa fa-chevron-right"></span>'
          },
          //customize number of elements to be displayed
          "lengthMenu": 'Display <select class="form-select" >'+
          '<option value="10">10</option>'+
          '<option value="20">20</option>'+
          '<option value="30">30</option>'+
          '<option value="40">40</option>'+
          '<option value="50">50</option>'+
          '<option value="-1">All</option>'+
          '</select> results'
        }
    });

    ///////////////////////// Kontingen //////////////////////////////////
    $('#btnKontingen').html('Submit');

    $('#btnKontingen').click(function () {
      $('.error-messages').html('');
      var formData = new FormData($('#createKontingen')[0]);

      $.ajax({
        url: routeCreateKontingen,
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,

        success: function(response) {
          if(response) {
            $('#tableKontingen').DataTable().draw();
            swal("Berhasil", response.success, "success")
            .then(function() {
              window.location = routeIndexKontingen;
            })
          }
        },
        error: function (error) {
          if (error) {
            console.log(error.responseJSON.errors.nameKontingen[0])
            $('#kontingenError').html(error.responseJSON.errors.nameKontingen[0])
          }
        }
      });
    });

    $('body').on('click', '.editButtonKontingen', function () {
      var id = $(this).attr('data-id');
      var url = routeEditKontingen.replace(':id',id);

      window.location = url;
    });

    $('body').on('click', '.delButtonKontingen', function () {
      var id = $(this).attr('data-id');
      var url = routeDeleteKontingen.replace(':id', id);
      $.ajax({
        url: url,
        method: 'get',
        success: function (response) {
          $('#tableKontingen').DataTable().draw();
          swal("Berhasil", response.success, "success");
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    
    $('#tableKontingen').DataTable({
      "columnDefs": [
        {"orderable": false, "targets": [1]}
      ],
      processing: true,
      serverSide: true,
      ajax: routeIndexKontingen,
      columns: [
        {
          data: 'name', name: 'name'
        },
        {
          data: 'aksi', name: 'aksi'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        "lengthMenu": 'Display <select class="form-select" >'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableKontingenHome').DataTable({
      processing: true,
      serverSide: true,
      ajax: routeIndexKontingenHome,
      pageLength : 5,
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
      columns: [
        {
          data: 'name', name: 'name'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        "lengthMenu": 'Display <select class="form-select" >'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    ///////////////////////// Atlet Kontingen Cabor //////////////////////////////////
    // $('#btnAtletKonCa').html('Submit');

    // $('#btnAtletKonCa').click(function() {
    //   $('.error-messages').html('');
    //   var formData = new FormData($('#createAtletKonCa')[0]);
      
    //   $.ajax({
    //     url: routeCreateAtletKontingenCabor,
    //     method: 'POST',
    //     processData: false,
    //     contentType: false,
    //     data: formData,

    //     success: function(response) {
    //       if(response) {
    //         swal("Berhasil", response.success, "success");
    //       }
    //     },
    //     error: function(error) {
    //       if(error) {
    //         console.log(error.responseJSON.errors.nameAtletKonCa[0] || error.responseJSON.errors.selectKontingen[0] || error.responseJSON.errors.selectCabang[0])
    //         $('#nameErrorAtletKonCa').html(error.responseJSON.errors.nameAtletKonCa[0]);
    //         $('#kontingenErrorKonCa').html(error.responseJSON.errors.selectKontingen[0]);
    //         $('#cabangErrorKonCa').html(error.responseJSON.errors.selectCabang[0]);
    //       }
    //     }
    //   });
    // });

    // $('body').on('click', '.editButtonAtletKonCa', function(){
    //   var id = $(this).attr('data-id');
    //   var url = routeEditAtletKontingenCabor.replace(':id',id);
    //   console.log(id)

    //   window.location = url;

    // });

    // $('body').on('click', '.delButtonAtletKonCa', function () { 
    //   var id = $(this).attr('data-id');
    //   var url = routeDeleteAtletKontingenCabor.replace(':id',id);
    //   console.log('ppp');
    //   $.ajax({
    //     url: url,
    //     method: 'get',
    //     success: function (response) {
    //       $('#tableAtletKontingenNomor').DataTable().draw();
    //       swal("Berhasil", response.success, "success");
    //     },
    //     error: function(error) {
    //       console.error(error);
    //     }
    //   });

    // });

    // $('#tableAtletKontingenNomor').DataTable({
    //   "columnDefs": [
    //     {"orderable": false, "targets": [3]}
    //   ],
    //   processing: true,
    //   serverSide: true,
    //   ajax: routeIndexAtletKontingenCabor,
    //   columns: [
    //     {
    //       data: 'name', name: 'name'
    //     },
    //     {
    //       data: 'kontingen', name: 'kontingen'
    //     },
    //     {
    //       data: 'cabor', name: 'cabor'
    //     },
    //     {
    //       data: 'aksi', name: 'aksi'
    //     },
    //   ],
    //   language: {
      url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
    //     'paginate': {
    //       'previous': '<span class="fa fa-chevron-left"></span>',
    //       'next': '<span class="fa fa-chevron-right"></span>'
    //     },
    //     "lengthMenu": 'Display <select class="form-select" >'+
    //     '<option value="10">10</option>'+
    //     '<option value="20">20</option>'+
    //     '<option value="30">30</option>'+
    //     '<option value="40">40</option>'+
    //     '<option value="50">50</option>'+
    //     '<option value="-1">All</option>'+
    //     '</select> results'
    //   }
    // });

    ///////////////////////// Atlet Kontingen Cabor Nomor //////////////////////////////////
    $('#btnAtletKonCaNo').html('Submit');

    $('#btnAtletKonCaNo').click(function(){
      $('.error-messages').html('');
      var formData = new FormData($('#createAtletKonCaNo')[0]);

      $.ajax({
        url: routeCreateAtletKontingenCaborNomor,
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,

        success: function(response) {
          if(response){
            swal("Berhasil", response.success, "success")
            .then(function() {
              window.location = routeIndexAtletKontingenCaborNomor;
            })
          }
        },
        error: function (error) {
          if(error){
            console.log(error.responseJSON.errors.nameAtletKonCaNo[0] || error.responseJSON.errors.selectKontingen[0] || error.responseJSON.errors.selectCabang[0] || error.responseJSON.errors.selectNomor[0])
            $('#nameErrorAtletKonCaNo').html(error.responseJSON.errors.nameAtletKonCaNo[0]);
            $('#kontingenErrorKonCaNo').html(error.responseJSON.errors.selectKontingen[0]);
            $('#cabangErrorKonCaNo').html(error.responseJSON.errors.selectCabang[0]);
            $('#nomorErrorKonCaNo').html(error.responseJSON.errors.selectNomor[0]);
          }
        }
      });
    });

    $('body').on('click', '.editButtonAtletKonCaNo', function () {
      var id = $(this).attr('data-id');
      var url = routeEditAtletKontingenCaborNomor.replace(':id',id);

      window.location = url;
    })

    $('body').on('click', '.delButtonAtletKonCaNo', function () { 
      var id = $(this).attr('data-id');
      var url = routeDeleteAtletKontingenCaborNomor.replace(':id',id);
      console.log('ppp');
      $.ajax({
        url: url,
        method: 'get',
        success: function (response) {
          $('#tableAtletKontingenCaborNomor').DataTable().draw();
          swal("Berhasil", response.success, "success");
        },
        error: function(error) {
          console.error(error);
        }
      });

    });
    
    $('#tableAtletKontingenCaborNomor').DataTable({
      "columnDefs": [
        {"orderable": false, "targets": [4]}
      ],
      processing: true,
      serverSide: true,
      ajax: routeIndexAtletKontingenCaborNomor,
      columns: [
        {
          data: 'name', name: 'name'
        },
        {
          data: 'kontingen', name: 'kontingen'
        },
        {
          data: 'cabor', name: 'cabor'
        },
        {
          data: 'nomor', name: 'nomor'
        },
        {
          data: 'aksi', name: 'aksi'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    ///////////////////////// Jadwal //////////////////////////////////
    $('#btnJadwal').click(function () {
      var formData = new FormData($('#createJadwal')[0]);

      $.ajax({
        url: routeStoreJadwal,
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,

        success: function(response) {
          console.log(response);
          if(response){
            swal("Berhasil", response.success, "success")
            .then(function() {
              window.location = routeIndexJadwal;
            })
          }
        },
        error: function (error) {
          if(error){
            console.log(
              error.responseJSON.errors.tanggal[0] || 
              error.responseJSON.errors.waktu[0] || 
              error.responseJSON.errors.selectCabang[0] || 
              error.responseJSON.errors.selectNomor[0] ||
              error.responseJSON.errors.selectAtlet[0] ||
              error.responseJSON.errors.selectBabak[0] ||
              error.responseJSON.errors.tempat[0]
            )
            $('#tanggalErrorJadwal').html(error.responseJSON.errors.tanggal[0]);
            $('#waktuErrorJadwal').html(error.responseJSON.errors.waktu[0]);
            $('#cabangErrorJadwal').html(error.responseJSON.errors.selectCabang[0]);
            $('#nomorErrorJadwal').html(error.responseJSON.errors.selectNomor[0]);
            $('#atletErrorJadwal').html(error.responseJSON.errors.selectAtlet[0]);
            $('#babakErrorJadwal').html(error.responseJSON.errors.selectBabak[0]);
            $('#tempatErrorJadwal').html(error.responseJSON.errors.tempat[0]);
          }
        }
      });
    });

    $('body').on('click', '.delButtonJadwal', function () { 
      var id = $(this).attr('data-id');
      var url = routeDeleteJadwal.replace(':id',id);
      console.log('ppp');
      $.ajax({
        url: url,
        method: 'get',
        success: function (response) {
          $('#tableJadwal').DataTable().draw();
          swal("Berhasil", response.success, "success");
        },
        error: function(error) {
          console.error(error);
        }
      });
    });

    $('#tableJadwal').DataTable({
      "columnDefs": [
        {"orderable": false, "targets": [6]}
      ],
      processing: true,
      serverSide: true,
      ajax: routeIndexJadwal,
      columns: [
        {
          data: 'tanggal', name: 'tanggal'
        },
        {
          data: 'cabor', name: 'cabor'
        },
        {
          data: 'nomor', name: 'nomor'
        },
        {
          data: 'atlet', name: 'atlet'
        },
        {
          data: 'babak', name: 'babak'
        },
        {
          data: 'tempat', name: 'tempat'
        },
        {
          data: 'aksi', name: 'aksi'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableJadwalHome').DataTable({
      processing: true,
      serverSide: true,
      ajax: routeIndexJadwalHome,
      pageLength : 5,
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
      columns: [
        {
          data: 'tanggal', name: 'tanggal'
        },
        {
          data: 'cabor', name: 'cabor'
        },
        {
          data: 'nomor', name: 'nomor'
        },
        {
          data: 'babak', name: 'babak'
        },
        {
          data: 'tempat', name: 'tempat'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableJadwalHome2').DataTable({
      processing: true,
      serverSide: true,
      ajax: routeIndexJadwalHome,
      columns: [
        {
          data: 'tanggal', name: 'tanggal'
        },
        {
          data: 'kontingen', name: 'kontingen'
        },
        {
          data: 'cabor', name: 'cabor'
        },
        {
          data: 'nomor', name: 'nomor'
        },
        {
          data: 'atlet', name: 'atlet'
        },
        {
          data: 'babak', name: 'babak'
        },
        {
          data: 'tempat', name: 'tempat'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableTempat').DataTable({
      processing: true,
      serverSide: true,
      ajax: routeIndexJadwalHome,
      columns: [
        {
          data: 'tempat', name: 'tempat'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    ///////////////////////// Hasil //////////////////////////////////
    $('#btnHasil').click(function(){
      $('.error-messages').html('');
      var formData = new FormData($('#createHasil')[0]);

      $.ajax({
        url: routeStoreHasil,
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,

        success: function(response) {
          if(response){
            swal("Berhasil", response.success, "success")
            .then(function() {
              window.location = routeIndexHasil;
            })
          }
        },
        error: function (error) {
          if(error){
            console.log(
              error.responseJSON.errors.selectKontingen[0] || 
              error.responseJSON.errors.selectCabang[0] || 
              error.responseJSON.errors.selectNomor[0] ||
              error.responseJSON.errors.selectAtlet2[0] ||
              error.responseJSON.errors.selectBabak[0] ||
              error.responseJSON.errors.selectMedali[0]
            )
            $('#kontingenErrorHasil').html(error.responseJSON.errors.selectKontingen[0]);
            $('#cabangErrorHasil').html(error.responseJSON.errors.selectCabang[0]);
            $('#nomorErrorHasil').html(error.responseJSON.errors.selectNomor[0]);
            $('#atletErrorHasil').html(error.responseJSON.errors.selectAtlet2[0]);
            $('#babakErrorHasil').html(error.responseJSON.errors.selectBabak[0]);
            $('#medaliErrorHasil').html(error.responseJSON.errors.selectMedali[0]);
          }
        }
      });
    });

    $('body').on('click', '.editButtonHasil', function () {
      var id = $(this).attr('data-id');
      var url = routeEditHasil.replace(':id',id);

      window.location = url;
    });

    $('body').on('click', '.delButtonHasil', function () { 
      var id = $(this).attr('data-id');
      var url = routeDeleteHasil.replace(':id',id);
      console.log('ppp');
      $.ajax({
        url: url,
        method: 'get',
        success: function (response) {
          $('#tableHasil').DataTable().draw();
          swal("Berhasil", response.success, "success");
        },
        error: function(error) {
          console.error(error);
        }
      });
    });

    $('#tableHasil').DataTable({
      "columnDefs": [
        {"orderable": false, "targets": [6]}
      ],
      processing: true,
      serverSide: true,
      ajax: routeIndexHasil,
      columns: [
        {
          data: 'kontingen', name: 'kontingen'
        },
        {
          data: 'cabor', name: 'cabor'
        },
        {
          data: 'nomor', name: 'nomor'
        },
        {
          data: 'atlet', name: 'atlet'
        },
        {
          data: 'babak', name: 'babak'
        },
        {
          data: 'medali', name: 'medali'
        },
        {
          data: 'aksi', name: 'aksi'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableHasilHome').DataTable({
      processing: true,
      serverSide: true,
      ajax: routeIndexHasilHome,
      pageLength : 5,
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
      columns: [
        {
          data: 'kontingen', name: 'kontingen'
        },
        {
          data: 'cabor', name: 'cabor'
        },
        {
          data: 'nomor', name: 'nomor'
        },
        {
          data: 'atlet', name: 'atlet'
        },
        {
          data: 'medali', name: 'medali'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableHasilHome2').DataTable({
      processing: true,
      serverSide: true,
      ajax: routeIndexHasilHome,
      columns: [
        {
          data: 'kontingen', name: 'kontingen'
        },
        {
          data: 'cabor', name: 'cabor'
        },
        {
          data: 'nomor', name: 'nomor'
        },
        {
          data: 'atlet', name: 'atlet'
        },
        {
          data: 'babak', name: 'babak'
        },
        {
          data: 'medali', name: 'medali'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });

    $('#tableMedaliHome').DataTable({
      processing: true,
      serverSide: true,
      ajax: routeIndexMedaliHome,
      pageLength : 5,
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
      columns: [
        {
          data: 'name', name: 'name'
        },
        {
          data: 'emas', name: 'emas'
        },
        {
          data: 'perak', name: 'perak'
        },
        {
          data: 'perunggu', name: 'perunggu'
        },
        {
          data: 'total', name: 'total'
        },
      ],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>',
        },
        "lenghtMenu": 'Display <select class="form-select">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });
    
    ///////////////////////// Atlet Kontingen Cabor Nomor //////////////////////////////////
    ///////////////////////// Atlet Kontingen Cabor Nomor //////////////////////////////////
    ///////////////////////// Atlet Kontingen Cabor Nomor //////////////////////////////////
    ///////////////////////// Atlet Kontingen Cabor Nomor //////////////////////////////////
    ///////////////////////// Atlet Kontingen Cabor Nomor //////////////////////////////////
});
