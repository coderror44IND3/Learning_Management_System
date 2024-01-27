function createteacher() {
    Swal.fire({
        title: 'Do you want to add data to become a teacher ? ',
        icon: 'question',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Create!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'upcreate1';
        } else {
            Swal.fire('Adding account data cancelled!', '', 'error');
        }
    })
}

function createpresenceT() {
    Swal.fire({
        title: 'Do you want to add teacher attendance data ? ',
        icon: 'question',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Create!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'upcreate2';
        } else {
            Swal.fire('Addition of attendance data cancelled!', '', 'error');
        }
    })
}

function createlibrary() {
    Swal.fire({
        title: 'Do you want to add class material data ? ',
        icon: 'question',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Create!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'upcreate3';
        } else {
            Swal.fire('Addition of class material data cancelled!', '', 'error');
        }
    })
}

function createstudents() {
    Swal.fire({
        title: 'Do you want to add data to become a students ? ',
        icon: 'question',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Create!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'upcreate4';
        } else {
            Swal.fire('Adding account data cancelled!', '', 'error');
        }
    })
}

function tablelibrary() {
    Swal.fire({
        title: 'Do you want to add data to become a teacher ? ',
        icon: 'question',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Table Library!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'tablelibrary';
        } else {
            Swal.fire('Go to table page cancelled!', '', 'error');
        }
    })
}