<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Търсене в единния класификатор</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            .block {
                display: flex;
            }

            .search {
                margin-right: 10px;
            }

            .search-list {
                margin-top: 50px;
            }

            .container {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <div class="columns is-centered">
            <div class="column is-three-fifths">
                <div class="search-list">
                    <form action="/search" method="POST" role="search" name="searchForm">
                        {{ csrf_field() }}
                        <h1 class="title">Търсене в единния класификатор</h1>
                        <div class="block">
                            <input class="input search" type="text" name="query" placeholder="Въведете име на селище" value="{{ $keyword ?? '' }}">
                            <button class="button is-primary" id="button" type="submit">Търсене</button>
                        </div>
                    </form>
                </div>

                <div class="container">
                    @if(isset($results))
                        <table class="table is-striped is-fullwidth">
                            <thead>
                                <tr>
                                    <th>Име</th>
                                    <th>Тип на селището</th>
                                    <th>Община</th>
                                    <th>Област</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->type }}</td>
                                        <td>{{ $result->municipality->name }}</td>
                                        <td>{{ $result->municipality->province->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $results->appends(request()->except('_token'))->links() }}
                    @endif

                    @if(isset($error))
                        <p class="is-size-6 has-text-centered">
                            {{ $error }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <script>
            document.getElementById('button').onkeydown = function(e){
                if(e.keyCode == 13){
                    document.searchForm.submit();
                }
            }
        </script>
    </body>
</html>
