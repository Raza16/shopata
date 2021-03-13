(function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
      "aLengthMenu": [
        [2,5, 10, 15, -1],
        [2,5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },

      /////////////////////////////////////// Datatabel download excel

        fixedHeader: true,
        // pageLength: 100,
        dom: 'lBfrtip',

        buttons: [
            {extend: "excel", exportOptions: {columns:':visible'}, className: "btn btn-success btn-fw",},
            {extend: "csv", exportOptions: {columns:':visible'}, className: "btn btn-success btn-fw",},
            {extend: "colvis", exportOptions: {columns:':visible'}, className: "btn btn-success btn-fw",}

            
        ],
        

        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() == this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }


    });


    $('#order-listing').each(function() {
      
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
      ////////////////////////////////csv downlaod/////////////////////////////////////////////////////
      



    });
  });
})(jQuery);