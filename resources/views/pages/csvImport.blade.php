@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Contacts
				</div>
				<div class="card-body">
					<form action="{{route('import-csv')}}" method="post">
						@csrf
						<div class="row justify-content-center">
							<div class="col-lg-4">
								<label>Import Contacts CSV File:</label><br>
							</div>
							<div class="col-lg-4">
								<input type="file" name="csv" value="{{old('csv', '')}}">
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-2">
								<input type="submit" name="submit">
							</div>
						</div>						
					</form>
				</div>
			</div> 	
		</div>
	</div>
	
</div>
@endsection

