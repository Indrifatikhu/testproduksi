import './bootstrap';


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