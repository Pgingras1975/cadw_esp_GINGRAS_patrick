@if(session('echec-connexion'))
<p class="alert alert-danger text-center w-75 m-auto">{{ session('echec-connexion') }}</p>
@endif

@if(session('success-deconnexion'))
<p class="alert alert-danger text-center w-75 m-auto">{{ session('success-deconnexion') }}</p>
@endif
