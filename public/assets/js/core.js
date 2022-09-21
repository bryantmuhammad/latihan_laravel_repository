const buttonDelete = document.querySelector(".delete");
if (buttonDelete) {
    buttonDelete.addEventListener("click", function (e) {
        e.preventDefault();
        Swal.fire({
            icon: "warning",
            title: "Yakin ingin menghapus data?",
            showConfirmButton: true,
            confirmButtonText: "Ya Hapus",
            showCancelButton: true,
            cancelButtonText: "Tidak",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                this.parentElement.submit();
            }
        });
    });
}

const image = document.getElementById("image");
if (image) {
    image.addEventListener("change", function (e) {
        const [file] = this.files;
        if (file) {
            document.getElementById("preview").src = URL.createObjectURL(file);
        }
    });
}
