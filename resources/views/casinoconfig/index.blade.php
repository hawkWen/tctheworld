@extends('layouts.app')

@section('content')
<?php usort($tableGrid, "SiteHelpers::_sort"); ?>
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>


	<div id="casinoconfigView"></div>	
	<div id="casinoconfigGrid">
		<div class="card">
			<div class="card-body">
			@include( $pageModule.'/toolbar')
		
		
			<div class="table-responsive">			
				<table id="casinoconfigTable" class="display table  table-striped table-hover" cellspacing="0" width="100%">
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
		$('.tips').tooltip();
		$('.dataselect').select2();
		var rows_selected = []; 			
	   	var table = $('#casinoconfigTable').DataTable( {
	        "processing": true,
	       
	        "serverSide": true,
	        // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "ajax": {
	            "url": "{!! secure_url('casinoconfig')!!}",
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
		$('#casinoconfigTable tbody').on('click', 'td.details-control', function () {
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
	            $.get('{{ secure_url("casinoconfig/")}}/'+id , function(callback){
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

	    $('#casinoconfigTable').Sdtable({
	    	tableId : '#casinoconfig',
	    	table   : table,
	    	action  : '{{ secure_url("casinoconfig")}}' 
	    });

	   
	});


    function expand_child( id )
    {
    	return '<div id="'+ id+'"><p class="text-center"> Loading Content .. Please wait</p></div>';	
    }

</script>


@endsection