<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
      <div class="p-6 text-gray-900 dark:text-gray-100 text-sm md:flex md:justify-between md:items-center">
        <div class="space-y-3">
          <a href="#" class="text-xl font-bold">
            {{ $vacante->titulo }}
          </a>
          <p class="text-sm text-gray-600 font-bold ">
            {{ $vacante->empresa }}
          </p>
          <p class="text-sm text-gray-500 font-bold ">
            Último dia : {{ $vacante->ultimo_dia }}
          </p>
        </div>

        <div class="flex flex-col md:flex-row items-strech gap-3 mt-5 md:mt-0">
            <a href="#" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
              Candidatos
            </a>
            <a href="#" class="bg-slate-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
              Editar
            </a>
            <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
              Eliminar
            </a>
        </div>
      </div>
    
      @empty
        <p class="p-3 text-center text-sm text-gray-600"> No hay vacantes que mostrar </p>
    @endforelse 

    
    <div class="flex justify-center mt-10">
      {{ $vacantes->links() }}
    </div>   
    
</div>

