function dtRegisterButtonsEvent(table) {
    $('#export_print').on('click', function (e) {
        e.preventDefault();
        table.button(0).trigger();
    });

    $('#export_copy').on('click', function (e) {
        e.preventDefault();
        table.button(1).trigger();
    });

    $('#export_excel').on('click', function (e) {
        e.preventDefault();
        table.button(2).trigger();
    });

    $('#export_csv').on('click', function (e) {
        e.preventDefault();
        table.button(3).trigger();
    });

    $('#export_pdf').on('click', function (e) {
        e.preventDefault();
        table.button(4).trigger();
    });
}

function dtParseRequest(data, formSelector) {
    $(formSelector).serializeArray().forEach(item => {
        data[item.name] = item.value;
    })

    let orderName = '';
    if (data.order.length > 0) {
        const columnId = data.order[0].column;
        orderName = data.columns[columnId].data;
        if (data.order[0].dir == 'desc') {
            orderName = '-' + orderName;
        }
    }
    data.sort = orderName;
    data['per-page'] = data.length;
    data.page = data.start / data.length + 1;

    delete data.columns;
    delete data.order;
    delete data.search;
    delete data.draw;
    delete data.start;
    delete data.length;
    return data;
}

function dtRegisterSearchEvent(selector, table) {
    $(selector).submit(function (e) {
        e.preventDefault();
        table.ajax.reload();
    })
}

function dtRenderDate(data, type, row) {
    if (!window.moment) {
        console.warn('moment.js is not loaded');
        return data;
    }
    return moment(data).format('DD/MM/YYYY');
}

function createDataTable(params) {
    loadDefault();
    const { tableSelector, tableUrl, formSelector, viewUrl, updateUrl, deleteUrl, customConfig } = params;
    let config = {
        ajax: {
            url: tableUrl,
            data: function (data) {
                return dtParseRequest(data, formSelector);
            }
        },
        columnDefs: [
            {
                targets: -1,
                orderable: false,
                render: function (data, type, full, meta) {
                    return `
                    <div class="text-nowrap">
                        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="${viewUrl}?id=${data.id}" title="Xem">
                            <i class="la la-eye"></i>
                        </a>

                        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="${updateUrl}?id=${data.id}" title="Cập nhật">
                            <i class="la la-edit"></i>
                        </a>
                        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="${deleteUrl}?id=${data.id}" title="Xóa" data-confirm="Bạn chắc chắn muốn xóa?" data-method="post">
                            <i class="la la-trash-o"></i>
                        </a>
                    </div>
                    `;
                },
            },
            {
                targets: '_all',
                render: $.fn.dataTable.render.text()
            }
        ],
    };

    Object.assign(config, customConfig);
    let table = $(tableSelector).DataTable(config);
    dtRegisterButtonsEvent(table);
    dtRegisterSearchEvent(formSelector, table);

    return table;
}

function loadDefault() {
    $.extend(true, $.fn.dataTable.defaults, {
        responsive: true,
        dom: `<'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        order: [],
        buttons: [
            'print',
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
    });
}