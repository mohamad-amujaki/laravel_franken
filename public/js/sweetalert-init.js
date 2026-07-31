(function () {
    const confirmDelete = (form) => {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    };

    document.addEventListener('submit', (e) => {
        const form = e.target.closest('.delete-form');

        if (form) {
            e.preventDefault();
            confirmDelete(form);
        }
    });

    const successMessage = document.body.dataset.swalSuccess;

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: successMessage,
            timer: 3000,
            showConfirmButton: false
        });
    }
})();
