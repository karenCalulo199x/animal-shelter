<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9f774d;">
    <a class="navbar-brand" href="{{ route('dashboard')}}">{{
        config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{route('animals.index')}}">Animals<span
                    class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{route('rescuers.index')}}">Rescuers</a>
            <a class="nav-item nav-link" href="{{route('employees.index')}}">Employees</a>
            <a class="nav-item nav-link" href="#">Adopters</a>
            <a class="nav-item nav-link" href="#">Donations</a>
        </div>
    </div>
</nav>
