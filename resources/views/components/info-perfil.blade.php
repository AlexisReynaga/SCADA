@php
    $user = Auth::user();
@endphp

<div class="mx-auto max-w-screen text-center mb-0 lg:mb-0 bg-gray-100">
  <h2 class="text-4xl tracking-tight font-extrabold text-blue-800 dark:text-gray pb-3">Información General</h2>
</div>

<div class="flex justify-center items-start min-h-screen bg-gray-100 pt-8">
  <div class="bg-white p-8 rounded-lg shadow-2xl max-w-3xl w-full ">
      <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
              <h2 class="text-base/7 font-semibold text-blue-800">Información personal</h2>

              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-2">
                  <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Nombre(s):</label>
                      <div class="mt-2">
                          <p class="mt-1 text-sm/6 text-gray-600">{{ $user->nombres }}</p>
                      </div>
                  </div>

                  <div class="sm:col-span-2">
                  <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Apellidos:</label>
                      <div class="mt-2">
                          <p class="mt-1 text-sm/6 text-gray-600">{{ $user->apellidos }}</p>
                      </div>
                  </div>

                  <div class="sm:col-span-2">
                  <label for="country" class="block text-sm/6 font-medium text-gray-900">Rol:</label>
                      <div class="mt-2">
                          <p class="mt-1 text-sm/6 text-gray-600">
                            @if ($user->rol == 'admin')
                                Administrador
                            @elseif ($user->rol == 'jefe_area')
                                Jefe de área
                            @elseif ($user->rol == 'coordinador_ISI')
                                Coordinador de Sistemas Inteligentes
                            @elseif ($user->rol == 'coordinador_COMP')
                                Coordinador de Computación          
                            @elseif ($user->rol == 'docente')
                                Docente
                            @elseif ($user->rol == 'becario')
                                Becario
                            @endif
                          </p>
                      </div>
                  </div>

                  <div class="sm:col-span-2">
                  <label for="email" class="block text-sm/6 font-medium text-gray-900">Institución:</label>
                      <div class="mt-2">
                          <p class="mt-1 text-sm/6 text-gray-600">{{ $user->institucion }}</p>
                      </div>
                  </div>

                  <div class="sm:col-span-2">
                  <label for="country" class="block text-sm/6 font-medium text-gray-900">Número Celular:</label>
                      <div class="mt-2">
                          <p class="mt-1 text-sm/6 text-gray-600">{{ $user->numero_celular }}</p>
                      </div>
                  </div>

                  <div class="sm:col-span-2">
                  <label for="street-address" class="block text-sm/6 font-medium text-gray-900">Correo:</label>
                      <div class="mt-2">
                          <p class="mt-1 text-sm/6 text-gray-600">{{ $user->correo }}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
