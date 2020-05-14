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
					<form action="{{route('contacts')}}" method="post">
						@csrf
						<div class="row justify-content-center">
							<div class="col-lg-3">
								<label>First Name</label><br>
								<label>Email</label><br>
								<label>Phone</label><br>
							</div>
							<div class="col-lg-3">
								<input type="text" name="first_name" value="{{old('first_name', '')}}">
								<input type="email" name="email" value="{{old('email', '')}}">
								<input type="text" name="phone" value="{{old('phone', '')}}">
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-3">
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