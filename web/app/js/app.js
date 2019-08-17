function registerDateRange() {
    $('.input-daterange').datepicker({
        todayHighlight: true,
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>',
        },
    });
}

function alertInit() {
    yii.confirm = function (message, ok, cancel) {
        swal.fire({
            title: message,
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.value) {
                !ok || ok();
            } else {
                !cancel || cancel();
            }
        })
    }
}

$(function () {
    registerDateRange();
    alertInit();
})