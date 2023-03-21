@props(['champ'])

@error($champ)
    <p class="alert alert-danger">{{ $message }}</p>
@enderror
