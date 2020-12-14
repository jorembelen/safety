

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/admin/assets/js/libs/jquery-3.1.1.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserStoreRequest', '#user-form'); !!}
    {!! JsValidator::formRequest('App\Http\Requests\EmployeeStoreRequest', '#emp-create'); !!}
    {!! JsValidator::formRequest('App\Http\Requests\LocationStoreRequest', '#loc-create'); !!}
    {!! JsValidator::formRequest('App\Http\Requests\IncidentStoreRequest', '#inc-Create'); !!}


    <script src="/admin/bootstrap/js/popper.min.js"></script>
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/admin/plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="/admin/assets/js/app.js"></script>
       <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/admin/plugins/table/datatable/datatables.js"></script>
    <script src="/admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/admin/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/admin/plugins/table/datatable/button-ext/buttons.print.min.js"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/admin/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="/admin/plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="/admin/plugins/jquery-step/custom-jquery.steps.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->   

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/admin/assets/js/ie11fix/fn.fix-padStart.js"></script>
    <!-- <script src="/admin/assets/js/apps/scrumboard.js"></script> -->
    <!-- END PAGE LEVEL SCRIPTS -->


    <!-- Dashboard -->
    <script src="/admin/plugins/apex/apexcharts.min.js"></script>
    <script src="/admin/assets/js/dashboard/dash_2.js"></script>
    <script src="/admin/assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/admin/plugins/lightbox/photoswipe.min.js"></script>
    <script src="/admin/plugins/lightbox/photoswipe-ui-default.min.js"></script>
    <script src="/admin/plugins/lightbox/custom-photswipe.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script src="/admin/assets/js/custom.js"></script>
    <script src="/admin/plugins/flatpickr/flatpickr.js"></script>
    <script src="/admin/plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="/admin/plugins/noUiSlider/custom-nouiSlider.js"></script>
    <script src="/admin/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>

       <!--  BEGIN CUSTOM SCRIPTS FILE SELECT2 -->
       <script src="/admin/plugins/select2/select2.min.js"></script>

    <script src="/admin/assets/js/scrollspyNav.js"></script>
    <script src="/admin/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/admin/plugins/highlight/highlight.pack.js"></script>
    <script src="/admin/plugins/select2/custom-select2.js"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->




    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->


    <script>
        $(".tagging").select2({
        tags: true
    });
    </script>


    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>

<script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        } );
    </script>



<script>
var secondUpload = new FileUploadWithPreview('myFirstImage')
var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
<script>
var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});
</script>

<script>
    var ss = $(".basic").select2({
        tags: true,
    });
</script>


<script>
$(function() {
    
    // run on change for the selectbox
    $( "#frm_duration" ).change(function() {  
        updateDurationDivs();
    });
    
    // handle the updating of the duration divs
    function updateDurationDivs() {
        // hide all form-duration-divs
        $('.form-duration-div').hide();
          
        // For property
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm1'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm2'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm3'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm4'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm5'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm6'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm7'+divKey).show();
        var divKey = $( "#frm_duration option:selected" ).val();                
        $('#divFrm8'+divKey).show();
    }        

    // run at load, for the currently selected div to show up
    updateDurationDivs();

});

</script>

<script>
$(function() {
    
    // run on change for the selectbox
    
    $( "#role-sel" ).change(function() {  
        updateRoleDivs();
    });
    
    // handle the updating of the duration divs
    function updateRoleDivs() {
        // hide all form-duration-divs
        $('.frm-role').hide();
          
          // for Leave
        var roleKey = $( "#role-sel option:selected" ).val();                
        $('#role'+roleKey).show();

    }        

    // run at load, for the currently selected div to show up
    updateRoleDivs();

});
</script>

<script>

$(function() {
    
    // run on change for the selectbox
    
    $( "#med_leave" ).change(function() {  
        updateLeaveDivs();
    });
    
    // handle the updating of the duration divs
    function updateLeaveDivs() {
        // hide all form-duration-divs
        $('.frm-leave-div').hide();
          
          // for Leave
        var divLKey = $( "#med_leave option:selected" ).val();                
        $('#div'+divLKey).show();

    }        

    // run at load, for the currently selected div to show up
    updateLeaveDivs();

});

</script>

<script>

$(function() {
    
    // run on change for the selectbox
    
    $( "#frst_aid" ).change(function() {  
        updateAiderDivs();
    });
    
    // handle the updating of the duration divs
    function updateAiderDivs() {
        // hide all form-duration-divs
        $('.frm-aider-div').hide();
          
          // for Leave
        var aiderKey = $( "#frst_aid option:selected" ).val();                
        $('#vid'+aiderKey).show();

    }        

    // run at load, for the currently selected div to show up
    updateAiderDivs();

});

</script>
<script>

$(function() {
    
    // run on change for the selectbox
    
    $( "#frm_hosp" ).change(function() {  
        updateHospDivs();
    });
    
    // handle the updating of the duration divs
    function updateHospDivs() {
        // hide all form-duration-divs
        $('.frm-hosp-div').hide();
          
          // for Hospitalization
        var aiderKey = $( "#frm_hosp option:selected" ).val();                
        $('#hosp'+aiderKey).show();
        var aiderKey = $( "#frm_hosp option:selected" ).val();                
        $('#hosp1'+aiderKey).show();

    }        

    // run at load, for the currently selected div to show up
    updateHospDivs();

});

</script>

<script>

$(function() {
    
    // run on change for the selectbox
    
    $( "#witness_frm" ).change(function() {  
        witnessDivs();
    });
    
    // handle the updating of the duration divs
    function witnessDivs() {
        // hide all form-duration-divs
        $('.frm-div').hide();
          
          // for Leave
        var witKey = $( "#witness_frm option:selected" ).val();                
        $('#select'+witKey).show();
        var witKey = $( "#witness_frm option:selected" ).val(); 
        $('#select1'+witKey).show();
        var witKey = $( "#witness_frm option:selected" ).val(); 
        $('#select2'+witKey).show();

    }        

    // run at load, for the currently selected div to show up
    witnessDivs();

});

</script>

<script>

$(function() {
    
    // run on change for the selectbox
    
    $( "#frm_ppe" ).change(function() {  
        ppeDivs();
    });
    
    // handle the updating of the duration divs
    function ppeDivs() {
        // hide all form-duration-divs
        $('.frm-ppe-div').hide();
          
          // for Leave
        var ppeKey = $( "#frm_ppe option:selected" ).val();                
        $('#divPpe'+ppeKey).show();

    }        

    // run at load, for the currently selected div to show up
    ppeDivs();

});

</script>

