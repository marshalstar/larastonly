<div class="panel-component title" data-id="@yield('id', $titleId)">
    <div class="row">
        <div class="col-md-6">
            <a href="javascript:void(0)" class="btn btn-default btn-new-title">novo title</a>
            <a href="javascript:void(0)" class="btn btn-default btn-new-question">nova question</a>
            <a href="javascript:void(0)" class="btn btn-default btn-del-title">destroy title</a>
            <input class="input-title" type="text" value="@yield('name')">
        </div>
    </div>
    <div class="row">
        <div class="questions">
            @yield('renderQuestion')
        </div>
    </div>
    <div class="row">
        <div class="titles">
            @yield('renderTitle')
        </div>
    </div>
</div>