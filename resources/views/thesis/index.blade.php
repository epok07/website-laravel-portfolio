@extends('layouts.main')

@push("js")
@endpush

@section('content')
	<div class="content">
		<form class="" action="/app/thesis/submit" method="POST" role="form" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-12 text-center">
						<h1>Thesis Generator</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
						<hr>
						<h2 for="comment" class="col-12 text-center">Thesis statement</h2>
						<textarea class="form-control" rows="5" id="comment"></textarea>
						<hr>
						<div class="files col-12 text-center">
							<h2 for="files">Upload files</label> </h2>
							<input type="file" id="files" name="files[]" multiple/>
						</div>

				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-12 text-center">
					<button type="submit" class="btn btn-outline-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>

@endsection
