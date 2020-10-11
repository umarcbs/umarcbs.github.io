/**
 * Created by beraaksoy on 2/6/17.
 */
$(document).ready(function () {


    // 1) Basic Table
    // Uncomment the next line and comment everything else for a basic table pagination and search
    // $('#maintable').DataTable();

    // 2) Hide columns 3 and 4
    // Use when you want to show a different view
    // $('#maintable').dataTable({
    //     "columnDefs": [
    //         {
    //             "targets": [2],
    //             "visible": false,
    //             "searchable": false
    //         },
    //         {
    //             "targets": [3],
    //             "visible": false
    //         }
    //     ]
    // });

    // 3) Add the following buttons:
    // - Show 10, 25, 50, 100, All rows
    // - Copy rows to clipboard
    // - Export to Excel
    // - Export to CSV
    // - Printable view
    // - Export to PDF
    // - Set column visibility
    var table = $('#maintable').DataTable({
        // scrollY: 300,
        // paging: false,
        // "ordering": false,
        

        mark: true,
        dom: 'Bfrtip',
        // - Row  visibility options
        lengthMenu: [
            [10, 25, 50, 100, -1],
            ['10 rows', '25 rows', '50 rows', '100 rows', 'Show All']
        ],
        buttons: [
            'pageLength',
            // - Copy 
            // - Copy Shortcut key (alt+c)
            {
                extend: 'copyHtml5',
                text: 'Copy',
            key: {
                key: 'c',
                altKey: true
            }
            },
            // - Excel 
            // - Excel Shortcut key (alt+x)
            {
                extend: 'excelHtml5', 
                
                text: 'Excel',
            key: {
                key: 'x',
                altKey: true
            },
            exportOptions: {
                    columns: ':visible'
                }
            },
            // - CSV 
            // - CSV Shortcut key (alt+v)
            {
                extend: 'csvHtml5', 
                text: 'CSV',
            key: {
                key: 'v',
                altKey: true
            },
                exportOptions: {
                    columns: ':visible',
                }
            },
            // - Print 
            // - Print Shortcut key (alt+p)
            {
                extend: 'print', footer: true, 
                text: 'Print',
            key: {
                key: 'p',
                altKey: true
            },
                exportOptions: {
                    columns: ':visible'
                }
            },
            // - PDF 
            // - PDF Shortcut key (alt+k)
            {
                extend: 'pdfHtml5', footer: true, title: 'Medicinal Plants of JK',  
                download: 'you',
                text: 'PDF',
            key: {
                key: 'k',
                altKey: true
            },
                exportOptions: {
                    columns: ':visible',
                }
            },
            // - JSON
            // - JSON Shortcut key (alt+j)
            {
                text: 'JSON',
            key: {
                key: 'j',
                altKey: true
            },
                exportOptions: {
                    columns: ':visible',
                },
                action: function ( e, dt, button, config ) {
                    var data = dt.buttons.exportData();
 
                    $.fn.dataTable.fileSave(
                        new Blob( [ JSON.stringify( data ) ] ),
                        'Medicinal Plants of JK.json'
                    );
                }
            },
            // - Column Visibility 
            
            'colvis',
        ],

        columDefs: [{
            targets: -1,
            visible: false
        }]
    });
     // $("tr:even").css("background-color", "cyan");
     // $("tr:odd").css("background-color", "lime");
     // $("td:even").css("background-color", "yellow");
     // $("td:odd").css("background-color", "pink");

    // 4) Search on Multiple Columns
    $('#maintable tfoot th').each(function () {
        var title = $('#maintable tfoot th').eq($(this).index()).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });

    table.columns().eq(0).each(function (colIdx) {
        $('input', table.column(colIdx).footer()).on('keyup change', function () {
            table
                .column(colIdx)
                .search(this.value)
                .draw();
        });
    });
    
    

});
