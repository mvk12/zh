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
        <div class="col">
            <form action="{{route('f2go.ws_rates.update-booking.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">sLnTy</label><input type="text" class="form-control"name="sLnTy" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">sCrTy</label><input type="text" class="form-control"name="sCrTy" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_cod_hotel</label><input type="text" class="form-control"name="sp_cod_hotel" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_clave_reserva</label><input type="text" class="form-control"name="sp_clave_reserva" placeholder="12345"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_email</label><input type="text" class="form-control"name="sp_email" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_nombre_titular</label><input type="text" class="form-control"name="sp_nombre_titular" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_apellidos_titular</label><input type="text" class="form-control"name="sp_apellidos_titular" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_adultostit</label><input type="text" class="form-control"name="sp_adultostit" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_cod_thab</label><input type="text" class="form-control"name="sp_cod_thab" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">dp_fecha_entrada</label><input type="text" class="form-control"name="dp_fecha_entrada" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">dp_fecha_salida</label><input type="text" class="form-control"name="dp_fecha_salida" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">ksp_cod_emis</label><input type="text" class="form-control"name="ksp_cod_emis" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_nombre_acomp</label><input type="text" class="form-control"name="sp_nombre_acomp" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_apellidos_acomp</label><input type="text" class="form-control"name="sp_apellidos_acomp" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">sp_adulto</label><input type="text" class="form-control"name="sp_adulto" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">ip_rooms</label><input type="text" class="form-control"name="ip_rooms" value="1"/>
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
        </div>
    </div>
</div>
</body>
</html>

{{--
// $str = 'sLnTy=string&sCrTy=string&sp_cod_hotel=string&sp_clave_reserva=string&sp_email=string&sp_nombre_titular=string&sp_nombre_titular=string&sp_apellidos_titular=string&sp_apellidos_titular=string&sp_adultostit=string&sp_adultostit=string&sp_cod_thab=string&dp_fecha_entrada=string&dp_fecha_salida=string&ksp_cod_emis=string&sp_nombre_acomp=string&sp_nombre_acomp=string&sp_apellidos_acomp=string&sp_apellidos_acomp=string&sp_adulto=string&sp_adulto=string&ip_rooms=string&ip_rooms=string&NotasReservacion=string';

// $data = [];
// parse_str($str, $data);

// var_dump($data);

$formData = [
    'sLnTy' => '',
    'sCrTy' => '',
    'sp_cod_hotel' => 'DEMO',
    'sp_clave_reserva' => '316612',
    'sp_email' => '',
    'sp_nombre_titular' => '',
    'sp_apellidos_titular' => '',
    'sp_adultostit' => '',
    'sp_cod_thab' => '',
    'dp_fecha_entrada' => '2021-06-15',
    'dp_fecha_salida' => '2021-06-30',
    'ksp_cod_emis' => '',
    'sp_nombre_acomp' => '',
    'sp_apellidos_acomp' => '',
    'sp_adulto' => '',
    'ip_rooms' => '',
    'NotasReservacion' => 'Modificación de ejemplo',
];

$URL = '';
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $URL,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => http_build_query($formData),
    CURLOPT_RETURNTRANSFER => TRUE,
]);
$string = curl_exec($curl);
curl_close($curl);
echo $string.PHP_EOL;

 --}}