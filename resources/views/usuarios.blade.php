<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center p-8">Usuarios</h1>

        <!-- Botón para agregar a un usuario -->
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Agregar Usuario
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Agregar nuevo usuario
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{route('usuario.agregar')}}" method="POST" id="formAgregar" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="rpe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">RPE: </label>
                                <input type="text" name="rpe" id="rpe" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Nombre(s):</label>
                                <input type="text" name="nombre" id="nombre" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Apellidos:</label>
                                <input type="text" name="apellidos" id="apellidos" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Correo:</label>
                                <input type="text" name="correo" id="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="institucion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Institución:</label>
                                <input type="text" name="institucion" id="institucion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Número Celular:</label>
                                <input type="text" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Rol:</label>
                                <select id="rol" name="rol" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Selecciona un rol</option>
                                    <option value="admin">Administrador</option>
                                    <option value="jefe_area">Jefe de área</option>
                                    <option value="coordinador_ISI">Coordinador de Sistemas Inteligentes</option>
                                    <option value="coordinador_COMP">Coordinador de Computación</option>
                                    <option value="docente">Docente</option>
                                    <option value="becario">Becario</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Agregar usuario
                        </button>
                    </form>
                </div>
            </div>
        </div> 

        <!-- Tabla de registros -->
        <div class="overflow-x-auto p-8">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-blue-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">RPE</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Correo</th>
                        <th class="py-3 px-4 text-left">Institución</th>
                        <th class="py-3 px-4 text-left">Teléfono</th>
                        <th class="py-3 px-4 text-left">Rol</th>
                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody id="logTable" class="text-black">
                    @foreach ($usuarios as $usuario)
                        <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="py-3 px-4">{{ $usuario->rpe }}</td>
                            <td class="py-3 px-4">{{ $usuario->nombres }} {{ $usuario->apellidos }}</td>
                            <td class="py-3 px-4">{{ $usuario->correo }}</td>
                            <td class="py-3 px-4">{{ $usuario->institucion }}</td>
                            <td class="py-3 px-4">{{ $usuario->numero_celular }}</td>
                            <td class="py-3 px-4">
                                @if ($usuario->rol == 'admin')
                                    Administrador
                                @elseif ($usuario->rol == 'jefe_area')
                                    Jefe de área
                                @elseif ($usuario->rol == 'coordinador_ISI')
                                    Coordinador de Sistemas Inteligentes
                                @elseif ($usuario->rol == 'coordinador_COMP')
                                    Coordinador de Computación          
                                @elseif ($usuario->rol == 'docente')
                                    Docente
                                @elseif ($usuario->rol == 'becario')
                                    Becario
                                @endif
                            </td>
                            
                            <td class="py-3 px-4 text-center inline-flex justify-items-center">
                                <!-- Modal toggle -->
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" id="{{ $usuario->rpe }}" class="open-modal-btn block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Editar
                                </button>

                                <!-- Main modal -->
                                <div id="crud-modal{{ $usuario->rpe }}" id-usuario="{{ $usuario->rpe }}" tabindex="-1" aria-hidden="true" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50" role="dialog">
                                    <div class="relative p-4 w-full max-w-lg max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Editar a el usuario con RPE: {{ $usuario->rpe }}
                                                </h3>
                                                <button type="button"  class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" action="{{route('usuario.editar',$usuario->rpe)}}" method="POST" id="formEditar" enctype="multipart/form-data">
                                                @csrf
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="rpe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">RPE: </label>
                                                        <input type="text" name="rpe" id="rpe" value="{{ $usuario->rpe }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Nombre(s):</label>
                                                        <input type="text" name="nombre" id="nombre" value="{{ $usuario->nombres }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Apellidos:</label>
                                                        <input type="text" name="apellidos" id="apellidos" value="{{ $usuario->apellidos }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Correo:</label>
                                                        <input type="text" name="correo" id="correo" value="{{ $usuario->correo }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="institucion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Institución:</label>
                                                        <input type="text" name="institucion" id="institucion" value="{{ $usuario->institucion }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Número Celular:</label>
                                                        <input type="text" name="telefono" id="telefono" value="{{ $usuario->numero_celular }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Rol:</label>
                                                        <select id="rol" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option selected="{{ $usuario->rol }}">
                                                                @if ($usuario->rol == 'admin')
                                                                    Administrador
                                                                @elseif ($usuario->rol == 'jefe_area')
                                                                    Jefe de área
                                                                @elseif ($usuario->rol == 'coordinador_ISI')
                                                                    Coordinador de Sistemas Inteligentes
                                                                @elseif ($usuario->rol == 'coordinador_COMP')
                                                                    Coordinador de Computación          
                                                                @elseif ($usuario->rol == 'docente')
                                                                    Docente
                                                                @elseif ($usuario->rol == 'becario')
                                                                    Becario
                                                                @endif
                                                            </option>  
                                                            <option value="admin">Administrador</option>
                                                            <option value="jefe_area">Jefe de área</option>
                                                            <option value="coordinador_ISI">Coordinador de Sistemas Inteligentes</option>
                                                            <option value="coordinador_COMP">Coordinador de Computación</option>
                                                            <option value="docente">Docente</option>
                                                            <option value="becario">Becario</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Guardar cambios
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div> 

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>   
    </div>

    <!-- Script de JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".open-modal-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let modalId = this.getAttribute("id");

                    document.getElementById("crud-modal" + modalId).classList.remove("hidden");
                    document.getElementById("crud-modal" + modalId).classList.add("flex");
                }); 
            });

            document.querySelectorAll(".close-modal").forEach(button => {
                button.addEventListener("click", function() {
                    this.closest(".modal").classList.add("hidden");
                });
            });
        });
    </script>
</x-esqueleto>