@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h1>Categories</h1>
	        </div>
	        <div class="pull-right">
	        	@permission('create-Category')
	            <a class="btn btn-success" href="{{ route('Category.create') }}"> Create New Item</a>
	            @endpermission
	        </div>
	    </div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

        <div class="container">
            
	@foreach ($Categories as $Category)
        <div class="col-md-9"><h2>{{ $Category->title }}</h2>
            <br>
        <p>{{ $Category->description }}</p>
        <div class="col-md-3"><a class="btn btn-info" href="{{ route('Category.show',$Category->id) }}">Show</a>
			@permission('edit-Category')
			<a class="btn btn-primary" href="{{ route('Category.edit',$Category->id) }}">Edit</a>
			@endpermission
        @permission('delete-Category')
			 {!! Form::open(['method' => 'DELETE','route' => ['Category.destroy', $Category->id],'style'=>'display:inline']) !!}
                         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        	@endpermission
        </div>
		</div>
     
        
	@endforeach

        </div>
	{!! $Categories->render() !!}

@endsection