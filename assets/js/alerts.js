$('.btn-delete').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        icon: 'question',
        title: '¿Deseas eliminar el registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        confirmButtonText: 'Confirmar',
        cancelButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar',
        width: '430px',
        allowEscapeKey: 'false'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})

$('#save').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
        icon: 'question',
        title: '¿Deseas eliminar el registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        confirmButtonText: 'Confirmar',
        cancelButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar',
        width: '430px',
        allowEscapeKey: 'false'
    }).then((result) => {
        if (result.value) {
            document.location.href = "/projects/tienda/update_product.php";
        }
    })
})

function deleted() {
    Swal.fire({
        icon: 'success',
        title: '¡Se ha eliminado correctamente!',
        showConfirmButton: false,
        timer: 1800,
        timerProgressBar: true,
    })
}

function updated() {
    Swal.fire({
        icon: 'success',
        title: '¡Se ha actualizado correctamente!',
        showConfirmButton: false,
        timer: 1800,
        timerProgressBar: true,
    })
}

function registered() {
    Swal.fire({
        icon: 'success',
        title: '¡Se ha registrado correctamente!',
        text: '¿Desea agregar otro registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        confirmButtonText: 'Confirmar',
        cancelButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar',
        width: '430px',
        allowEscapeKey: 'false'
    }).then((result) => {
        if (!result.value) {
            document.location.href = "../views/products.php";
        } 
    })
}

function unregistered() {
    Swal.fire({
        icon: 'error',
        title: '¡Algo salió mal!',
        showConfirmButton: false,
        width: '270px',
        timer: 1800,
        timerProgressBar: true,
    })
}