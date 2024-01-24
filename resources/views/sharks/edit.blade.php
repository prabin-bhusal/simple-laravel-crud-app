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

        <h1>Updaet a shark</h1>

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

        <form method="post" action="{{ route('sharks.update', $shark) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" placeholder="name" class="form-control" value="{{ $shark->name }}"
                    required />
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" placeholder="email" class="form-control"
                    value="{{ $shark->email }}" required />
            </div>
            <div class="form-group">
                <label for="level" class="form-label">Shark Level</label>
                <select for="shark_level" name="shark_level" defaultValue="1" class="form-control">
                    <option value="0">Select
                        a level</option>
                    <option value="1" {{ $shark->shark_level == '1' ? 'selected' : '' }}>Sees Sunlight</option>
                    <option value="2" {{ $shark->shark_level == '2' ? 'selected' : '' }}>Foosball Fnatic
                    </option>
                    <option value="3" {{ $shark->shark_level == '3' ? 'selected' : '' }}>Basement Dweller</option>
                </select>

            </div>


            <div>
                <input type="submit" class="btn btn-primary" value="Update product id:  {{ $shark->id }}">
            </div>

        </form>

    </div>
</body>

</html>
