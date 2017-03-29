<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pessoas cadastradas</title>

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
        margin-top: 100px;
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
        <div class="form-group col-md-12">
            <fieldset>
                <legend>Cadastro de Pessoas</legend>
                <a href=" {{ Route('cadastro.pessoa.create') }}" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Novo</a>

                <table class="table table-striped table-hover">
                    <thead>
                        <th>Nome</th>
                        <th class="hidden-xs">Email</th>
                        <th class="hidden-xs">Cidade</th>
                        <th class="hidden-xs">Estado</th>
                        <th class="hidden-xs" width="200">Hobbies</th>
                        <th >Opção</th>
                    </thead>
                    <tbody>

                    @forelse($pessoas as $p)
                        <tr>
                            <td>{{$p->nome}}</td>
                            <td class="hidden-xs">{{$p->email}}</td>
                            <td class="hidden-xs">{{$p->cidade}}</td>
                            <td class="hidden-xs">{{$p->estado}}</td>
                            <td class="hidden-xs">
                                @forelse($p->hobbies as $h)
                                    {{$h->nome}} /
                                @empty
                                    --
                                @endforelse
                            </td>
                            <td>
                                <a href="{{Route('cadastro.pessoa.edit', ['id' => $p->id])}}" class="btn btn-sm btn-primary">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    Editar
                                </a>
                                <a href="{{Route('cadastro.pessoa.delete', ['id' => $p->id])}}"  class="btn btn-sm btn-danger">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    Apagar</a>
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5">
                                <p> Não existem pessoas cadastradas. </p>
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>
</div>

<footer class="footer">
    <p> CRUD - Laravel v 5.4 © 2017</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>