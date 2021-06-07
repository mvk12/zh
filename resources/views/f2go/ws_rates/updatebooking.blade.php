<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WS_Rates - UpdateBooking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css" integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col"><h1>WS_Rates - UpdateBooking</h1></div>
  </div>
  <form action="{{route('f2go.ws_rates.update-booking.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">sLnTy</label>
          <input type="text" class="form-control"name="sLnTy" readonly/>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">sCrTy</label>
          <input type="text" class="form-control"name="sCrTy" readonly/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">sp_cod_hotel</label>
          <input type="text" class="form-control"name="sp_cod_hotel" value=""/>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">sp_clave_reserva</label>
          <input type="text" class="form-control"name="sp_clave_reserva" placeholder="12345" value=""/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">sp_email</label>
          <input type="text" class="form-control"name="sp_email" value=""/>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">sp_nombre_titular</label>
          <input type="text" class="form-control"name="sp_nombre_titular" value="" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">sp_apellidos_titular</label>
          <input type="text" class="form-control"name="sp_apellidos_titular" value="" />
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">sp_adultostit</label>
          <input type="text" class="form-control"name="sp_adultostit" value="" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">sp_cod_thab</label>
          <input type="text" class="form-control"name="sp_cod_thab" value="" />
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">dp_fecha_entrada</label>
          <input type="text" class="form-control"name="dp_fecha_entrada" value="" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">dp_fecha_salida</label>
          <input type="text" class="form-control"name="dp_fecha_salida" value=""/>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">ksp_cod_emis</label>
          <input type="text" class="form-control"name="ksp_cod_emis" value="" readonly />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">sp_nombre_acomp</label>
          <input type="text" class="form-control"name="sp_nombre_acomp" value="" />
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">sp_apellidos_acomp</label>
          <input type="text" class="form-control"name="sp_apellidos_acomp" value="" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">sp_adulto</label>
          <input type="text" class="form-control"name="sp_adulto" value=""/>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">ip_rooms</label>
          <input type="text" class="form-control"name="ip_rooms" value=""/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="">NotasReservacion</label>
          <textarea class="form-control"name="NotasReservacion" ></textarea>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-success">Enviar</button>
  </form>
</div>
</body>
</html>
