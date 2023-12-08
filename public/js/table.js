$(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
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
            swal("Berhasil", response.success, "success");
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
            swal("Berhasil", response.success, "success");
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
            swal("Berhasil", response.success, "success");
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

    ///////////////////////// Atlet //////////////////////////////////
});
