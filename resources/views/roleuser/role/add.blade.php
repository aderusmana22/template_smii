<x-app-layout>

    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full">

                @if (session('status'))
                    <div class="alert alert-success bg-green-500 text-white p-4 rounded mb-4">{{ session('status') }}</div>
                @endif

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-800 text-white p-4">
                        <h4 class="text-lg">Role: {{ $role->name }}
                            <a href="{{ url('roles') }}" class="bg-red-500 text-white px-4 py-2 rounded float-right">Back</a>
                        </h4>
                    </div>
                    <div class="p-6">

                        <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                @error('permission')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror

                                <label for="" class="block mb-2 text-gray-700">Permissions</label>
                                <div class="permission-item">
                                    <input type="checkbox" id="selectAll" class="rounded" onclick="toggleAllCheckboxes(this)">
                                    <label for="selectAll" class="text-sm font-medium ml-2 text-black">Select All</label>
                                </div>
                                <div class="permission-group">
                                    <label class="text-lg font-semibold text-black">Permissions</label>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        @foreach($permissions as $permission)
                                            <div class="permission-item p-2 text-black">
                                                <input type="checkbox" id="permissionCheckbox{{ $permission->id }}" class="rounded" name="permission[]" value="{{ $permission->name }}">
                                                <label for="permissionCheckbox{{ $permission->id }}" class="text-sm font-medium ml-2">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleAllCheckboxes(source) {
            checkboxes = document.querySelectorAll('.permission-item input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source) {
                    checkboxes[i].checked = source.checked;
                }
            }
        }
        </script>

    @endpush

</x-app-layout>
