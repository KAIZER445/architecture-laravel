<div>
    <div class=" flex justify-center mt-8">
        <div class="bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-xl">
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
                    <input wire:model="title" type="text" id="title" name="title"
                           class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm text-gray-200"
                           placeholder="Enter title" required>
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                    <textarea wire:model="description" id="description" name="description" rows="4"
                              class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm text-gray-200"
                              placeholder="Enter description" required></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                            class="w-full px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            {{ $editid ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
        
    </div>
    <div class="flex justify-center mt-4 mb-20">
        <div class="bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-xl">
            <h2 class="text-lg font-semibold text-gray-300 mb-4">Saved Records</h2>
            @if (empty($records))
                <p class="text-gray-400 text-center">No records found.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                            <tr>
                                <th scope="col" class="px-4 py-3">Title</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr class="border-b border-gray-600 hover:bg-gray-700">
                                    <td class="px-4 py-3">{{ $record['title'] }}</td>
                                    <td class="px-4 py-3">{{ $record['description'] }}</td>
                                    <td class="px-4 py-3 flex space-x-2">
                                        <button wire:click="edit({{ $record['id'] }})"
                                                class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                            Edit
                                        </button>
                                        <button wire:click="delete({{ $record['id'] }})"
                                                class="px-3 py-1 bg-gray-600 text-white rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    
    
</div>