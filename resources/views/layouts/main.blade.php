{{-- Main Blade for Dashboard and Others Page --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="{{ csrf_token() }}" name="csrf-token">
    <title>Sistem Produksi | {{ $tittle }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400;1,600&display=swap');

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }
        
        a {
            text-decoration: none;
        }

        ul, li {
            padding: 5px 10px;
            list-style: none;
        }

        body {
            display: flex;
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
        }

        .container {
            min-height: 100vh;
            width: 100%;
            overflow-x: hidden;
            transition: all 0.35s ease-in-out;
            background-color: #fafbfe;
        }

        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
            width: 100%;
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        #sidebar {
            width: 60px;
            min-width: 60px;
            height: 100%;
            z-index: 1;
            position: fixed;
            transition: all .25s ease-in-out;
            display: flex;
            flex-direction: column;
            background-color: #0e223e;
        }

        #sidebar.expand {
            width: 250px;
            min-width: 250px;
            transition: all .15s ease-in-out;
        }

        #toggle-btn {
            background-color: transparent;
            cursor: pointer;
            border: 0;
            padding: 1rem 1.5rem;
            color: #fff

        }

        #toggle-btn i {
            font-size: 1rem;
        }

        .sidebar-logo {
            margin: auto 0;
        }

        .sidebar-logo a {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 600;
        }

        #sidebar:not(.expand) .sidebar-logo,
        #sidebar:not(.expand) a.sidebar-link span {
            display: none;
        }

        .sidebar-nav {
            padding: 2rem 0;
            flex: auto;
        }

        a.sidebar-link {
            padding:  .625rem 1.625rem;
            padding-left: 0;
            color: #dfbdbd;
            display:flex;
            font-size: 0.9rem;
            white-space: nowrap;
            border-left: 3px solid transparent;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            margin-right: .75rem;
        }

        a.sidebar-link:hover {
            background-color: rgba(255, 255, 255, .075);
            border-left: 3px solid #3b7ddd;
        }

        .sidebar-item {
            position: relative;
        }

        #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
            position: absolute;
            top: 0;
            left: 50px;
            background-color: #0e2238;
            padding: 0;
            min-width: 15rem;
            display: none;
        }

        #sidebar:not(.expand) .sidebar-item:hover .sidebar-dropdown {
            display: block;
            max-height: 15rem;
            width: 100%;
            opacity: 1;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position:initial;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

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

        /* Custom pagination styles */
        .pagination {
            margin: 3px;
            padding: 3px;
            list-style-type: none;
            text-align: center;
        }

        .pagination li {
            display: inline;
            margin: 0;
        }

        .pagination li a,
        .pagination li span {
            padding: 4px;
            border: 1px solid #ccc;
            color: #333;
            text-decoration: none;
        }

        .pagination li.active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination li.disabled span {
            color: #999;
            cursor: not-allowed;
        }

        .pagination li a:hover {
            background-color: #f2f2f2;
        }


    </style>

</head>



<body>
    
    @include('partials.sidebar')

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

        const hamburger = document.querySelector("#toggle-btn");

        hamburger.addEventListener('click', function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });

        // Function to do datepicker
        $(document).ready(function(){
            $('#from_date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                multidateSeparator: true,
            });
        });

        $(document).ready(function(){
            $('#to_date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });

        // Function to show modal of add production data manually
        function add(){
            $('#produksi-modal').modal('show')
        }


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
        

        function calculateSumByMonth() {
            var table = document.getElementById("myTable");
            var rows = table.getElementsByTagName("tr");
            var sumByMonth = {};

            // Loop through each row (starting from index 1 to skip the header row)
            for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var cells = row.getElementsByTagName("td");
            var date = cells[2].textContent; // Assuming the date is the first column
            var month = date.split("-")[1]; // Extracting the month from the date
            var produksi = parseInt(cells[6].textContent); // Assuming produksi is the fifth column

            // If the month is not yet in the sumByMonth object, initialize it to 0
            if (!sumByMonth[month]) {
                sumByMonth[month] = 0;
            }

            // Add produksi to the sum for the corresponding month
            sumByMonth[month] += produksi;
            }

            // Populate the summary table
            var summaryTableBody = document.getElementById("summaryBody");
            for (var month in sumByMonth) {
                var row = summaryTableBody.insertRow();
                var monthCell = row.insertCell(0);
                var sumCell = row.insertCell(1);
                monthCell.textContent = month;
                sumCell.textContent = sumByMonth[month];
            }
        }

        // Call the function when the page loads
        window.onload = calculateSumByMonth;

        

    </script>
</body>
</html>