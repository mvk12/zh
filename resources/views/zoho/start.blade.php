<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOHO START</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css" integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ config('services.zoho.authUrl') }}" method="GET">
                <h1>ZOHO START</h1>
                <div class="form-group">
                    <label for="">SCOPE</label>
                    <input type="text" class="form-control" name="scope" value="ZohoSubscriptions.fullaccess.all" readonly>
                </div>
                <div class="form-group">
                    <label for="">CLIENT ID</label>
                    <input type="text" class="form-control" name="client_id" value="{{ config('services.zoho.clientId') }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">RESPONSE TYPE</label>
                    <input type="text" class="form-control" name="response_type" value="code" readonly>
                </div>
                <div class="form-group">
                    <label for="">ACCESS TYPE</label>
                    <input type="text" class="form-control" name="access_type" value="offline" readonly>
                </div>
                <div class="form-group">
                    <label for="">REDIRECT URI</label>
                    <input type="text" class="form-control" name="redirect_uri" value="{{ config('services.zoho.redirectUrl') }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">STATE</label>
                    <input type="text" class="form-control" name="state" value="FETCH_CODE" readonly>
                </div>

                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
