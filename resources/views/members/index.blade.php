@extends('layouts.app')

@section('content')

	<link href="/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--	
	<link href="/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	begin::Global Theme Styles(used by all pages	  w)-->

		


<?php usort($tableGrid, "SiteHelpers::_sort"); ?>
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>


	<div id="membersView"></div>	
	<div id="membersGrid">
		<div class="card">
			<div class="card-body">
			@include( $pageModule.'/toolbar')
		
		
			<div class="table-responsive">			
				<table id="membersTable" class="display table  table-striped table-hover" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			            	<th>ID</th>	
			            	
			            @if($setting['view-method'] =='expand')<th></th>@endif
			           

			            
		            <?php foreach ($tableGrid as $t) :
						if($t['view'] =='1'):
							$limited = isset($t['limited']) ? $t['limited'] :'';
							if(SiteHelpers::filterColumn($limited ))
							{
								echo '<th align="'.$t['align'].'" width="'.$t['width'].'">'.\SiteHelpers::activeLang($t['label'],(isset($t['language'])? $t['language'] : array())).'</th>';				
							} 
						endif;
					endforeach; ?>
							 <th width="30" class="text-right" > Action </th>
						</tr>

					</thead>	
			               
			    </table>
			</div>	 
		</div>			
	</div>	
	</div>
	
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		$('#membersTable thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );

		$('.tips').tooltip();
		$('.dataselect').select2();
		var rows_selected = []; 	
		    var table = $('#membersTable').DataTable({
        			initComplete: function () {
				            // Apply the search
				            this.api().columns().every( function () {
				                var that = this;
				 
				                $( 'input', this.header() ).on( 'keyup change clear', function () {
				                    if ( that.search() !== this.value ) {
				                        that
				                            .search( this.value )
				                            .draw();
				                    }
				                } );
				            } );
				        },
	        "processing": true,
	       
	        "serverSide": true,
	        // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "ajax": {
	            "url": "{!! secure_url('members')!!}",
	            "type": "POST"
	             
        	},
        	"columnDefs": [{ 
        		"targets": [0],
                "visible": false,
                orderable: false,
            	className: 'select-checkbox'
        	}],
        	"columns": [<?php echo $column;?>],
        	'order': [[1, 'asc']],
        	<?php if($access['is_excel'] ==1 ) { ?>
        	dom: 'Bfltip',
        	buttons: [
            	'copy', 'csv', 'excel', 'pdf', 'print'
        	]
        	<?php } ?>
        	
	    });

	   	<?php if($setting['view-method'] =='expand'): ?>
		$('#membersTable tbody').on('click', 'td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = table.row( tr );
	        var id = row.data().rowId;

	        if ( row.child.isShown() ) {
	        	 row.child.hide();
            	tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	            row.child.show();	            
	            row.child( expand_child(id) ).show();
	            tr.addClass('shown');
	            $.get('{{ secure_url("members/")}}/'+id , function(callback){
	            	$('#'+id).html(callback);
	            	$('#'+id).addClass('data');
	            })
		        
	            
	        }
    	});
    	<?php endif; ?>
		$('.dosearch').keyup(function( e ){
			if (e.keyCode === 13) {
				val = $(this).val();
				table.search(val ).draw();
			}
		})  

	    $('#membersTable').Sdtable({
	    	tableId : '#members',
	    	table   : table,
	    	action  : '{{ secure_url("members")}}' 
	    });

	   
	});


    function expand_child( id )
    {
    	return '<div id="'+ id+'"><p class="text-center"> Loading Content .. Please wait</p></div>';	
    }

</script>

		<!-- 		<script src="/plugins.bundle.js"></script>
		<script src="/prismjs/prismjs.bundle.js"></script>
		<script src="/js/scripts.bundle.js"></script>
		
		<script src="/datatables/datatables.bundle.js"></script>
	

		<script src="/assets/js/datatables/search-options/column-search.js"></script>begin::Global Theme Bundle(used by all pages)-->

@endsection