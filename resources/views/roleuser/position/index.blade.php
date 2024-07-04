<x-app-layout>
    @section('title')
        List Positions
    @endsection
    <div class="content-header">
        <div class="flex items-center justify-between">
            <h4 class="page-title text-2xl font-lg"></h4>
            <div class="inline-flex items-center">
                <nav>
                    <ol class="breadcrumb flex items-center">
                        <li class="breadcrumb-item pr-1"><a href="{{ route('dashboard') }}"><i
                                    class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item pr-1" aria-current="page">Position</li>
                        <li class="breadcrumb-item active" aria-current="page">List Position</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="content">
        <!-- Add Position Button -->
        <div class="mb-4 flex justify-end">
            <button type="button" class="px-4 py-3 bg-blue-500 text-white rounded hover:bg-blue-600"
                data-modal-target="createPositionModal" data-modal-toggle="createPositionModal">
                Add Position
            </button>
        </div>
        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-2xl font-medium">List Positions</h1>
            </div>
            <div class="card-body">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table id="positionsTable"
                        class="table table-striped w-full  text-left rtl:text-right table-bordered">
                        <thead class="uppercase border-b">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-lg">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-lg">
                                    Position
                                </th>
                                <th class="px-6 py-3 text-lg text-center">
                                    Department
                                </th>
                                <th class="px-6 py-3 text-lg text-center">
                                    Level
                                </th>
                                <th class="px-6 py-3 text-lg text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($positions as $item)
                                <tr>
                                    <td class="px-6 py-4 text-lg">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 text-lg">
                                        {{ $item->position_name }}
                                    </td>
                                    <td class="px-6 py-4 text-lg">
                                        {{ $item->department->department_name }}
                                    </td>
                                    <td class="px-6 py-4 text-lg">
                                        {{ $item->level->level_name }}
                                    </td>
                                    <td class="flex items-center justify-center text-lg space-x-4">
                                        <button type='button'
                                            data-modal-target="createPositionModal-{{ $item->id }}"
                                            data-modal-toggle="createPositionModal-{{ $item->id }}"
                                            class="text-fade btn btn-warning"><i
                                                class="fa-solid fa-pencil text-white"></i>
                                        </button>
                                        <form action="/positions/{{ $item->position_slug }}/delete" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-fade btn btn-danger">
                                                <i class="fas fa-trash-alt text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#positionsTable').DataTable({
                "lengthChange": false,
                "pagingType": "simple_numbers",
                "dom": 'Bfrtip',
                "buttons": [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "drawCallback": function(settings) {
                    // Function to reposition modal in the viewport
                    function repositionModal(modalId) {
                        var modal = $('#' + modalId);
                        var modalDialog = modal.find('.modal-dialog');

                        // Calculate top position based on viewport and scroll
                        var modalTop = Math.max(0, ($(window).height() - modalDialog.outerHeight()) / 2) + $(window).scrollTop();
                        var modalLeft = Math.max(0, ($(window).width() - modalDialog.outerWidth()) / 2);

                        modalDialog.css({
                            'margin-top': modalTop,
                            'margin-left': modalLeft
                        });
                    }

                    // Trigger reposition on modal show event
                    $('[data-modal-toggle]').on('click', function() {
                        var target = $(this).data('modal-target');
                        $('#' + target).removeClass('hidden');
                        repositionModal(target); // Reposition modal when shown
                    });

                    $('[data-modal-hide]').on('click', function() {
                        var target = $(this).data('modal-hide');
                        $('#' + target).addClass('hidden');
                    });
                }
            });

            // SweetAlert2 confirmation dialog for delete action
            $('.delete-form').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting

                var form = this; // Store a reference to the form

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form if confirmed
                    }
                });
            });

            @if (session()->has('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session()->get('success') }}',
                    text: '{{ session()->get('message') }}',
                });
            @endif
        });
    </script>

    @endpush

    {{-- Modal Create --}}
    <div id="createPositionModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white">
                        Create Position
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="createPositionModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewbox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('position.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-label text-white">Position<span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="text" name="position_name" id="position_name"
                                    class="form-control w-full" required=""
                                    data-validation-required-message="This field is required" aria-invalid="false"
                                    placeholder="Position Name">
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label text-white">Department <span class="text-danger">*</span></label>
                            <div class="controls ">
                                <select name="department_id" id="department_id" required=""
                                    class="form-select w-full" aria-invalid="false" placeholder="Department">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label text-white">Level <span class="text-danger">*</span></label>
                            <div class="controls ">
                                <select name="level_id" id="level_id" required="" class="form-select w-full"
                                    aria-invalid="false" placeholder="Level">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Edit --}}

    @foreach ($positions as $item)
        <div id="createPositionModal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
            class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Department
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="createPositionModal-{{ $item->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewbox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4"
                            action="{{ route('positions.update', ['position' => $item->position_slug]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="position_name"
                                    class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Nama
                                    Position</label>
                                <input type="text" name="position_name" id="position_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Position Name" required="" value="{{ $item->position_name }}">
                            </div>
                            <div>
                                <label for="department_id"
                                    class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Department</label>
                                <select name="department_id" id="department_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required="">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" @selected($item->department_id == $department->id)>
                                            {{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="level_id"
                                    class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Level</label>
                                <select name="level_id" id="level_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required="">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}" @selected($item->level_id == $level->id)>
                                            {{ $level->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</x-app-layout>
