<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Currency</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="text-center">
            <header class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Currency exchange</h1>
                    </div>
                </div>
            </header>
            <article class="text-center container">
                <form action="/" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        @if (count($errors) > 0)
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        @foreach ($errors->all() as $error)
                                            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-1">
                            <div class="col-md-5 text-right">
                                <label class="mt-1">Base Currency:</label>
                            </div>
                            <div class="col-md-3 text-right">
                                EUR
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5 text-right">
                                <label class="mt-1">Target Currency:</label>
                            </div>
                            <div class="col-md-3 text-right">
                                <select name="currency">
                                    <option value="">Select</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->name}}">{{$currency->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-8 text-right">
                                <input class="btn btn-primary" type="submit" value="Exchange">
                            </div>
                        </div>
                    </div>
                </form>
                @if (!empty($exchange))
                    <div class="row">
                        <div class="col-md-12">
                            Result
                        </div>
                    </div>
                    @if (!empty($exchange["success"]) && $exchange["success"] == true)
                        <div class="row mb-1">
                        @foreach($exchange["rates"] as $key => $val)
                            <div class="col-md-5 text-right">
                                <label>{{$key}}:</label>
                            </div>
                            <div class="col-md-3 text-right">
                                {{$val}}
                            </div>
                        @endforeach
                        </div>
                    @else
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-danger">{{$exchange["error"]["info"]}}</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
            </article>
        </div>
    </body>
</html>
