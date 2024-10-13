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
