<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle note de frais') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-jet-validation-errors class="mb-4" />
 
                    <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
                        @csrf
 
                        <div>
                            <x-jet-label for="montant" value="{{ __('Montant') }}" />
                            <x-jet-input id="montant" class="block mt-1 w-full" type="number" name="montant" :value="old('montant')" required autofocus autocomplete="montant" />
                            <smal>En FCFA</smal>
                        </div>

                        <div>
                            <x-jet-label for="description" value="{{ __('Description') }}" />
                            <textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description"></textarea >
                        </div>

                        <div>
                            <x-jet-label for="etat" value="{{ __('Etat') }}" />
                            <select id="etat" class="block mt-1 w-full">
                                <option value="en cours">En cours</option>
                                <option value="validée">Validée</option>
                                <option value="refusée">Refusée</option>
                            </select>
                        </div>

                        <div>
                            <x-jet-label for="preuve" value="{{ __('Preuve de Dépense') }}" />
                            <x-jet-input id="preuve" class="block mt-1 w-full" type="file"  name="preuve" :value="old('preuve')" accept=".png, .jpg, .jpeg, .pdf" />
                            <small>Fichiers autorisés: PNG, JPG, JPEG, PDF</small>
                         </div>

                        <div>
                            <x-jet-label for="date_depense" value="{{ __('Date') }}" />
                            <x-jet-input id="date_depense" class="block mt-1 w-full" type="date" name="date_depense" :value="old('date_depense')" required autofocus autocomplete="date_depense" />
                        </div>


 
                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Enregistrer') }}
                            </x-jet-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>