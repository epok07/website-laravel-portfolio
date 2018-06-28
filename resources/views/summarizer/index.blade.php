@extends('layouts.main')

@push('css')
	@endpush


	@push("js")
@endpush

@section('content')

	<div class="content">

				<form class="" action="/app/summarizer/submit" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="row">
						<div class="col-12 mb-3 text-center">
							<h1 class="">Summary Generator</h1>
							<div class="bg-light">
								<p class="text-danger"> Warning! Only upload raw <strong>.txt</strong> files!<br>
									<span class="text-warning">If possible, remove all periods from acronyms as they are impossible to detect as non sentence periods.</p>
								</p>
							</div>
						</div>
					</div>

					<div class="row mb-5">
						<div class="col-md-12 col-lg-4 text-center mb-2 ">
							<div class="jumbotron h-100">
								<h2 class="mb-3"><strong>Step 1.</strong></h2>

									<h3 for="wordCount">Word Count</h3>
									<input type="text" class="form-control" name="wordCount" id="wordCount" value="500">

							</div>
						</div>

						<div class="col-md-12 col-lg-4 text-center mb-2">
							<div class="jumbotron h-100">
								<h2 class="mb-3"><strong>Step 2.</strong></h2>

									<h3 for="files">Upload files</label> </h3>
									<input type="file" id="files" name="files[]" multiple/>
							</div>
						</div>

						<div class="col-md-12 col-lg-4 text-center mb-2">
							<div class="jumbotron h-100">

								<div class="col-12 text-center h-100">
									<h2 class="mb-3"><strong>Step 3.</strong></h2>
									<button type="submit" onclick="uploadFile" class="btn btn-outline-primary w-75 h-50">Submit</button>
								</div>
							</div>
						</div>

					</div>

					@if (session("error") )
						<h2 class="text-center">Could not generate!</h2>
						<div class="alert alert-danger" role="alert">
						  {{session("error")}}
						</div>
					@endif

					@if (session("summary") )
						<hr>
						<div class="row">
							<div class="col-12 text-center">
								<h2>Your summary</h2>
								<textarea name="name" class="form-control" rows="15">{{session("summary")}}</textarea>
							</div>
						</div>
					@endif

					<hr>

					<div class="row">
						<div class="col-12">
							<h2 class="text-center">How it works?</h2>
							<p>
								The program grabs your source material and decomposes them into both sentences and words disregarding the top 100 words in the english language.
								Counting the number of times each relevant word appears in a document, how many total documents there are and how many documents the given word appears in,
								we are able to calculate each words "rank" by multiplying the times a word appears in a document by the ratio of how many documents it appears in divided by the total number od documents.
								Adding the word ranks of each sentence together gives us a rank of most important sentences!
							</p>
							<p>
								The final step is grabbing the top sentences untill we reach the desired word count,
								organising them by the document they came from and finally sorting them by their appearance order in their respective source file to give the text coherency.
								Et Voila! You have your Key Sentence Summary. Enjoy!
							</p>
						</div>
					</div>

				</form>


	</div>

@endsection
