
// Function to show date picker
// $(document).ready(function(){
//     $('#from_date').datepicker({
//         format: 'dd-mm-yyyy',
//         autoclose: true,
//         todayHighlight: true,
//         multidateSeparator: true,
//     });
// });

// $(document).ready(function(){
//     $('#to_date').datepicker({
//         format: 'dd-mm-yyyy',
//         autoclose: true,
//         todayHighlight: true
//     });
// });

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

function sisaProduksi() {
    var jml_produksi = document.getElementById("myTable");
    console.log(jml_produksi);
    var rows_produksi = table.getElementsByTagName("tr");
    console.log(rows_produksi);
    var sumProduksi = {};
    console.log(sumProduksi);
}

// Fetch Data Produksi dari Tabel Produksi
document.addEventListener('DOMContentLoaded', (event) => {
    fetch('/dashboard')
        .then(response => response.json())
        .then(data => {
            const produksiBody = document.getElementById('produksiBody');
            data.forEach((produksi, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>C</td>
                    <td>${index + 1}</td>
                    <td>${produksi.tanggal}</td>
                    <td>${produksi.bangsa}</td>
                    <td>${produksi.kode_bull}</td>
                    <td>${produksi.kode_batch}</td>
                    <td>${produksi.produksi}</td>
                    <td>${produksi.ptm}</td>
                    <td>${produksi.konsentrasi}</td>
                    <td>S</td>
                    `;
                    produksiBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
});

// Fetch Data Produksi dari Tabel Target
document.addEventListener('DOMContentLoaded', (event) => {
    fetch('/target')
        .then(response => response.json())
        .then(data => {
            const targetBody = document.getElementById('targetBody');
            data.forEach((target, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${target.bulan}</td>
                    <td>${target.target_bulanan}</td>
                    <td>R</td>
                    <td>${target.tahun}</td>
                    <td>${target.target_tahunan}</td>
                    <td>R</td>
                    <td>%</td>
                    `;
                    targetBody.appendChild(row);
                });
            })
        .catch(error => console.error('Error fetching data:', error));
});


document.addEventListener('DOMContentLoaded', (event) => {
    // Perform subtraction
    const updatedProduksiData = produksiData.map((produksi) => {
        const cartItem = cartData.find(cart => cart.produksi_id === produksi.id);
        if (cartItem) {
            produksi.produksi -= cartItem.jml_distribusi;
        }
        return produksi;
    });

    // Update produksiTable with new values
    produksiBody.innerHTML = '';
    updatedProduksiData.forEach((produksi) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${produksi.id}</td>
            <td>${produksi.produksi}</td>
        `;
        produksiBody.appendChild(row);
    });

    console.log('Updated Produksi Data:', updatedProduksiData);
});

// ${((target.monthly_realization / target.monthly_target) * 100).toFixed(2)}%


// Function to do select all checkbox 
// document.addEventListener('DOMContentLoaded', function() {
//     var selectAllColumnsCheckbox = document.getElementById('selectAllColumnsCheckbox');
//     var columnCheckboxes = document.querySelectorAll('.columnCheckboxes');

//     // Event listener for select all columns checkbox
//     selectAllColumnsCheckbox.addEventListener('change', function() {
//         columnCheckboxes.forEach(function(checkbox) {
//             checkbox.checked = selectAllColumnsCheckbox.checked;
//         });
//     });

//     // Event listener for column checkboxes
//     columnCheckboxes.forEach(function(checkbox) {
//         checkbox.addEventListener('change', function() {
//             selectAllColumnsCheckbox.checked = [...columnCheckboxes].every(function(checkbox) {
//                 return checkbox.checked;
//             });
//         });
//     });
// });


function deleteSelectedData() {
    const selectedIndexes = Array.from(document.querySelectorAll('.select-checkbox:checked'))
                                .map(checkbox => checkbox.getAttribute('data-index'));

    if (selectedIndexes.length > 0) {
        // Perform deletion action here
        console.log('Deleting data at indexes:', selectedIndexes);

        // Optionally, remove the selected rows from the table
        selectedIndexes.forEach(index => {
            document.querySelector(`.select-checkbox[data-index="${index}"]`).closest('tr').remove();
        });
    } else {
        alert('No data selected for deletion');
    }
}

function toggleSelectAll(source) {
    const checkboxes = document.querySelectorAll('.select-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = source.checked);
}