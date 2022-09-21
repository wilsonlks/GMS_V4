@extends('layouts.dashboard')

@section('content')
<h1>Sender History</h1>

<div class="container mt-5">
<table   class="table table-striped"   id="sortTable">
<thead>

<tr class="table-info">

<th scope="col">Sender ID</th>
<th scope="col">Departments</th>
<th scope="col">Content</th>
<th scope="col">Language</th>
<th scope="col">Recipient Mobile No.</th>
<th scope="col"  >Sender Status</th>

</tr>

</thead>  
<tbody>   
@foreach($senderHistorys as $senderHistory)

<tr>
<th scope="row">{{ $senderHistory->id }}</th>
<td>{{ $senderHistory->acid }}</td>
<td>{{ $senderHistory->content }}</td>
<td>{{ $senderHistory->language }}</td>
<td>{{ $senderHistory->recipient }}</td>
<td>{{ $senderHistory->SenderStatus }}</td>


</tr>


@endforeach

</tbody>
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