<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOHO TOKEN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css" integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ config('services.zoho.tokenUrl') }}" method="POST">
                <h1>ZOHO TOKEN</h1>
                <div class="form-group">
                    <label for="">CODE</label>
                    <input type="text" class="form-control" name="code" value="{{ $code ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="">CLIENT ID</label>
                    <input type="text" class="form-control" name="client_id" value="{{ config('services.zoho.clientId') }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">CLIENT SECRET</label>
                    <input type="text" class="form-control" name="client_secret" value="{{ config('services.zoho.clientSecret') }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">REDIRECT URI</label>
                    <input type="text" class="form-control" name="redirect_uri" value="{{ config('services.zoho.redirectUrl') }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">GRANT TYPE</label>
                    <input type="text" class="form-control" name="grant_type" value="authorization_code" readonly>
                </div>
                <div class="form-group">
                    <label for="">SCOPE</label>
                    <input type="text" class="form-control" name="scope" value="ZohoSubscriptions.fullaccess.all" readonly>
                </div>
                <div class="form-group">
                    <label for="">STATE</label>
                    <input type="text" class="form-control" name="state" value="RETRIEVE-JWT">
                </div>


                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
