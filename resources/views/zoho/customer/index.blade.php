<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER CUSTOMER IN ZOHO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css" integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('zoho.customer.store') }}" method="POST">
                @csrf
                <h1>REGISTER CUSTOMER IN ZOHO</h1>
                <div class="form-group">
                    <label for="">DISPLAY NAME</label>
                    <input type="text" class="form-control" name="display_name" required>
                </div>
                <div class="form-group">
                    <label for="">SALUTATION</label>
                    <input type="text" class="form-control" name="salutation">
                </div>
                <div class="form-group">
                    <label for="">FIRST NAME</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="form-group">
                    <label for="">LAST NAME</label>
                    <input type="text" class="form-control" name="last_name">
                </div>
                <div class="form-group">
                    <label for="">EMAIL</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">COMPANY NAME</label>
                    <input type="text" class="form-control" name="company_name">
                </div>
                <div class="form-group">
                    <label for="">PHONE</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group">
                    <label for="">MOBILE</label>
                    <input type="text" class="form-control" name="mobile">
                </div>
                <div class="form-group">
                    <label for="">DEPARTMENT</label>
                    <input type="text" class="form-control" name="department">
                </div>
                <div class="form-group">
                    <label for="">DESIGNATION</label>
                    <input type="text" class="form-control" name="designation">
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
