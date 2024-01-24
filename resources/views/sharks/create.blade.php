<!DOCTYPE html>
<html>

<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('sharks') }}">View All sharks</a></li>
                <li><a href="{{ URL::to('sharks/create') }}">Create a shark</a>
            </ul>
        </nav>

        <h1>Create a shark</h1>

        <!-- if there are creation errors, they will show here -->

        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </div>

        <form method="post" action="{{ route('sharks.store') }}">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" placeholder="name" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" placeholder="email" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="level" class="form-label">Shark Level</label>
                <select for="shark_level" name="shark_level" class="form-control">
                    <option value="0">Select a level</option>
                    <option value="1">Sees Sunlight</option>
                    <option value="2">Foosball Fnatic</option>
                    <option value="3">Basement Dweller</option>
                </select>

            </div>


            <div>
                <input type="submit" class="btn btn-primary" value="Create new product">
            </div>

        </form>

    </div>
</body>

</html>
