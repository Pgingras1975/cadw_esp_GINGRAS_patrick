<x-layout>

    <main class="w-50 m-auto mt-5 container-min-w">

        <div class="container py-5">
            <h1 class="text-center text-white m-0 fs-1">Créez un compte</h1>
            <h4 class="text-center text-white fs-5">ou <a href="{{ url('/connexion') }}">connectez-vous</a></h4>
            <form action="{{ url('/enregistrement') }}" method="post" enctype="multipart/form-data" class="mt-4">
                @csrf

                <div class="w-75 m-auto">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}"
                            placeholder="Votre prénom" autofocus>
                        <label class="form" for="prenom">Prénom</label>
                        <x-form-message champ="prenom" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="nom" value="{{ old('nom') }}">
                        <label class="form" for="nom">Nom</label>
                        <x-form-message champ="nom" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Courriel" value="{{ old('email') }}">
                        <label class="form" for="email">Courriel</label>
                        <x-form-message champ="email" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Mot de passe" autocomplete="off">
                        <label class="form" for="password">Mot de passe</label>
                        <x-form-message champ="password" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password-confirm" name="password-confirm"
                            placeholder="Confirmez le mot de passe" autocomplete="off">
                        <label class="form" for="password-confirm">Confirmez le mot de passe</label>
                        <x-form-message champ="password-confirm" />
                    </div>

                    <label class="text-white h4" for="image">Photo : </label>
                    <input class="text-white" type="file" name="image" id="">
                    <x-form-message champ="image" />

                    <p class="d-flex justify-content-center my-5">
                        <input type="submit" class="btn btn-primary me-2" value="S'enregistrer">
                    </p>
                </div>
            </form>
        </div>
    </main>

</x-layout>
