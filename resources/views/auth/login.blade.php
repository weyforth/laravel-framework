@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $page->title }}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ route('auth.login.do') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('copy.auth.fields.email') }}</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('copy.auth.fields.password') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> {{ trans('copy.auth.login.remember') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									{{ trans('copy.auth.actions.login') }}
								</button>

								<a href="{{ route('password.email') }}">{{ trans('copy.auth.login.forgot') }}</a>
							</div>
						</div>

						@if(count(config('auth.providers')) > 0)
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									@foreach(config('auth.providers') as $provider => $name)
										<a class="btn btn-default" href="{{ route('auth.provider', $provider) }}">
											{{ $name }}
										</a>
									@endforeach
								</div>
							</div>
						@endif

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
