<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    
    <div class="container">
    <div class="col-9">
        
        <div class="row">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="jumbotron-heading">Bunny.net Streame de vídeo</h1>
                <p class="lead">Essa página traz exemplos de integração da API Bunny usando PHP com Laravel.</p>
            </div>
        </div>

        <div class="row">
        <h4>Criar biblioteca de vídeo</h4>
        <form method="POST" action="{{ route('create.library')}}" enctype="multipart/form-data" >
            <table class="table">
                <thead>
                    <tr>
                        <td>Sua Chave de API do Bunny</td>
                        <td>Nome da Biblioteca</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="auth_key" value="e36431d7-7ffb-4fd7-a1cc-a49ff13587b07b7637f0-bd3d-44f4-bae9-8c84c14ffe94"></td>
                        <td><input type="text" class="form-control" name="library_name"/></td>
                        <td><input type="submit" class="btn btn-success" value="Criar Biblioteca"></td>
                        @csrf
                    </tr>
                </tbody>
            </table>
        </form>
        </div>

        <div class="row mt-5">
        <h4>Delete biblioteca de vídeo</h4>
        <form method="POST" action="{{ route('delete.library')}}" enctype="multipart/form-data" >
            <table class="table">
                <thead>
                    <tr>
                        <td>Sua Chave de API do Bunny</td>
                        <td>ID da Biblioteca</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="auth_key" value="e36431d7-7ffb-4fd7-a1cc-a49ff13587b07b7637f0-bd3d-44f4-bae9-8c84c14ffe94"></td>
                        <td><input type="text" class="form-control" name="library_id"/></td>
                        <td><input type="submit" class="btn btn-success" value="Delete Biblioteca"></td>
                        @csrf
                    </tr>
                </tbody>
            </table>
        </form>
        </div>
        
        <div class="row mt-5">
        <h4>Upload de Vídeo</h4>
        <form method="POST" action="{{ route('upload.video')}}" enctype="multipart/form-data" >
            <table class="table">
                <thead>
                    <tr>
                        <td>Sua chave de API do Bunny</td>
                        <td>Arquivo do Vídeo</td>
                        <td>Vídeo Name</td>
                        <td>ID Biblioteca Bunny</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="auth_key" value="a8076e0c-2deb-4936-a1ededf61f67-1188-4803"></td>
                        <td><input type="file" class="form-control" name="video_path"></td>
                        <td><input type="text" class="form-control" name="video_name"></td>
                        <td><input type="text" class="form-control" name="library_id" value="191535"></td>
                        <td><input type="submit" class="btn btn-success" value="Upload"></td>
                        @csrf
                    </tr>
                </tbody>
            </table>
        </form>    
        </div>
     

        <div class="row mt-5">
            <h4>Delete Vídeo</h4>
            <form method="POST" action="{{ route('delete.video')}}">
            <table class="table">
                <thead>
                    <tr>
                        <td>Sua chave de API Bunny</td>
                        <td>ID do Biblioteca</td>
                        <td>ID do vídeo</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input type="input" class="form-control" name="auth_key"></td>
                        <td><input type="input" class="form-control" name="library_Id"></td>
                        <td><input type="input" class="form-control" name="video_id"></td>
                        <td><input type="submit" class="btn btn-success" value="Deletar"></td>
                        @csrf
                    </tr>
                </tbody>
            </table>
            </form>
        </div> 
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>


