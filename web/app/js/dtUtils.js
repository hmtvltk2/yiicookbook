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
