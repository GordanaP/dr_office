var datatable = table.DataTable({
    "ajax": {
        "url": adminAccountsUrl,
        "type": "GET"
    },
    "deferRender": true, // Increase the speed of the table loading
    "columns": [
        {
            render: function(data, type, row, meta) {
                return ''
            },
            searchable: false,
            orderable: false
        },
        {
            data: 'name',
            render: function(data, type, row, meta) {
                return '<a href="#" data-user="' + row.id + '" data-name="' + row.name + '" id="editProfile">' + data +'</a>'
            }
        },
        { data: 'email' },
        {
            data: 'avatar',
            render: function(data, type, row, meta) {

                var filename = data ? data.filename : 'default.jpg'

                return '<a href="#" data-user="' + row.id + '" data-name="' + row.name + '" id="editAvatar">' + setAvatar(filename, 'dt-avatar') + '</a>'
            },
            searchable: false,
            orderable: false
        },
        {
            data: 'roles',
            render: function(data, type, row, meta) {
                return getRoleNames(data).length > 0 ? getRoleNames(data) + ' <a href="#" data-user="' + row.id + '" data-name="' + row.name + '" id="editRoles">Revoke</a>' : '';
            }
        },
        {
            data: 'verified',
            render: function(data, type, row, meta) {
                return getAccountStatus(data)
            }
        },
        {
            data: 'created_at',
            render: function(data, type, row, meta) {
                return getFormattedDate(data)
            }
        },
        {
          render: function(data, type, row, meta) {
            return '<div class="flex justify-center align-center"><button class="btn btn-xs btn-edit" id="editAccount" value="' + row.id + '"><i class="fa fa-pencil mr-12"></i></button><button class="btn btn-xs btn-link btn-primary btn-link-delete" id="deleteAccount" value="' + row.id + '"><i class="fa fa-trash"></i></button>'
          },
          searchable: false,
          sortable: false,
        },
        {
            data: 'id',
            visible: false
        }
    ],
    "order": [6, 'desc'],
    responsive: true,
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 1 },
        { responsivePriority: 3, targets: 2 }
    ]
});

setTableCounterColumn(datatable)

$("#accountsTable_length select, #accountsTable_filter input").addClass('admin-modal-input')
