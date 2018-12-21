jQuery(document).ready(function($) {
    var loadJS = {

        init: function () {
            this.initDataTables();
            console.log("hi");
        },
        
        initDataTables: function () {
            $(document).ready( function () {

                if ( $('#uni_datatables').length > 0)

                $('#uni_datatables').DataTable();
            } );
        }

    };

    loadJS.init();



})

