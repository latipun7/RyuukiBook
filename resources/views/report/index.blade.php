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
            <div class="col-md-8 col-md-offset-2">
                <form>
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
                        <a href="#" id="getreport" type="submit" class="btn btn-primary">
                            Show Report
                        </a>
                    </div>
                </form>
            </div>
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

    function formatDate(date) {
        var d = new Date(date),
            month   = '' + (d.getMonth() + 1),
            day     = '' + d.getDate(),
            year    = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }

    $('#getreport').click(function() {
        var date1 = formatDate($('#begin').val());
        var date2 = formatDate($('#end').val());
        // alert(date1);
        $(this).attr("href", "/admin/report/show/"+date1+"/"+date2);
    });
</script>
@endsection
