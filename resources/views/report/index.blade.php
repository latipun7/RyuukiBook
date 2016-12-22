@extends('layouts.dashboard')

@section('report', 'active')
@section('nav_title', 'Report')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Report</h4>
            <p class="category">Get transaction report from periode.</p>
        </div>
        <div class="card-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.show') }}">
                {{ csrf_field() }}
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group {{ $errors->has('begin') ? ' has-error' : '' }} label-static">
                        <label for="begin" class="control-label">{{ $errors->has('begin') ? $errors->first('begin') : 'Begin Date' }}</label>
                        <input id="begin" type="text" class="form-control datepicker1" name="begin" value="{{ old('begin') }}" required>
                        <span class="material-icons form-control-feedback">clear</span>
                    </div>

                    <div class="form-group {{ $errors->has('end') ? ' has-error' : '' }} label-static">
                        <label for="end" class="control-label">{{ $errors->has('end') ? $errors->first('end') : 'End Date' }}</label>
                        <input id="end" type="text" class="form-control datepicker2" name="end" value="{{ old('end') }}" required>
                        <span class="material-icons form-control-feedback">clear</span>
                    </div>

                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary">
                            Show Report
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        // Activate Datepicker
        if($('.datepicker1').length != 0){
            $('.datepicker1').datepicker({
                 weekStart:1
            });
        }
        if($('.datepicker2').length != 0){
            $('.datepicker2').datepicker({
                 weekStart:1
            });
        }
    });
</script>
@endsection
