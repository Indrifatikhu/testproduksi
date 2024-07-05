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
        monthCell.textContent = getMonthName(month);
        sumCell.textContent = sumByMonth[month];
    }
    var targetSumBody = document.getElementById("targetBody");
    for (var month in sumByMonth) {
        var row = targetSumBody.insertRow();
        console.log(sumByMonth[month]);
        console.log(row);
        var sumCell = row.insertCell(1);
        console.log(sumCell);
        sumCell.textContent = sumByMonth[month];
        console.log(sumCell);
    }
}

function getMonthName(monthNumber) {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    if (monthNumber >= 1 && monthNumber <= 12) {
        return monthNames[monthNumber - 1];
    } else {
        return "Invalid month number";
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
                    <td>${ getMonthName(target.bulan) }</td>
                    <td>${target.target_bulanan}</td>
                    <td>${target.realisasi_bulanan}</td>
                    <td>${target.persentase_bulanan}%</td>
                    <td>${target.tahun}</td>
                    <td>${target.target_tahunan}</td>
                    <td>${target.realisasi_tahunan}</td>
                    <td>${target.persentase_tahunan}%</td>
                    `;
                    targetBody.appendChild(row);
                });
            })
        .catch(error => console.error('Error fetching data:', error));
});


// document.addEventListener('DOMContentLoaded', (event) => {
//     // Perform subtraction
//     const updatedProduksiData = produksiData.map((produksi) => {
//         const cartItem = cartData.find(cart => cart.produksi_id === produksi.id);
//         if (cartItem) {
//             produksi.produksi -= cartItem.jml_distribusi;
//         }
//         return produksi;
//     });

//     // Update produksiTable with new values
//     produksiBody.innerHTML = '';
//     updatedProduksiData.forEach((produksi) => {
//         const row = document.createElement('tr');
//         row.innerHTML = `
//             <td>${produksi.id}</td>
//             <td>${produksi.produksi}</td>
//         `;
//         produksiBody.appendChild(row);
//     });

//     console.log('Updated Produksi Data:', updatedProduksiData);
// });

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

$('.btn-detail-target-bangsa').click(function(){
    var id = $(this).attr('data-id')
    var bangsa = $(this).attr('data-bangsa')
    var tahun = $(this).attr('data-tahun')
    var bulan = $(this).attr('data-bulan')

    $.ajax({
        url: '/reportbangsa/' + id,
        method: 'GET',
        beforeSend: function(){
            $('#produksibulltable').empty()
            $('#label-report').text(`Detail Report Produksi Bangsa ${ bangsa } ${ bulan } ${ tahun }`)
        }, success: function(response) {
            let tableBody = '';
            let totalBulanan = {
                january: 0, february: 0, march: 0, april: 0,
                may: 0, june: 0, july: 0, august: 0,
                september: 0, october: 0, november: 0, december: 0
            };
            let totalTahunan = 0;

            response.forEach(item => {
                // Convert string values to numeric before adding to the total
                const january = parseInt(item.realisasi_bulanan.january) || 0;
                const february = parseInt(item.realisasi_bulanan.february) || 0;
                const march = parseInt(item.realisasi_bulanan.march) || 0;
                const april = parseInt(item.realisasi_bulanan.april) || 0;
                const may = parseInt(item.realisasi_bulanan.may) || 0;
                const june = parseInt(item.realisasi_bulanan.june) || 0;
                const july = parseInt(item.realisasi_bulanan.july) || 0;
                const august = parseInt(item.realisasi_bulanan.august) || 0;
                const september = parseInt(item.realisasi_bulanan.september) || 0;
                const october = parseInt(item.realisasi_bulanan.october) || 0;
                const november = parseInt(item.realisasi_bulanan.november) || 0;
                const december = parseInt(item.realisasi_bulanan.december) || 0;
                const annual = parseInt(item.realisasi_tahunan) || 0;

                tableBody += `
                    <tr>
                        <td class="text-left">${item.bull}</td>
                        <td class="text-center">${january}</td>
                        <td class="text-center">${february}</td>
                        <td class="text-center">${march}</td>
                        <td class="text-center">${april}</td>
                        <td class="text-center">${may}</td>
                        <td class="text-center">${june}</td>
                        <td class="text-center">${july}</td>
                        <td class="text-center">${august}</td>
                        <td class="text-center">${september}</td>
                        <td class="text-center">${october}</td>
                        <td class="text-center">${november}</td>
                        <td class="text-center">${december}</td>
                        <td class="text-center">${annual}</td>
                    </tr>`;

                totalBulanan.january += january;
                totalBulanan.february += february;
                totalBulanan.march += march;
                totalBulanan.april += april;
                totalBulanan.may += may;
                totalBulanan.june += june;
                totalBulanan.july += july;
                totalBulanan.august += august;
                totalBulanan.september += september;
                totalBulanan.october += october;
                totalBulanan.november += november;
                totalBulanan.december += december;
                totalTahunan += annual;
            });

            tableBody += `
                <tr>
                    <th class="text-left">Total</th>
                    <th class="text-center">${totalBulanan.january}</th>
                    <th class="text-center">${totalBulanan.february}</th>
                    <th class="text-center">${totalBulanan.march}</th>
                    <th class="text-center">${totalBulanan.april}</th>
                    <th class="text-center">${totalBulanan.may}</th>
                    <th class="text-center">${totalBulanan.june}</th>
                    <th class="text-center">${totalBulanan.july}</th>
                    <th class="text-center">${totalBulanan.august}</th>
                    <th class="text-center">${totalBulanan.september}</th>
                    <th class="text-center">${totalBulanan.october}</th>
                    <th class="text-center">${totalBulanan.november}</th>
                    <th class="text-center">${totalBulanan.december}</th>
                    <th class="text-center">${totalTahunan}</th>
                </tr>`;

            $('#produksibulltable').html(tableBody);
            $('#produksi-report-modal').modal('show');
        },
        error: function(error) {
            console.log(error);
        }
    });
})

$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase()
    $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    })
});

$('#select-bangsa').change(function(){
    var id = $(this).val()
    $.ajax({
        url: 'bullsByBangsa/' + id,
        type: 'get',
        beforeSend: function(){
            $('#select-bull').empty()
        }, success: function(res){
            $('#select-bull').append(`<option selected disabled>- PILIH BULL -</option>`)
            for (let i = 0; i < res.length; i++) {
                $('#select-bull').append(`<option value="${ res[i].id }"> ${ res[i].kode_bull } - ${ res[i].bull }</option>`)
            }
            $('#select-bull').attr('disabled', false)
        }
    })
})

$('#provinsi_id').change(function(){
    var provinsi_id = $(this).val()
    $.ajax({
        url: '/getRegencyByProvinceId/' + provinsi_id,
        type: 'get',
        beforeSend: function(){
            $('#regency_id').empty()
        }, success: function(res){
            $('#regency_id').attr('disabled', false)
            $('#regency_id').append(`<option value="" selected disabled>- Pilih Kabupaten/Kota -</option>`)
            for (let i = 0; i < res.length; i++) {
                $('#regency_id').append(`<option value="${ res[i].id }">${ res[i].name }</option>`)
            }
        }
    })
})