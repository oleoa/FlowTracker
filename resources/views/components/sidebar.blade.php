<aside class="xl:flex hidden w-64 h-full fixed top-0 left-0 pt-28 z-10 p-4">

  <div class="flex flex-col justify-between items-center w-full h-full bg-secondary-200 rounded p-4">

    <!-- Top -->
    <div class="w-full flex flex-col justify-start gap-4">

      <a href="{{route('dashboard')}}" @class([
          'p-4 w-full flex justify-between items-center text-xl hover:text-white hover:bg-gradient-to-r hover:from-primary-200 hover:to-primary-300 rounded',
          'bg-gradient-to-r from-primary-100 to-primary-300' => $current == 'dashboard'
        ])>
        <span>Dashboard</span>
        <i class="fa-solid fa-chart-line"></i>
      </a>

      <a href="{{route('expenses')}}" @class([
        'p-4 w-full flex justify-between items-center text-xl hover:text-white hover:bg-gradient-to-r hover:from-primary-200 hover:to-primary-300 rounded',
        'bg-gradient-to-r from-primary-100 to-primary-300' => $current == 'expenses',
      ])>
        <span>Expenses</span>
        <i class="fa-solid fa-money-check-dollar"></i>
      </a>


      <a href="{{route('incomes')}}" @class([
          'p-4 w-full flex justify-between items-center text-xl hover:text-white hover:bg-gradient-to-r hover:from-primary-200 hover:to-primary-300 rounded',
          'bg-gradient-to-r from-primary-100 to-primary-300' => $current == 'incomes'
        ])>
        <span>Incomes</span>
        <i class="fa-solid fa-sack-dollar"></i>
      </a>

      <a href="{{route('goals')}}" @class([
          'p-4 w-full flex justify-between items-center text-xl hover:text-white hover:bg-gradient-to-r hover:from-primary-200 hover:to-primary-300 rounded',
          'bg-gradient-to-r from-primary-100 to-primary-300' => $current == 'goals'
        ])>
        <span>Goals</span>
        <i class="fa-regular fa-circle-check"></i>
      </a>

      <a href="{{route('categories', 'expense')}}" @class([
          'p-4 w-full flex justify-between items-center text-xl hover:text-white hover:bg-gradient-to-r hover:from-primary-200 hover:to-primary-300 rounded',
          'bg-gradient-to-r from-primary-100 to-primary-300' => $current == 'categories'
        ])>
        <span>Categories</span>
        <i class="fa-solid fa-layer-group"></i>
      </a>

      <a href="{{route('dashboard')}}" @class([
          'p-4 w-full flex justify-between items-center text-xl hover:text-white hover:bg-gradient-to-r hover:from-primary-200 hover:to-primary-300 rounded',
          'bg-gradient-to-r from-primary-100 to-primary-300' => $current == 'settings'
        ])>
        <span>Settings</span>
        <i class="fa-solid fa-gear"></i>
      </a>

    </div>
  
    <!-- Bottom -->
    <a href="{{route('sign.out')}}" class="p-4 w-full flex justify-between items-center text-xl hover:text-white hover:bg-gradient-to-r hover:from-primary-200 hover:to-primary-300 rounded">
      <span>Logout</span>
      <i class="fa-solid fa-right-from-bracket"></i>
    </a>

  </div>

</aside>
