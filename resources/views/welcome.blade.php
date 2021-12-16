<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body class="text-center">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <main role="main" class="inner cover">
        <h1 class="cover-heading mt-5">PRUEBA DE IMPLEMENTACION DE DAMEPAY</h1>
        <form action="{{ route('consultar') }}" method="POST" class="mb-4">
            {{ csrf_field() }}
            <input class="form-control col-2 offset-5 mb-3 mt-4" type="text" name="token" placeholder="Ingrese su Secret Key">
            <button class="btn btn-lg btn-secondary">Consultar</button>
        </form>
      </main>

    @isset ($data)
      <div class="row d-flex justify-content-center">
            <table class="table table-hover col-10">
                <thead>
                    <tr>
                        <th>Payment Links</th>
                        <th>Amount</th>
                        <th>Url</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $element)
                        <tr>
                            <td>{{ $element['link_name'] }}</td>
                            <td>{{ $element['amount'] . ' ' . $element['currency'] }}</td>
                            <td>
                            <a href="https://damepay.com/dashboard/paymentsLink/pay/{{ $element['custon_url'] }}" target="_blank" class="btn btn-sm btn-secondary">PAGAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    @endisset
    <div class="mt-5">
        <hr>
        <h4>EN CASO DE NO TENER PAYMENT LINKS REGISTRADOS, PUEDE HACERLO DESDE AQUI!!!</h4>
        <form action="{{ route('createpostdame') }}" method="POST" class="mt-5">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-name">Secret Key</label>
                <input type="text" name="token" class="form-control">
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-name">Name Payment Links</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-name">Amount</label>
                <input type="text" name="amount" class="form-control">
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-name">Currency</label>
                <input type="text" class="form-control" name="currency">
              </div>
              <div class="col-md-12 mb-3">
                <label for="cc-name">Details Payment Links</label>
                <textarea rows="3" class="form-control" name="details"></textarea>
              </div>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-2 mb-3 ">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Registrar</button>
            </div>
                
            </div>
        </form>
    </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  

</body>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
