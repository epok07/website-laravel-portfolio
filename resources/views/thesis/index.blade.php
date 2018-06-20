@extends('layouts.main')

@push("js")
	<script type="text/javascript">
	var dropZone = document.getElementById('dropZone');

	// Optional.   Show the copy icon when dragging over.  Seems to only work for chrome.
	dropZone.addEventListener('dragover', function(e) {
		e.stopPropagation();
		e.preventDefault();
		e.dataTransfer.dropEffect = 'copy';
	});

	// Get file data on drop
	dropZone.addEventListener('drop', function(e) {
		e.stopPropagation();
		e.preventDefault();
		var files = e.dataTransfer.files; // Array of all files

		for (var i=0, file; file=files[i]; i++) {
				if (file.type.match(/image.*/)) {
						var reader = new FileReader();

						reader.onload = function(e2) {
								// finished reading file data.
								var img = document.createElement('img');
								img.src= e2.target.result;
								document.body.appendChild(img);
						}

						reader.readAsDataURL(file); // start reading the file data.
				}
		}
	});
	</script>
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
