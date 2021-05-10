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
    <form action="{{ route('zoho.subscription.store') }}" method="POST">
        @csrf
        <h1>REGISTER SUBSCRIPTION IN ZOHO</h1>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">CUSTOMER</label>
                    <select name="customer_id" class="form-control">
                        @foreach ($customers as $c)
                            <option value="{{ $c['customer_id'] }}">{{ $c['display_name'] }} ({{ $c['email'] }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col">
                <div class="form-group">
                    <label for="">PLAN</label>
                    <select id="plan_id" name="plan[plan_code]" class="form-control">
                      <option value="" selected>--Seleccione--</option>
                      @foreach ($plans as $plan)
                        <option value="{{ $plan['plan_code'] }}">({{ $plan['plan_code'] }}) {{ $plan['name'] }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">TAX ID</label>
                    <input type="text" id="tax_id" class="form-control" name="plan[tax_id]" readonly>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <div class="label">Complemento</div>
              <input type="text" id="addon_id" class="form-control" name="addons[][addon_code]" placeholder="R6.M.1">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">COUPON CODE</label>
                    <input type="text" class="form-control" name="coupon_code">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</div>
<script>
  window.plans = @json($plans);

  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('plan_id').addEventListener('change', function(e) {
      var plan_id = e.target.value;

      var plan = window.plans.find(function(item) {
        return item.plan_code == plan_id;
      });

      document.getElementById('tax_id').value = plan.tax_id;
    });
  });
</script>
</body>
</html>
