<div class=" flex justify-center mt-20">
    <div class="bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-md">
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
                    Submit
                </button>
            </div>
        </form>
    </div>
    
</div>
