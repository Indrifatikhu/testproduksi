
// Function to shpw date picker
$(document).ready(function(){
    $('#from_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        multidateSeparator: true,
    });
});

$(document).ready(function(){
    $('#to_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });
});

// Function to delete using delete icon
$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        var row = $(this).closest('tr');
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete row ' + id + '?')) {
            row.remove();
            // Additional code to delete data from the server using AJAX
        }
    });
});

$(document).ready(function() {
    $('.edit-btn').on('click', function() {
        // Get the data-id attribute of the clicked button
        var id = $(this).data('id');
        // Set the title of the modal to include the ID
        openEditModal(id);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/getdata' + id, // Replace this with your actual endpoint
        method: 'POST',
        data: { id: id },
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            var formattedDate = response.tanggal + '/' + response.bulan + '/' + response.tahun;

            $('#editTanggal').val(response.formattedDate);
            $('#editBangsa').val(response.bangsa);
            $('#editName').val(response.nama);
            $('#editKodeBull').val(response.kode_bull);
            $('#editKodeBatch').val(response.kode_batch);
            $('#editProduksi').val(response.produksi);
            $('#editPtm').val(response.ptm);
            $('#editKonsentrasi').val(response.konsentrasi);
        }
    });
});

function openEditModal(id) {
    $('#editModal .modal-title').text('Edit User by ID: ' + id);
    $('#editModal').modal('show');
}

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function add(){
    $('#produksi-modal').modal('show')
}

// $('#produksiForm').submit(function(e) {
//     e.preventDefault();
//     var formData = new FormData(this);
//     $.ajax({
//         type: "POST",
//         url: "",
//         data: formData,
//         processData: false,
//         contentType: false,
//         success: function(response) {
//             console.log(response);
//         },
//         error: function(xhr) {
//             console.log(xhr.responseText);
//         }
//     });
// })
// $('#editForm').submit(function(e) {
//     e.preventDefault();
//     var formData 
// })
