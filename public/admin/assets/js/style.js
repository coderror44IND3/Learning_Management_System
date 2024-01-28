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

function createclassrom() {
    Swal.fire({
        title: 'Do you want to add data to become a classroom ? ',
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
            window.location = 'upcreate5';
        } else {
            Swal.fire('Adding account data cancelled!', '', 'error');
        }
    })
}

function tablelibraryy() {
    Swal.fire({
        title: 'Do you want to add data to become a table library ? ',
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
            window.location = 'tablelibraryy';
        } else {
            Swal.fire('Go to table page cancelled!', '', 'error');
        }
    })
}

function tablepresenceSTD() {
    Swal.fire({
        title: 'Do you want to add data to become a presence students ? ',
        icon: 'question',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Table Presence Student!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'tablepresenceSTD';
        } else {
            Swal.fire('Go to table page cancelled!', '', 'error');
        }
    })
}

function tableclassroom() {
    Swal.fire({
        title: 'Do you want to add data to become a classroom ? ',
        icon: 'question',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Table classroom!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'tableclassroom';
        } else {
            Swal.fire('Go to table page cancelled!', '', 'error');
        }
    })
}