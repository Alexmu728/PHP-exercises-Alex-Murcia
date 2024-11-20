<html>
    <head>
        <title>@yield("title", "AlexMurcia exam")</title>
    </head>

    <body>
        <nav>
            <div id="navbar">
                <ul>
                    <li>
                        <a href="{{route("dentists.index")}}">Dentists</a>
                    </li>
                    <li>
                        <a href="{{route("clients.index")}}">Clients</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div>
            @yield("content")
        </div>
    </body>
</html>