<x-layout>

    <main class="w-50 m-auto mt-5 container-min-w">

        <x-connexion-message />

        <div class="container py-5">
            <h1 class="text-center text-white m-0 fs-1">Connectez-vous</h1>

            <h4 class="text-center text-white fs-5">ou <a href="{{ url('/enregistrement') }}">enregistrez-vous</a></h4>
            <form action="{{ url('/connexion') }}" method="post" class="mt-4">
                @csrf

                <div class="w-75 m-auto">

                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Courriel" autofocus>
                        <label class="form" for="email">Courriel</label>
                        <x-form-message champ="email" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Mot de passe" autocomplete="off">
                        <label class="form" for="password">Mot de passe</label>
                        <x-form-message champ="password" />
                    </div>

                    <p class="d-flex justify-content-center my-5">
                        <input type="submit" class="btn btn-primary me-2" value="Se connecter">
                    </p>
                </div>
            </form>
        </div>
    </main>

</x-layout>
