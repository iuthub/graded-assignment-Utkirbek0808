@extends('layouts.initial')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default my-5">
				<div class="card-header text-center">
					
					Edit a Task

				</div>
				<div class="card-body">
					<form action="/{{$data->id}}/update" method="POST">
						@csrf
						
							<div class="form-group">
								<input type="text" name="name" class='form-control' placeholder="Update a task" value="{{$data->name}}">
							</div>
							
							<div class="form-group text-center">
								<button type="submit" class="btn btn-primary mt-3">Update a task</button>
							</div>
								
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection