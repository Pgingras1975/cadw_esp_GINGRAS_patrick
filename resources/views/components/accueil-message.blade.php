@if(session('success-connexion'))
<p class="alert alert-success text-center">Bienvenue, {{ auth()->user()->prenom }}</p>
@endif

@if(session('success-creation'))
<p class="alert alert-success text-center">Bienvenue, {{ auth()->user()->prenom }}</p>
@endif
