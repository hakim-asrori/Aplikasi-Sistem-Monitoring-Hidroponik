@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <h5 class="card-header text-center text-uppercase text-muted mb-0">Pompa Vit A</h5>
                <div class="card-body text-center">
                    <label class="switch relay_1">
                        <?php
                        echo '<input type="checkbox" id="relay_1" checked value="0">';
                        ?>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <h5 class="card-header text-center text-uppercase text-muted mb-0">Pompa Vit B</h5>
                <div class="card-body text-center">
                    <label class="switch">
                        <?php
                        echo '<input type="checkbox" id="relay_2" checked value="0">';
                        ?>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <h5 class="card-header text-center text-uppercase text-muted mb-0">PH Up</h5>
                <div class="card-body text-center">
                    <label class="switch">
                        <?php
                        echo '<input type="checkbox" id="relay_3" checked value="0">';
                        ?>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <h5 class="card-header text-center text-uppercase text-muted mb-0">PH Down</h5>
                <div class="card-body text-center">
                    <label class="switch">
                        <?php
                        echo '<input type="checkbox" id="relay_4" checked value="0">';
                        ?>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-stats">
                <h5 class="card-header text-center text-uppercase text-muted mb-0">Sensor TDS</h5>
                <div class="card-body text-center">
                    <label class="switch">
                        <span class="round" id="tds"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-stats">
                <h5 class="card-header text-center text-uppercase text-muted mb-0">Sensor PH</h5>
                <div class="card-body text-center">
                    <label class="switch">
                        <span class="round" id="ph"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-script')
    <script src="{{ url('js/mqtt.js') }}"></script>
@endsection
