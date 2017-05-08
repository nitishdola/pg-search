<div class="form-group" style="margin:15px 0">
    <input id="pac-input" class="controls form-control" type="text" placeholder="Search Box" name="name" value="{{ $landmark_name }}">
    <div id="map"></div>
</div>

<div class="form-group {{ $errors->has('latitude') ? 'has-error' : ''}}">
  {!! Form::label('latitude', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('latitude', null, ['class' => 'form-control', 'readonly' => true, 'id' => 'latitude', 'placeholder' => 'Latitude', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('latitude', '<span class="help-inline">:message</span>') !!}
</div> 

<div class="form-group {{ $errors->has('longitude') ? 'has-error' : ''}}">
  {!! Form::label('longitude', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('longitude', null, ['class' => 'form-control', 'readonly' => true, 'id' => 'longitude', 'placeholder' => 'Longitude', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('longitude', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('landmark_image') ? 'has-error' : ''}}">
  {!! Form::label('Landmark_Image', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::file('landmark_image', null, ['class' => 'form-control required', 'id' => 'landmark_image', 'required' => 'true']) !!}
  </div>

  <div class="col-md-5"><p><span class="help-inline">(<i><b>Ideal size is 320x240 in pixels</b></i>)</span></p></div> 
  {!! $errors->first('landmark_image', '<span class="help-inline">:message</span>') !!}
</div>


@section('pageCSS')
<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 300px;
  }
  /* Optional: Makes the sample page fill the window. */

  #description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
  }

  #infowindow-content .title {
    font-weight: bold;
  }

  #infowindow-content {
    display: none;
  }

  #map #infowindow-content {
    display: inline;
  }

  .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
  }

  #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
  }

  .pac-controls {
    display: inline-block;
    padding: 5px 11px;
  }

  .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
  }

  #pac-input:focus {
    border-color: #4d90fe;
  }

  #title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
  }
  #target {
    width: 345px;
  }
</style>
@stop