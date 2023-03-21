<x-layout>

    <main class="content mt-2">

        <div class="container p-0 w-50 container-min-w">

        @error('texte')
            <p class="alert alert-danger text-center">{{ $message }}</p>
        @enderror

        <x-accueil-message />

            <h1 class="mb-3 text-center text-white font-weight-bold">LaraGPT</h1>

            <div class="card">
                <div class="row g-0">
                    <div class="col-12">

                        <form action="{{ url('/conversation/sauvegarder') }}" method="post">
                            @csrf

                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input type="text" name="texte" class="form-control" placeholder="Veuillez poser votre question">
                                    <button class="btn btn-primary">Soumettre</button>
                                </div>
                            </div>
                        </form>

                        <div class="position-relative">
                            <div class="chat-messages p-4 liste">

                                @forelse ($conversations as $conversation)

                                <div class="chat-message-group">

                                    <div class="chat-message-left pb-4">
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3 bubble-width">
                                            <div class="mb-1 d-flex">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-3" alt="LaraGPT" width="40" height="40">
                                                {!! $conversation->reponses !!}
                                            </div>
                                            <div class="text-muted small d-flex justify-content-between mt-2">
                                                <span> LaraGPT</span>
                                                <span> {{ substr($conversation->updated_at,0, -3) }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="chat-message-right pb-4">
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3 bubble-width">
                                            <div class="mb-1 d-flex">
                                                <img src="{{ $conversation->user->image }}" class="rounded-circle mr-3" alt="" width="40" height="40">
                                                {!! $conversation->questions !!}
                                            </div>
                                            <div class="text-muted small d-flex justify-content-between mt-2">
                                                <span>{{ $conversation->user->nom_complet }}</span>
                                                <span> {{ substr($conversation->updated_at,0, -3) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @empty
                                    <h1 class="d-flex justify-content-center">Aucun message à afficher</h1>
                                @endforelse

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center p-3">
                <a href="{{ url('/deconnexion') }}" class="btn btn-primary">Déconnexion</a>
            </div>

        </div>
    </main>

</x-layout>
