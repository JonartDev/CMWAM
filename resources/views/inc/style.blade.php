<style>
    .fa_custom {
    color: #3333;
    }
    .nav-tabs .nav-link.active{
        background-color:#455357;
        color:white;
        border-radius: 10px !important; 
    }
    .nav-tabs .nav-link{
        background-color:#e5e5e8;
        color:black;           
    }
    .nav{
        background:#e5e5e8;
    }    
    .navInact{
        background:#e5e5e8;
        color:white;
        border-radius: 10px !important; 
    }
    .nav-item{
        margin:0px !important;
    }
    ul.nav > li > a:hover {
        background-color: #2222;
        border-radius: 10px !important; 
        transform: scale(1.2);
    } 
    .nav-tabs .nav-links.active{
        background-color:white;
        color:#455357;
        border-radius: 50px 20px !important; 
    }.nav-tabs .nav-links{
        color:#e5e5e8;
        border-color:white;   
        font-weight:bold;

    }

    table.dataTable thead tr {
        background-color:white;
        color:black;
        font-size:14px;
    } 
    table.dataTable thead .sorting, 
    table.dataTable thead .sorting_asc, 
    table.dataTable thead .sorting_desc {
        background : none;
        background-color : black;
        color:white;
    } 
    tbody tr{
        font-weight: normal;
        font-size: 14px !important;
    }
    tbody{
        border-color:black !important;}
    /* .dataTables_filter, .dataTables_info { display: none; } */

    /* Customer table */
    #datatable_length{color:white !important;}
    #datatable_length select{color:black !important;}
    #datatable_info{color:white;}
    #datatable_previous{color:white !important; font-size:14px;}
    #datatable_paginate{color:white !important; font-size:14px;}
    #datatable_next{color:white !important; font-size:14px;}
    #datatable_paginate span a.paginate_button.current{color:black !important;}
    #datatable_paginate span a{color:white !important; font-size:14px;}
    #datatable_filter label{display: none;}

    
    /* MSPG table */
    #datatablem_length{color:white !important;}
    #datatablem_length select{color:black !important;}
    #datatablem_info{color:white;}
    #datatablem_previous{color:white !important; font-size:14px;}
    #datatablem_paginate{color:white !important; font-size:14px;}
    #datatablem_next{color:white !important; font-size:14px;}
    #datatablem_paginate span a.paginate_button.current{color:black !important;}
    #datatablem_paginate span a{color:white !important; font-size:14px;}
    #datatablem_filter label{display: none;}
    #datatablem thead tr th{background-color:black;color:white}
    #datatablem thead tr th input{color:black;}
    #datatablem thead th.sorting_desc {background-color:white}
    #datatablem thead tr th.sorting{background-color:white}
    #datatablem thead tr th.sorting_asc{background-color:white}

    /* LCC Table */
    #datatablelcc_length{color:white !important;}
    #datatablelcc_length select{color:black !important;}
    #datatablelcc_info{color:white;}
    #datatablelcc_previous{color:white !important; font-size:14px;}
    #datatablelcc_paginate{color:white !important; font-size:14px;}
    #datatablelcc_next{color:white !important; font-size:14px;}
    #datatablelcc_paginate span a.paginate_button.current{color:black !important;}
    #datatablelcc_paginate span a{color:white !important; font-size:14px;}
    #datatablelcc_filter label{display: none;}
    #datatablelcc thead tr th{background-color:black;color:white}
    #datatablelcc thead tr th input{color:black;}
    #datatablelcc thead tr th.sorting{background-color:white}
    #datatablelcc thead tr th.sorting_asc{background-color:white}
    /* SHOEMART TABLE */
    #datatableshoemart_length{color:white !important;}
    #datatableshoemart_length select{color:black !important;}
    #datatableshoemart_info{color:white;}
    #datatableshoemart_previous{color:white !important; font-size:14px;}
    #datatableshoemart_paginate{color:white !important; font-size:14px;}
    #datatableshoemart_next{color:white !important; font-size:14px;}
    #datatableshoemart_paginate span a.paginate_button.current{color:black !important;}
    #datatableshoemart_paginate span a{color:white !important; font-size:14px;}
    #datatableshoemart_filter label{display: none;}
    #datatableshoemart thead tr th{background-color:black;color:white}
    #datatableshoemart thead tr th input{color:black;}
    #datatableshoemart thead tr th.sorting{background-color:white}
    #datatableshoemart thead tr th.sorting_asc{background-color:white}
    /* SMMA TABLE */
    #datatablesmma_length{color:white !important;}
    #datatablesmma_length select{color:black !important;}
    #datatablesmma_info{color:white;}
    #datatablesmma_previous{color:white !important; font-size:14px;}
    #datatablesmma_paginate{color:white !important; font-size:14px;}
    #datatablesmma_next{color:white !important; font-size:14px;}
    #datatablesmma_paginate span a.paginate_button.current{color:black !important;}
    #datatablesmma_paginate span a{color:white !important; font-size:14px;}
    #datatablesmma_filter label{display: none;}
    #datatablesmma thead tr th{background-color:black;color:white}
    #datatablesmma thead tr th input{color:black;}
    #datatablesmma thead tr th.sorting{background-color:white}
    #datatablesmma thead tr th.sorting_asc{background-color:white}

    /* Home table */
    #datatableH_length{color:white !important;}
    #datatableH_length select{color:black !important;}
    #datatableH_info{color:white;}
    #datatableH_previous{color:white !important; font-size:14px;}
    #datatableH_paginate{color:white !important; font-size:14px;}
    #datatableH_next{color:white !important; font-size:14px;}
    #datatableH_paginate span a.paginate_button.current{color:black !important;}
    #datatableH_paginate span a{color:white !important; font-size:14px;}
    #datatableH_filter label{display: none;}
    .dataTables_length{font-size:14px;}
    button{border-radius: 10px !important; }
    .dataTables_filter{font-size:20px;}
    .dataTables_info{font-size:14px; }

    /* User Table TAB */    
    #userTable_length{color:white !important;}
    #userTable_length select{color:black !important;}
    #userTable_info{color:white;}
    #userTable_previous{color:white !important; font-size:14px;}
    #userTable_paginate{color:white !important; font-size:14px;}
    #userTable_next{color:white !important; font-size:14px;}
    #userTable_paginate span a.paginate_button.current{color:black !important;}
    #userTable_paginate span a{color:white !important; font-size:14px;}
    #userTable_filter{color:white !important;}
    #userTable_filter input{color:black !important;}
    #userTable_filter label{ border: 2px solid #ffffff;padding:10px;
                border:2px solid;
                margin:10px;text-transform: uppercase;}
    .showf{display: block;}
    #impScale:hover{
        transform: scale(1.2);}

  </style>