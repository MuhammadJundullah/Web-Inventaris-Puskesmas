document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("gambar").addEventListener("change", previewImage);
});

function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("preview");
    const previewImage = document.getElementById("preview-image");
    const uploadArea = document.getElementById("upload-area");

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.src = e.target.result;
            preview.style.display = "block"; // Menampilkan elemen img
            uploadArea.style.display = "none"; // Sembunyikan area upload
        };

        reader.onerror = function () {
            alert("Error reading file. Please try again.");
        };

        reader.readAsDataURL(file); // Membaca file sebagai URL data
    } else {
        previewImage.src = "";
        preview.style.display = "none"; // Menyembunyikan elemen img jika tidak ada file
        uploadArea.style.display = "block"; // Tampilkan area upload kembali
    }
}

// Menampilkan dropdown ketika tombol panah ditekan
document.getElementById('dropdownButton').addEventListener('click', function() {
    var dropdown = document.getElementById('monthDropdown');
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'inline';
    } else {
        dropdown.style.display = 'none';
    }
});

// Menyaring barang berdasarkan bulan yang dipilih
document.getElementById('monthDropdown').addEventListener('change', function() {
    var selectedMonth = this.value;
    var tableBody = document.getElementById('tableBody');
    var rows = tableBody.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var rowDate = rows[i].getAttribute('data-date');
        var rowMonth = rowDate.split('-')[1]; // Ambil bulan dari data-date

        if (selectedMonth === "" || rowMonth === selectedMonth) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
});

  // untuk drop down
  document.getElementById('dropdownButton').addEventListener('click', function() {
    var dropdown = document.getElementById('monthDropdown');
    dropdown.classList.toggle('hidden');
});

document.getElementById('monthDropdown').addEventListener('change', function() {
    var selectedMonth = this.value;
    var rows = document.querySelectorAll('#tableBody tr');

    rows.forEach(function(row) {
        var rowDate = row.getAttribute('data-date').split('-')[1]; // Ambil bulan dari data-date
        if (selectedMonth === "" || rowDate === selectedMonth) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
