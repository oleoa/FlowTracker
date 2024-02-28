<nav class="xl:flex hidden fixed top-0 left-0 w-full h-28 z-20 p-4 bg-secondary-100">

  <div class="bg-secondary-200 w-full h-full rounded flex items-center justify-between p-4">
    
    <!-- Start -->
    <div>

      <h2 class="text-center w-48">FlowTracker</h2>

    </div>

    <!-- End -->
    <div>

      <!-- User -->
      <span class="flex gap-4 items-center">
        <p class="text-xl">Hi, Leo</p>
        <img src="{{asset('/img/users/leo.jpg')}}" alt="User Profile" class="rounded-full w-10">
      </span>

    </div>

  </div>

</nav>

<nav class="xl:hidden flex fixed bottom-0 left-0 w-full h-24 z-20 p-4 bg-secondary-100">

  <div class="bg-secondary-200 w-full h-full rounded">
    
    <div class="w-full h-full flex justify-start">
      <a href="{{route('dashboard')}}" @class([
          'p-4 w-full flex justify-center items-center rounded',
          'bg-gradient-to-br from-primary-100 to-primary-300' => $current == 'dashboard'
        ])>
        <i class="fa-solid fa-chart-line"></i>
      </a>
      <a href="{{route('expenses')}}" @class([
        'p-4 w-full flex justify-center items-center rounded',
        'bg-gradient-to-br from-primary-100 to-primary-300' => $current == 'expenses'
        ])>
        <i class="fa-solid fa-money-check-dollar"></i>
      </a>
      <a href="{{route('incomes')}}" @class([
          'p-4 w-full flex justify-center items-center rounded',
          'bg-gradient-to-br from-primary-100 to-primary-300' => $current == 'incomes'
        ])>
        <i class="fa-solid fa-sack-dollar"></i>
      </a>
      <a href="{{route('dashboard')}}" @class([
          'p-4 w-full flex justify-center items-center rounded',
          'bg-gradient-to-br from-primary-100 to-primary-300' => $current == 'settings'
        ])>
        <i class="fa-solid fa-gear"></i>
      </a>
    </div>

  </div>

</nav>
