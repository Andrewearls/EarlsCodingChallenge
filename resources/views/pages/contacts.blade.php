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
							<div class="col-lg-5">
								<input type="submit" name="submit"><button type="button" id="trackingButton">The tracking button</button>
							</div>
						</div>
						
					</form>
				</div>
			</div> 
			<div class="row">
				<!-- End of card -->
				@foreach($contacts as $contact)					
					<div class="col-lg-6">
						@include('cards.contact')
					</div>
				@endforeach
			</div>	
		</div>
	</div>
	
</div>
@endsection

@push('footer-scripts')
<script type="text/javascript">
	$(document).ready(function () {
		$('#trackingButton').click(function () {
			_learnq.push(['track', 'Tracking Button', {
	            // Change the line below to dynamically print the user's email.
	            'button' : 'The Button Was CLICKED!',
	            'when' : Date(),
	        }]);
		});
	});
	
</script>
@endpush