<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="{{ csrf_token() }}" name="csrf-token">
    <title>Produksi Data | {{ $tittle }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
        .icon-button {
            border: none;
            background: none;
            padding: 0;
            cursor: pointer;
            position: center;
        }

        .icon-button i {
            font-size: 24px; /* Adjust the icon size as needed */
            color: #333;     /* Adjust the icon color as needed */
        }

    </style>
</head>
<body>
    
    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>


    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // Function to do datepicker
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

        // Function to show modal of add production data manually
        function add(){
            $('#produksi-modal').modal('show')
        }

        // Function to delete row
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete row ' + id + '?')) {
                    row.remove();
                    // Additional code to delete data from the server using AJAX
                    $.ajax({
                        url: '/upload/' + id, // Replace this with your actual endpoint
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Handle success response from the server
                            console.log('Item deleted successfully');
                        },
                        error: function(xhr, status, error) {
                            // Handle error response from the server
                            console.error('Error deleting item:', error);
                        }
                    });
                }
            });
        });


        // $(document).ready(function() {
        //     $('.delete-btn').on('click', function() {
        //         var id = $(this).data('id');
        //         if (confirm('Are you sure you want to delete this item?')) {
        //             deleteItem(id);
        //         }
        //     });

        //     function deleteItem(id) {
        //         $.ajax({
        //             url: '/upload/' + id, // Replace this with your actual endpoint
        //             method: 'DELETE',
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(response) {
        //                 // Handle success, such as removing the item from the UI
        //                 console.log('Item deleted successfully');
        //             },
        //             error: function(xhr, status, error) {
        //                 // Handle errors
        //                 console.error('Error deleting item:', error);
        //             }
        //         });
        //     }
        // });




        // function to show edit modal
        function openEditModal(id) {
            $('#editModal .modal-title').text('Edit User by ID: ' + id);
            $('#editModal').modal('show');
        }

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
                url: '/upload/' + id, // Replace this with your actual endpoint
                method: 'GET',
                dataType: "JSON",
                data: { id: id, created_at: created_at, bangsa: bangsa, nama_bull: nama_bull, 
                    kode_bull: KodeBull, kode_batch: kode_batch, produksi: produksi, 
                    ptm: ptm, konsentrasi: konsentrasi },
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#created_at').val(response.created_at);
                    $('#bangsa').val(response.bangsa);
                    $('#nama_bull').val(response.nama_bull);
                    $('#kode_bull').val(response.kode_bull);
                    $('#kode_batch').val(response.kode_batch);
                    $('#produksi').val(response.produksi);
                    $('#ptm').val(response.ptm);
                    $('#konsentrasi').val(response.konsentrasi);
                }
            });
        });
        
        
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        

        // Function to do select all checkbox 
        document.addEventListener('DOMContentLoaded', function() {
            var selectAllColumnsCheckbox = document.getElementById('selectAllColumnsCheckbox');
            var columnCheckboxes = document.querySelectorAll('.columnCheckboxes');

            // Event listener for select all columns checkbox
            selectAllColumnsCheckbox.addEventListener('change', function() {
                columnCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllColumnsCheckbox.checked;
                });
            });

            // Event listener for column checkboxes
            columnCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    selectAllColumnsCheckbox.checked = [...columnCheckboxes].every(function(checkbox) {
                        return checkbox.checked;
                    });
                });
            });
        });

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

    </script>
</body>
</html>