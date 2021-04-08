@if(count($errors))
  <div class="alert alert-danger alert-dismissible mb-0 show fade">
    <button type="button" class="close" data-dismiss="alert">
      <span aria-hidden="true">&times;</span>
    </button>
		<ul class="mb-0">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
  </div>
@endif
@if(Session::has('alert-primary'))
    <div class="alert alert-primary alert-dismissible mb-0 show fade">
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
          {!! Session::get('alert-primary') !!}
    </div>
@endif
@if(Session::has('alert-secondary'))
    <div class="alert alert-primary alert-dismissible mb-0 show fade">
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
          {!! Session::get('alert-secondary') !!}
    </div>
@endif
@if(Session::has('alert-info'))
    <div class="alert alert-info alert-dismissible mb-0 show fade">
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
          {!! Session::get('alert-info') !!}
    </div>
@endif
@if(Session::has('alert-warning'))
    <div class="alert alert-warning alert-dismissible  mb-0 show fade">
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
          {!! Session::get('alert-warning') !!}
    </div>
@endif
@if(Session::has('alert-danger'))
    <div class="alert alert-danger  alert-dismissible  mb-0 show fade">
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
          {!! Session::get('alert-danger') !!}
    </div>
@endif
@if(Session::has('alert-success'))
<div class="alert alert-success alert-dismissible  mb-0 show fade">
      <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
      </button>
      {!! Session::get('alert-success') !!}
</div>
@endif
