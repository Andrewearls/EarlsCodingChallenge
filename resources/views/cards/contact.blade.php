<div class="card">
	<div class="card-header">
		<h3>{{$contact->first_name}}</h3>
	</div>
	<div class="card-body">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				Email:<br>
				Phone:
			</div>
			<div class="col-lg-6">
				{{$contact->email}}<br>
				{{$contact->phone}}
			</div>
		</div>
	</div>
</div>