//[Data Table Javascript]

//Project:	Elitex Admin - Responsive Admin Template
//Primary use:   Used only for the Data Table

$(function () {
    "use strict";

    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });


	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
            // { extend: 'copy', text: 'Կրկնօրինակել' },
            // { extend: 'csv', text: 'Արտահանել CVS' },
            { extend: 'excel', text: 'Արտահանել Excel' },
            // { extend: 'pdf', text: 'Արտահանել Pdf' },
            { extend: 'print', text: 'Տպել' },
		],
        language: {
            "info": "Ցուցադրվում է _END_-ից _START_-ը ընդհանուր _TOTAL_-ից",
            "infoEmpty": "Տվյալ չկա",
            "emptyTable": "Տվյալ չկա",
            "zeroRecords": "Տվյալ չկա",
            "infoFiltered": " - ֆիլտրված _MAX_-ից",
            "searchPlaceholder": "Փնտրել",
            "search": "Փնտրել",
            "paginate": {
                "previous": "Նախորդ",
                "next": "Հաջորդ",
            }
        }
	} );

	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});

	$('#productorder').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});


	$('#complex_header').DataTable();

	//--------Individual column searching

    // Setup - add a text input to each footer cell
    $('#example5 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#example5').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


	//---------------Form inputs
	var table = $('#example6').DataTable();

    $('button').click( function() {
        var data = table.$('input, select').serialize();
        // alert(
        //     "The following data would have been submitted to the server: \n\n"+
        //     data.substr( 0, 120 )+'...'
        // );
        return false;
    } );




  }); // End of use strict
