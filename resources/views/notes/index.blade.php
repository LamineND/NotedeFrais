<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                 <a href="{{ route('notes.create') }}" class="m-4">Add new note</a>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Montant
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Preuve
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Etat
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($notes as $note)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $note->description }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $note->montant }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $note->date_depense }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $note->etat }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    @if($note->preuve)
                                        @if(str_ends_with($note->preuve, '.pdf'))
                                            <embed src="{{ asset('storage/' . $note->preuve) }}" type="application/pdf" width="100%" height="600px" />
                                        @else
                                            <img src="{{ asset('storage/' . $note->preuve) }}" alt="Preuve de Dépense" style="max-width: 100%; max-height: 600px;" />
                                        @endif
                                    @else
                                        <p>Aucune preuve disponible.</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('notes.show', $note) }}"
                                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Afficher</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="2"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ __('Pas de notes de frais') }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>