@if (session()->has('flash_notification.message'))

	@if (session()->get('flash_notification.level') == 'info')
		@php $icon = 'info_outline'; @endphp
	@elseif (session()->get('flash_notification.level') == 'success')
		@php $icon = 'check'; @endphp
	@elseif (session()->get('flash_notification.level') == 'warning')
		@php $icon = 'warning'; @endphp
	@else
		@php $icon = 'error_outline'; @endphp
	@endif

	<div class="alert alert-{{ session()->get('flash_notification.level') }}">
	     <div class="">
			 <div class="alert-icon">
				<i class="material-icons">{{ $icon }}</i>
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
			</button>
	         <b>{{ session()->get('flash_notification.level') }} Alert:</b> {{ session()->get('flash_notification.message') }}
	    </div>
	</div>

@endif