
@extends('layouts.dashboard')

@section('content')
<h1>Message Lists</h1>

<div class="container mt-5">

	

<table   class="table table-striped"  id="sortTable">
<thead>
<tr class="table-info">
            <th>No</th>
			<th>jobid</th>
			<th>Department</th>
			<th>Recipient Mobile No.</th>
			<th>Language</th>
			<th>content</th>
			<th>Send out times</th>
			<th>Message status</th>
			
		</tr>
		</thead>  

		@if($logs->count())
			@foreach($logs as $key => $log)
			<tr>
				<td>{{ ++$key }}</td>
				<td>{{ $log->jobid }}</td>
				<td>{{ $log->acid }}</td>
				<td>{{ $log->recipient }}</td>
				<td><label class="label label-info">{{ $log->language }}</label></td>
				<td >{{ $log->content }}</td>
				<td><label class="label label-info">{{ $log->timestamp }}</label></td>
				<td>{{ $log->status }}</td>

			<!--	<td><button class="btn btn-danger btn-sm">Detail</button></td> -->
			</tr>			

			@endforeach
		@endif
	</table>

	
	
</div>

<script>

$(document).ready(function() {
    var table = $('#sortTable').DataTable({
        searchPanes: true
		
    });
    table.searchPanes.container().prependTo(table.table().container());
    table.searchPanes.resizePanes();



});



</script>
<div class="col-sm-10">
                <label for="text"> Language : E-English C-Chinese </label></div>
                <div class="col-sm-10">
@stop
