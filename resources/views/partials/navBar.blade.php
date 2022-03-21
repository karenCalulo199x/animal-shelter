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
            <a class="nav-item nav-link {{(request()->is('animals*')) ? 'active' : ''}}"
                href="{{route('animals.index')}}">Animals</a>
            <a class="nav-item nav-link {{(request()->is('rescuers*')) ? 'active' : ''}}"
                href="{{route('rescuers.index')}}">Rescuers</a>
            <a class="nav-item nav-link {{(request()->is('employees*')) ? 'active' : ''}}"
                href="{{route('employees.index')}}">Employees</a>
            <a class="nav-item nav-link {{(request()->is('adopters*')) ? 'active' : ''}}"
                href="{{route('adopters.index')}}">Adopters</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{(request()->is('donations*')) ? 'active' : ''}}"
                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    href="#">Donations </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item {{(request()->is('donations/Cash*')) ? 'active' : ''}}"
                        href="{{route('donations.index', 'Cash')}}">Cash Donations</a>
                    <a class="dropdown-item {{(request()->is('donations/Items*')) ? 'active' : ''}}"
                        href="{{route('donations.index', 'Items')}}">Items Donations</a>
                </div>
            </li>
            <a class="nav-item nav-link {{(request()->is('healths*')) ? 'active' : ''}}"
                href="{{route('healths.index')}}">Health</a>
        </div>
    </div>
</nav>
