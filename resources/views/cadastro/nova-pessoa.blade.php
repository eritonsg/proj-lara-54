<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Novo cadastro de pessoa</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<style>
    .footer{
        margin-top: 50px;
        background-color: #f8f8f8;
        height:60px;
        padding: 25px;
    }

</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRUD</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{Route('cadastro.pessoa.create')}}">Novo</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{Route('cadastro.pessoa.all')}}">Consultar</a></li>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container background-white" style="min-height: 400px;">

    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>Novo cadastro</legend>

                <form name="frm_cad" method="POST" action="{{Route('cadastro.pessoa.store')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group col-xs-12">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="O nome">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="email">E-mail</label>
                        <input type="text" id="email"  name="email" class="form-control" placeholder="email@email.com">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="O nome da cidade">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="estado">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control" placeholder="O nome do estado">
                    </div>

                    <div class="form-group col-xs-12">
                        <label>Hobbie(s)</label> <br>
                        @forelse($hobbies as $h)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="hobbie[]" value="{{$h->id}}"> {{$h->nome}}
                            </label>
                            @empty
                            <p>Cadastre pelo menos um hobbie</p>
                        @endforelse
                    </div>

                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            Salvar</a>
                        </button>
                        <a href="{{Route('cadastro.pessoa.all')}}" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            Voltar</a>
                        </a>
                    </div>

                </form>
            </fieldset>
        </div>
    </div> <!-- Fim classe .row -->

</div> <!-- Fim classe .container -->

<footer class="footer">
    <p> CRUD - Laravel v 5.4 © 2017</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>