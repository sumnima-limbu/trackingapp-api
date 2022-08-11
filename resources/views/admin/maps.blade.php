@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Maps </h4>
                    @if($currentUserInfo)
                        <p><b>Latitude:</b>{{ $currentUserInfo->longitude }}</p>
                    @endif
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="col-md-12">
                                <!----- google map html ---->
                                <div id="map" style="width:100%;height:600px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('scripts')
    
    <script type="text/javascript">
        function initMap() {
            const myLatLng = {lat: 27.700769, lng: 85.300140}
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello Kathmandu !",
            });
        }

        window.initMap = initMap;
    </script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" async>
    </script>
    
@endsection
