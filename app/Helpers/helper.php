<?php
   if(!function_exists('datatable_lang')){
        function datatable_lang(){
        return [
                'sProcessing'     => __('Processing...'),
                'sLengthMenu'     => __('Show _MENU_ entries'),
                'sZeroRecords'    => __('No matching records found'),
                'sEmptyTable'     => __('No data available in table'),
                'sInfo'           => __('Showing _START_ to _END_ of _TOTAL_ entries'),
                'sInfoEmpty'      => __('Showing 0 to 0 of 0 entries'),
                'sInfoFiltered'   => __('(filtered from _MAX_ total entries)'),
                'sSearch'         => __('Search:'),
                'sUrl'            => __('Url'),
                'sInfoThousands'  => __(','),
                'sLoadingRecords' => __('Loading...'),
                'oPaginate'       => [
                    'sFirst'         => __('First'),
                    'sLast'          => __('Last'),
                    'sNext'          => __('Next'),
                    'sPrevious'      => __('Previous'),
                ],
                'oAria'            => [
                    'sSortAscending'  => __('Activate to sort column ascending'),
                    'sSortDescending' => __('Activate to sort column descending'),
                ],

            ];
        }
    }
     if(!function_exists('default_lang')){
        function default_lang($lang='en'){
            session()->put('app_locale', $lang);
            App::setLocale($lang);
        }
    }



